<?php

namespace App\Mail;


use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class AdminMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->user_contact = User::with('is_admin', true);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {   
        $user= Auth::user();
        return $this->from('acceptRevisor@presto.it')->view('mail.acceptRevisor', compact('user'));
    }
}
