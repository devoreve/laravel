<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Création de 2 utilisateurs manuellement
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@laravel.dev',
                'password' => bcrypt('admin'),
                'created_at' => now()
            ],
            [
                'name' => 'test',
                'email' => 'test@laravel.dev',
                'password' => bcrypt('test'),
                'created_at' => now()   
            ]
        ]);
        
        // Création de 50 utilisateurs avec des données factices
        User::factory()->count(50)->create();
    }
}
