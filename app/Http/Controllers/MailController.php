<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Validator;

class MailController extends Controller
{

	public function enviarMensagem(Request $request)
	{

		//dd($request);

		$validatorGuestData = Validator::make($request->all(), [

        'guestname' => 'required',
        'guestemail' => 'required',
        'guestmessage' => 'required',
        'guestsubject' => 'required'

      	]);

      	if (!$validatorGuestData->fails()) {
      		
      		try {

				Mail::raw($request->guestmessage, function($message) use ($request) {

				$message->from($request->guestemail, $request->guestname)->to(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))->subject($request->guestsubject);

				});

				session()->flash('Mensagem', 'Mensagem enviada com sucesso!!!');

        		return redirect()->back();

			
			} catch (\Exception $e) {

				dd($e);

				return back()->withErrors([

            	'Houve um problema ao enviar a mensagem!!!'

          		]);
			
			}

      	}

	}

	public function pagamentoAprovado(Request $request)
	{
		


	}

	public function pagamentoNaoAprovado(Request $request)
	{
		
		

	}

}
