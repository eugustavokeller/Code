<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('site.login', ['titulo' => 'Login']);
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
            echo 'Usuario existe';
        } else {
            echo 'Usuario não existe';
        }
        
    }
}
