<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Product::query()->with('options');
        if (isset($request->sort) && isset($request->order)) {
            $query->orderBy($request->sort, $request->order);
        }
        if (isset($request->category_id)) {
            $query->where('category_id', $request->category_id)->get();
        }
        return $query->paginate($request->per_page, ['*'], 'page', $request->page);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductRequest $request
     * @return Product
     */
    public function store(ProductRequest $request)
    {
        $request->validated();

        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function show(Request $request, int $id)
    {
        if ( isset($request->reviews) ) {
            return Product::with('options')->with('reviews')->find($id);
        }
        return Product::with('options')->find($id);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param ProductRequest $request
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, int $id)
    {
        //todo validation
        $request->validated();

        $product = Product::findOrFail($id);
        $product->name = $request->name ?? $product->name;
        $product->price = $request->price ?? $product->price;
        $product->brand = $request->brand ?? $product->brand;
        $product->code = $request->code ?? $product->code;
        $product->description = $request->description ?? $product->description;


        $product->update();
        $product->with('options');
        $product->refresh();

        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Product::destroy($id);

        return response(null, '204');

    }
}
