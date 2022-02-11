<?php

namespace App\Jobs;

use App\Models\MessageToSend;
use App\Models\Order;
use App\Providers\SendEmailProvider;
use App\Providers\SendPurchasedItemsProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PurchaseResendJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var int
     */
    public $timeout = 300;
    /**
     * @var int
     */
    public  $tries = 4;

    /**
     * @var int
     */
    public $backoff = 5;

    /**
     * @var bool
     */
    public $deleteWhenMissingModels = true;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
       SendPurchasedItemsProvider::spamClients();
    }

}
