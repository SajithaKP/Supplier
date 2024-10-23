<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'name' => 'Item One',
                'inventory_location' => 'Warehouse A',
                'brand' => 'Brand A',
                'category' => 'Category A',
                'supplier_id' => 1, 
                'stock_unit' => 'kg',
                'unit_price' => 150.50,
                'image' => json_encode(['image1.jpg', 'image2.jpg']),
                'status' => 'Enabled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Item Two',
                'inventory_location' => 'Warehouse B',
                'brand' => 'Brand B',
                'category' => 'Category B',
                'supplier_id' => 2,
                'stock_unit' => 'piece',
                'unit_price' => 200.75,
                'image' => json_encode(['image3.jpg', 'image4.jpg']),
                'status' => 'Enabled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Item Three',
                'inventory_location' => 'Warehouse C',
                'brand' => 'Brand C',
                'category' => 'Category C',
                'supplier_id' => 3, 
                'stock_unit' => 'litre',
                'unit_price' => 300.00,
                'image' => json_encode(['image5.jpg']),
                'status' => 'Disabled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Item Four',
                'inventory_location' => 'Warehouse D',
                'brand' => 'Brand D',
                'category' => 'Category D',
                'supplier_id' => 4,
                'stock_unit' => 'meter',
                'unit_price' => 400.99,
                'image' => json_encode(['image6.jpg', 'image7.jpg']),
                'status' => 'Enabled',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Item Five',
                'inventory_location' => 'Warehouse E',
                'brand' => 'Brand E',
                'category' => 'Category E',
                'supplier_id' => 5, 
                'stock_unit' => 'box',
                'unit_price' => 500.45,
                'image' => json_encode(['image8.jpg']),
                'status' => 'Disabled',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
