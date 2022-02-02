<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$user = Auth::user();
        return Order::with('carts.product.options')
            //->where('user_id', $user)
            ->where('user_id', '=', 1)
            ->where('is_done', '<', 1)
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $order = new Order();
        $order->user_id = $user;
        $order->is_done = false;
        $order->save();

        return $order;
    }

    /**
     * Display the specified resource.
     *
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //return $request.$id;
        return Order::with('carts.product.options')->find($id);
    }

    /**
     * Update the specified resource in storage.
     * @param App\Models\Order $order
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $order = Order::findOrFail($id);
        if($request->is_done > 0)
        {
            $order->is_done = 1;
        }
        else
        {
            $order->is_done = 0;
        }

        $order->update();

        return Order::find($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
