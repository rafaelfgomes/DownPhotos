<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class EmailPagamentoNaoConfirmado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $orderNumber)
    {
        
        return $this->view('layouts.mail.pagamentonaoconfirmado', compact('username', 'orderNumber'))->to(Auth::user()->email, $username)->subject('Pagamento não confirmado')->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

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
