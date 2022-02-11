<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AddProductToCategoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public static function makeChaosInCategories()
    {
        $product_id = rand(1, 30);
        $category_id = rand(1, 5);
        $product = Product::find($product_id);
        $option = ProductOption::find($product_id);
        if ( !is_null($product) && !is_null($option)) {
            $new_product = $product->replicate();
            $new_option = $option->replicate();
            $new_product->category_id = $category_id;
            $new_product->save();
            $new_option->product_id = $new_product->id;
            $new_option->save();
        }
    }
}
