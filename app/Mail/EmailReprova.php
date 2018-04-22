<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailReprova extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($userName, $userMail, $imagePath, $motivo)
    {
        //dd($userName);
        return $this->view('layouts.mail.reprovado', compact('imagePath', 'userName', 'motivo'))->to($userMail, $userName)->subject('Imagem Reprovada')->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
    }
}
