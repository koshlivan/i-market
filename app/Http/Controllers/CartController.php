<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            if ( isset($request->product_id) && isset($request->order_id) ) {
                return Cart::where('product_id', $request->product_id)->where('order_id', $request->order_id)->get();
            }
            if ( isset($request->order_id) )
            {
                return Cart::with('product.options')->where('order_id', $request->order_id)->get();
            }
        return Cart::with('product.options')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'order' => ['required'],
            'product' => ['required'],
            'amount' => ['required']
        ]);

        $cart = new Cart();
        $cart->order_id = $request->order;
        $cart->product_id = $request->product;
        $cart->amount = $request->amount;

        $cart->save();

        return Cart::with('product')->find($cart->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        return Cart::with('product.options')->find($id);
    }

    /**
     * Update the specified resource in storage.
     * @param App\Models\Cart $cart
     * @param  \Illuminate\Http\Request  $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $cart = Cart::findOrFail($id);

        if($request->amount !== '') {
            $cart->amount = $request->amount;
            $cart->update();
        }
        return Cart::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        Cart::find($id)->delete();

        return response(null, '204');
    }
}
