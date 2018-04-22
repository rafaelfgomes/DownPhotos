<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Imagem;
use App\Notifications\EmailResetSenhaNotification;
use Carbon;

class User extends Authenticatable
{
    //
    use Notifiable;

     protected $fillable = [ 'id', 'nome', 'sobrenome', 'email', 'dataNascimento', 'password', 'access_level_id','cep' , 'cpf', 'endereco', 'cidade', 'pais', 'telefone' ];

    const minNome = 2;
    const maxNome = 30;
    const minSobrenome = 2;
    const maxSobrenome = 30;
    const maxEmail = 40;
    const maxCep = 8; 
    const minPassword = 6;
    const maxPassword = 30;
    const maxEndereco = 30;
    const maxCidade = 30;
    const maxPais = 30;
    const maxTelefone = 11;
  
     protected $hidden = [
        'password', 'remember_token',
    ];

    public function files(){


    	return $this->hasMany(Imagem::class); 
    }

    public function sendPasswordResetNotification($token)
    {

        $this->notify(new EmailResetSenhaNotification($token));

    }

}
