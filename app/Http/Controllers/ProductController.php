<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::with('options')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Product
     */
    public function store(Request $request)
    {
       $new_product = Product::create($request->all());

       return $new_product;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Product::with('options')->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if($request->name!='') {
            $product->name = $request->name;
        }
        if($request->price!='') {
            $product->price = $request->price;
        }
        if($request->brand!='') {
            $product->brand = $request->brand;
        }
        if($request->code!='') {
            $product->code = $request->code;
        }
        if($request->description!='') {
            $product->description = $request->description;
        }

        $product->update();

        return Product::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();

        return response(null, '204');

    }
}
