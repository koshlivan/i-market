<?php

namespace App\Mail;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReviewLeaved extends Mailable
{
    use Queueable, SerializesModels;

    /**
     *@var Review $review
     * */
    protected $review;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('koshlivan@gmail.com', 'Example')
        ->text($this->review->review);
    }
}
