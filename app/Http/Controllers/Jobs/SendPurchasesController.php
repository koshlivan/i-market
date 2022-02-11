<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Jobs\PurchaseResendJob;
use App\Models\MessageToSend;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class SendPurchasesController extends Controller
{

    public function store()
    {
        PurchaseResendJob::dispatch()
        ->onQueue('mailing')
        ->delay(now()->addMinutes(1));
    }




    public function show()
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
                $this->sendEmail($order->user->name, $order->user->email, implode(', ', $products));
            }
        }
    }
    /**
     * @param string $to
     * @param array $what
     * @return string
     *
     */
    private function sendEmail($whom, $to, $what) {
        $message = new MessageToSend();
        $message->client = $whom;
        $message->mail = $to;
        $message->item = $what;

        $message->save();
        return $message;
    }

}
