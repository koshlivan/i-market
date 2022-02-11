<?php

namespace App\Providers;

use App\Models\Order;
use Illuminate\Support\ServiceProvider;

class SendPurchasedItemsProvider extends ServiceProvider
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
    public static function spamClients()
    {
        $orders = Order::where('is_done', '>', 0)
            ->with('carts.product', 'user')->get();


        foreach ($orders as $order) {
            $arr = $order->carts->toArray();
            if ( count($arr) > 0) {
                $products = [];
                foreach ($order->carts as $cart) {
                    array_push($products, $cart->product->name);
                }
                SendEmailProvider::sendMail($order->user->name, $order->user->email, implode(', ', $products) );
            }
        }
    }
}
