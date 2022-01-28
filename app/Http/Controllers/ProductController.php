<?php

namespace App\Http\Controllers;

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
     * @param \Illuminate\Http\Request $request
     * @return Product
     */
    public function store(Request $request)
    {
        return Product::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @return Response
     */
    public function show($request)
    {
        //return $request;
        return Product::with('options')->find($request);
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->name != '') {
            $product->name = $request->name;
        }
        if ($request->price != '') {
            $product->price = $request->price;
        }
        if ($request->brand != '') {
            $product->brand = $request->brand;
        }
        if ($request->code != '') {
            $product->code = $request->code;
        }
        if ($request->description != '') {
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
