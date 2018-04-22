<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Auth;

class EmailPagamentoConfirmado extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $orderNumber)
    {
        
        return $this->view('layouts.mail.pagamentoconfirmado', compact('username', 'orderNumber'))->to(Auth::user()->email, $username)->subject('Pagamento confirmado')->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));

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
