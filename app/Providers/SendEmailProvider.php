<?php

namespace App\Providers;

use App\Models\MessageToSend;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class SendEmailProvider extends ServiceProvider
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
    public static function sendMail($whom, $email, $what)
    {
        $mail = new MessageToSend();
        $mail->item = $what;
        $mail->mail = $email;
        $mail->client = $whom;

        $mail->save();
    }
}
