<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {

        $erro = '';
        
        if($request->get('erro') == 1) {
            $erro = 'Usuario ou senha inexistentes';
        };
        if($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso!';
        };

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        
        // regras de validacao
        $regras = [
            'usuario' => 'email',
            'senha' => 'required',
        ];

        // retorno caso haja algum erro
        $feedback = [
            'usuario.email' => 'E-mail obrigatorio',
            'senha.required' => 'Senha obrigatoria',
        ];
        
        // se nao passar pelo validate
        $request->validate($regras, $feedback);

        // recuperamos os parametros do formulario
        $email = $request->get('usuario');
        $password = $request->get('senha');


        $user = new User();

        $usuario = $user->where('email', $email)
                    ->where('password', $password)
                    ->get()
                    ->first();

        if(isset($usuario->name)) {
            
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
        
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
