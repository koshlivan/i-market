<?php

namespace App\Http\Controllers;

use App\Mail\ReviewLeaved;
use App\Models\Review;
use Illuminate\Http\Request;

class MailSendController extends Controller
{
    /**
     * Send review.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $review = Review::where('reviewer', $request->reviewer)->first();



        Mail::to('koshlivan@gmail.com')->send(new ReviewLeaved($review));//->queue();
    }
}
