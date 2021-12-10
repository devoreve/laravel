<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class OrderModel
{
    public function getAll()
    {
        return DB::table('orders')
            ->select('orderNumber', 'orderDate', 'status')
            ->orderBy('orderDate')
            ->get();
    }
    
    public function getDetails(int $id)
    {
        return DB::table('orderdetails AS od')
            ->select('od.*', 'p.productName', DB::raw('(od.priceEach * od.quantityOrdered) AS total'))
            ->join('products AS p', 'od.productCode', '=', 'p.productCode')
            ->where('od.orderNumber', $id)
            ->get();
    }
    
    public function getTotal(int $id)
    {
        return DB::table('orderdetails')
            ->select(DB::raw('SUM(priceEach * quantityOrdered) AS total'))
            ->where('orderNumber', $id)
            ->first();
    }
    
    public function getCustomer(int $id)
    {
        return DB::table('customers AS c')
            ->select('c.customerName', 'c.addressLine1', 'c.city', 'c.country', 'c.contactFirstName', 'c.contactLastName')
            ->join('orders AS o', 'o.customerNumber', '=', 'c.customerNumber')
            ->where('o.orderNumber', $id)
            ->first();
    }
}