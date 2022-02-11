<?php

namespace App\Console\Commands;

use App\Jobs\GenerateMailJobsJob;
use Illuminate\Console\Command;

class GenerateJobsForMailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:mailing_jobs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates jobs for sending mail to users';

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
        GenerateMailJobsJob::dispatch()
            ->onQueue('generator')
            ->delay(now()->addSeconds(15));
        return 0;
    }
}
