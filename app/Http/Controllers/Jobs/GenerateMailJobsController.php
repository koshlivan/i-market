<?php

namespace App\Http\Controllers\Jobs;

use App\Http\Controllers\Controller;
use App\Jobs\GenerateMailJobsJob;
use Illuminate\Http\Request;

class GenerateMailJobsController extends Controller
{
    public function store()
    {
        GenerateMailJobsJob::dispatch()
            ->onQueue('generator')
            ->delay(now()->addSeconds(15));
    }
}
