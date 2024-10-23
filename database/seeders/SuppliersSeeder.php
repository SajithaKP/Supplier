<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'Supplier One',
                'address' => '123 Main St, City A',
                'tax-no' => 'TAX123456',
                'country' => 'USA',
                'mobile' => '1234567890',
                'email' => 'supplier1@example.com',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supplier Two',
                'address' => '456 Elm St, City B',
                'tax-no' => 'TAX654321',
                'country' => 'UK',
                'mobile' => '0987654321',
                'email' => 'supplier2@example.com',
                'status' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supplier Three',
                'address' => '789 Maple St, City C',
                'tax-no' => 'TAX987654',
                'country' => 'Canada',
                'mobile' => '1122334455',
                'email' => 'supplier3@example.com',
                'status' => 'Active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supplier Four',
                'address' => '101 Pine St, City D',
                'tax-no' => 'TAX223344',
                'country' => 'Australia',
                'mobile' => '5566778899',
                'email' => 'supplier4@example.com',
                'status' => 'Blocked',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Supplier Five',
                'address' => '202 Oak St, City E',
                'tax-no' => 'TAX334455',
                'country' => 'India',
                'mobile' => '9988776655',
                'email' => 'supplier5@example.com',
                'status' => 'Inactive',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
