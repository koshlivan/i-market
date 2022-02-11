<?php

namespace App\Jobs;

use App\Models\Product;
use App\Models\ProductOption;
use App\Providers\AddProductToCategoryProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AddProductToCategoryJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var int
     */
    public $timeout = 300;
    /**
     * @var int
     */
    public  $tries = 2;

    /**
     * @var int
     */
    public $backoff = 5;




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
       AddProductToCategoryProvider::makeChaosInCategories();
    }
}
