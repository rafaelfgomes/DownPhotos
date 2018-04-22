<?php

namespace App\Http\Requests;

use Auth;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class RegistroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userObj = new \App\User;
        return [
            'nome' => 'required|string|min:'.$userObj::minNome.'|max:'.$userObj::maxNome,
            'sobrenome' => 'required|string|min:'.$userObj::minSobrenome.'|max:'.$userObj::maxSobrenome,
            'email' => 'required|string|email|max:'.$userObj::maxEmail.'|unique:users',
            'dataNascimento' => 'required|date_format:d/m/Y|before:'.Carbon::now()->setTimezone('America/Sao_Paulo')->subYears(18).'|',
            'password' => 'required|confirmed|string|min:'.$userObj::minPassword.'|max:'.$userObj::maxPassword.'|confirmed',

        ];
    }

    public function persist(){

        $dt = Carbon::createFromFormat('d/m/Y', request('dataNascimento'))->setTimezone('America/Sao_Paulo')->toDateString();

        $user = User::create([
            'nome' => request('nome'),
            'sobrenome' => request('sobrenome'),
            'email' => request('email'),
            'dataNascimento' => $dt,
            'password' => bcrypt(request('password')),
            'access_level_id' => 2,
            'cpf' => null,
            'cep' => null,
            'endereco' => null,
            'cidade' => null,
            'pais' => null,
            'telefone' => null,
            'created_at' => Carbon::now()->setTimezone('America/Sao_Paulo'),
            'updated_at' => Carbon::now()->setTimezone('America/Sao_Paulo')
            ]);
        
        auth()->login($user);
    }

}
