<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $userDatas;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $userDatas)
    {
        $this->userDatas = $userDatas;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmation d\'inscription')->view('emails.registerConfirmation')->text('emails.registerConfirmation_plain');
    }
}
