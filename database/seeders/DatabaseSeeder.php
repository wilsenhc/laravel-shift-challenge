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
        ]);

        Product::factory()->create([
            'name' => 'Laravel 9.x shift',
        ]);

        Product::factory()->create([
            'name' => 'Laravel 10.x shift',
        ]);

        Product::factory()->create([
            'name' => 'Laravel 11.x shift',
        ]);

        Product::factory()->create([
            'name' => 'Laravel 12.x shift',
        ]);

        Order::factory()->count(7)->create();
    }
}
