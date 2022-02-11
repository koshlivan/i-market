<?php

namespace App\Jobs;

use App\Models\MessageToSend;
use App\Providers\SendEmailProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected string $email;
    /**
     * @var int
     */
    public $timeout = 300;
    /**
     * @var int
     */
    public int $tries = 2;

    /**
     * @var int
     */
    public int $backoff = 5;

    /**
     * @var bool
     */
    public bool $deleteWhenMissingModels = true;
    /**
     * Create a new job instance.
     *
     * @return void
     */

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $email)
    {
        $this->email = $email;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        SendEmailProvider::sendMail($this->email, $this->email, 'You was spammed!');
    }
}
