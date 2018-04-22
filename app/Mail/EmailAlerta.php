<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailAlerta extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($usermail, $username, $imagepath)
    {

      return $this->view('layouts.mail.alerta', compact('imagepath', 'username'))->to($usermail, $username)->subject('Dados Pendentes')->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

      //return view('layouts.pages.emailalerta', compact('imagepath', 'username'));

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
    }
}
