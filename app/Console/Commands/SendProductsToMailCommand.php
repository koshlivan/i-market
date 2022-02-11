<?php

namespace App\Console\Commands;

use App\Jobs\PurchaseResendJob;
use Illuminate\Console\Command;

class SendProductsToMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:purchased';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes job for sending purchased products to the clients emails';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        PurchaseResendJob::dispatch()
            ->onQueue('mailing')
            ->delay(now()->addSeconds(10));

        return 0;
    }
}
