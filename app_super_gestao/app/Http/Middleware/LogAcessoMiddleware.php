<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

use Facade\FlareClient\Http\Response;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // $request - manipular
        //return $next($request);
        // $response
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcesso::create(['log' => "O IP $ip requisitou a rota $rota."]);
        //return $next($request);
        
        $resposta = $next($request);
        $resposta->setStatusCode(201, 'O status da resposta e o texto foram modificados!!!');
        dd($resposta);
    }
}
