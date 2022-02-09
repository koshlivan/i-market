<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Cart::with('product.options');
        if (isset($request->product_id) && isset($request->order_id)) {
            $query->where('order_id', $request->order_id);
        }
        if (isset($request->order_id)) {
            $query->where('order_id', $request->order_id);
        }
        $query->limit(500);

        return $query->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CartRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(CartRequest $request)
    {
        $request->validated();

        $cart = new Cart();
        $cart->order_id = $request->order;
        $cart->product_id = $request->product;
        $cart->amount = $request->amount;

        $cart->save();
        $cart->load('product.options');
        $cart->refresh();

        return $cart;
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        return Cart::with('product.options')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CartRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CartRequest $request, int $id)
    {
        $cart = Cart::findOrFail($id);

        $request->validated();

        $cart->amount = $request->amount ?? $cart->amount;
        $cart->save();

        $cart->refresh();
        return $cart;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Cart::find($id)->delete();

        return response(null, '204');
    }
}
