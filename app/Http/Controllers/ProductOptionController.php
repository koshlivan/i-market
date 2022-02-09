<?php

namespace App\Http\Controllers;

use App\Models\ProductOption;
use Illuminate\Http\Request;

class ProductOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return ProductOption::query()->where('product_id' , $request->product)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return ProductOption
     */
    public function store(Request $request)
    {
        return ProductOption::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function show(ProductOption $productOption)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductOption $productOption)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductOption  $productOption
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductOption $productOption)
    {
        //
    }
}
