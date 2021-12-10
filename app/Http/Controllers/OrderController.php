<?php

namespace App\Http\Controllers;

// use PDO;
use Illuminate\Support\Facades\DB;
use App\Models\OrderModel;

class OrderController extends Controller
{
    public function index()
    {
        // $connection = new PDO(
        //     'mysql:host=db.3wa.io;dbname=cedricleclinche_classicmodels;charset=UTF8', 
        //     'cedricleclinche', 
        //     'eb094434df8b9e10f67b5c650f7bed6c',
        //     [
        //         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        //     ]
        // );
        
        // $query = $connection->prepare('
        //     SELECT orderNumber, orderDate, status 
        //     FROM orders 
        //     ORDER BY orderDate
        // ');
        // $query->execute();
        // $orders = $query->fetchAll();
        
        $orderModel = new OrderModel();
        
        $orders = $orderModel->getAll();
        
        return view('homepage', [
            'orders' => $orders
        ]);
    }
    
    public function show(int $id)
    {
        // $connection = new PDO(
        //     'mysql:host=db.3wa.io;dbname=cedricleclinche_classicmodels;charset=UTF8', 
        //     'cedricleclinche', 
        //     'eb094434df8b9e10f67b5c650f7bed6c',
        //     [
        //         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        //         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        //     ]
        // );
        
        // $query = $connection->prepare('
        //     SELECT p.productName, od.quantityOrdered, od.priceEach, (od.quantityOrdered * od.priceEach) AS total
        //     FROM products p
        //     INNER JOIN orderdetails od ON od.productCode = p.productCode
        //     WHERE od.orderNumber = ?
        // ');
        
        // $query->execute([$id]);
        
        // $orderDetails = $query->fetchAll();
        
        $orderModel = new OrderModel();
        
        $customer = $orderModel->getCustomer($id);
        
        if ($customer === null) {
            abort(404);
        }
        
        $orderDetails = $orderModel->getDetails($id);
        $totalOrder = $orderModel->getTotal($id);
        
        return view('orders.show', [
            'customer' => $customer,
            'details' => $orderDetails,
            'totalOrder' => $totalOrder
        ]);
    }
}
