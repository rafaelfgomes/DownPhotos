<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

	protected $redirectTo = '/';

    public function __construct()
    {

        $this->middleware('guest');

    }

    public function showLinkRequestForm()
    {

        return view('auth.passwords.email');

    }

    public function sendResetLinkEmail(Request $request)
    {

        $this->validateEmail($request);

        try {
            
            $response = $this->broker()->sendResetLink(
            $request->only('email')
            );

            session()->flash('Mensagem', 'E-mail enviado com sucesso!!!');

            return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);

        } catch (\Exception $e) {
            
            session()->flash('Mensagem', 'Houve um problema ao enviar o e-mail!!!');

        }
        
    }

    protected function validateEmail(Request $request)
    {

        $this->validate($request, ['email' => 'required|email']);

    }

    protected function sendResetLinkResponse($response)
    {

        return back()->with('status', trans($response));

    }

    protected function sendResetLinkFailedResponse(Request $request, $response)
    {

        return back()->withErrors(
            ['email' => trans($response)]
        );

    }

    public function broker()
    {

        return Password::broker();

    }
    
}
