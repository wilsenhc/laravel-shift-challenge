<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use App\Models\Service;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Service::factory()->create([
            'name' => 'GitHub',
        ]);

        Product::factory()->create([
            'name' => 'Laravel 8.x shift',
            'next_product_id' => 2,
        ]);

        Product::factory()->create([
            'name' => 'Laravel 9.x shift',
            'next_product_id' => 3,
        ]);

        Product::factory()->create([
            'name' => 'Laravel 10.x shift',
            'next_product_id' => 4,
        ]);

        Product::factory()->create([
            'name' => 'Laravel 11.x shift',
            'next_product_id' => 5,
        ]);

        Product::factory()->create([
            'name' => 'Laravel 12.x shift',
            'next_product_id' => null,
        ]);

        Order::factory()->count(7)->create();
    }
}
