<?php

namespace Database\Seeders;

use App\Models\ProductOption;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory()
            ->has(
                ProductOption::factory()
                    ->state( new Sequence(
                        ['image' => 'storage/images/ws3MjwGfKZO127SiOAaD9jWzl9dIii64h8yubCoH.jpg'],
                        ['image' => 'storage/images/7FBYmb4R0cCrQD87xcGNNOMKL1XC5cJnRa3JOeDC.jpg'],
                    ))
                    ->count(2)
            )
            ->count(500)
            ->create();
    }
}
