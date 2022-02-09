<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Order::with('carts.product.options');

        if ( isset($request->user_id) && isset($request->is_done) ) {
            $query->where('user_id', '=', $request->user_id)
                ->where('is_done', '<', $request->is_done);
        }
            $query->limit(500);
            $query->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'user_id' => ['required'],
        ]);
        $order = new Order();
        $order->user_id = $request->user_id;
        $order->is_done = $request->is_done;
        $order->save();
        $order->refresh();
        $order->with('carts');

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
        return Order::with('carts.product.options')->find($id);
    }

    /**
     * Update the specified resource in storage.
     * @param App\Models\Order $order
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id): Order
    {
        $order = Order::findOrFail($id);
        if ($request->is_done > 0) {
            $order->is_done = 1;
        } else {
            $order->is_done = 0;
        }

        $order->update();

        return Order::find($id);
    }
}
