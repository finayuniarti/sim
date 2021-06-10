<?php

namespace App\Mail;

use App\P3M;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class MailNotify extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('arka.isma1@gmail.com')
            ->view('pages.user.penelitian.notify')
            ->with([
                'nama' => 'Fina Yuniarti',
                'website' => 'simpendi.com',

            ]);
    }
}
