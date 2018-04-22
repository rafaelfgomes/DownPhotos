<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Auth;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $redirectTo = '/';

    public function __construct()
    {

        $this->middleware('guest');

    }

    public function showResetForm(Request $request, $token = null)
    {

        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );

    }

    public function reset(Request $request)
    {

        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        try {
            
            $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            });

            session()->flash('Mensagem', 'Senha alterada com sucesso!!!');

            return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($response)
                    : $this->sendResetFailedResponse($request, $response);

        } catch (\Exception $e) {

            session()->flash('Mensagem', 'Houve um erro ao atualizar a senha!!!');
            
        }

        
    }

    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:6',
        ];
    }


    protected function validationErrorMessages()
    {
        return [];
    }

    protected function credentials(Request $request)
    {

        return $request->only(
            'email', 'password', 'password_confirmation', 'token'
        );

    }

    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();

        $this->guard()->login($user);
    }

    protected function sendResetResponse($response)
    {

        return redirect($this->redirectPath())
                            ->with('status', trans($response));

    }

    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()
                    ->withInput($request->only('email'))
                    ->withErrors(['email' => trans($response)]);
    }

    public function broker()
    {

        return Password::broker();

    }

    protected function guard()
    {

        return Auth::guard();

    }

    
}
