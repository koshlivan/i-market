<?php

namespace App\Console\Commands;

use App\Jobs\AddProductToCategoryJob;
use Illuminate\Console\Command;

class AddProductToCategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds random product to random category';

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
        AddProductToCategoryJob::dispatch();
        return 0;
    }
}
