<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Jobs\AddProductToCategoryJob;
use App\Models\Product;
use App\Models\ProductOption;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductToCategoryController extends Controller
{
    public function store() {
        AddProductToCategoryJob::dispatch()
            ->onQueue('to_category')
            ->delay( now()->addSeconds(15) );
    }

    public function testing() {
        $product_id = rand(1, 30);
        $category_id = rand(1, 5);
        $product = Product::find($product_id);
        $option = ProductOption::find($product_id);
        if ( !is_null($product) && !is_null($option)) {
            $new_product = new Product();
            $new_option = new ProductOption();
            $new_product = $product->replicate();
            $new_option = $option->replicate();
            $new_product->category_id = $category_id;
            $new_product->save();

            return $new_product;
        }
        return $product_id;
    }
}
