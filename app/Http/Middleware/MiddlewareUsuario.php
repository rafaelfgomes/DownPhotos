<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class MiddlewareUsuario
{

    protected $auth;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Guard $auth)
    {
        
        $this->auth = $auth;

    }

    public function handle($request, Closure $next)
    {

        if ($this->auth->guest()) {
            if ($request->ajax()) {
                return response('É preciso estar logado para acessar essa página');
            }
            else
            {
                return redirect()->guest('usuario');
            }
        }

        return $next($request);
    }
}
