<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required|max:11',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:1000',
        ];

        $feedback = [
            //'nome.required' => 'O campo nome é obrigatório!',
            'nome.min' => 'O nome precisa no minimo 3 letras!',
            'nome.max' => 'O nome pode ter no máximo 40 letras!',
            'nome.unique' => 'Nome já cadastrado! Utilize outro!',
            //'telefone.required' => 'O campo telefone é obrigatório!',
            'telefone.max' => 'O campo telefone pode ter no máximo 11 números!',
            'email.email' => 'E-mail inválido! Utilize um formato válido: exemplo@exemplo.com',
            //'motivo_contatos_id.required' => 'O campo Motivo do Contato é obrigatório!',
            //'mensagem.required' => 'O campo mensagem é obrigatório!',
            'mensagem.max' => 'A mensagem pode conter no máximo 1000 caracteres!',

            'required' => 'O campo :attribute é obrigatório!'
        ];

        // Realizar a validação dos dados do formulário recebido no request.
        $request->validate($regras, $feedback);


        // salvar dados preenchidos no campo contato em index e /contato
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}

/*
            echo '<pre>';
            print_r($request->all());
            echo '</pre>';
            echo $request->input('nome');
            echo '<br>';
            echo $request->input('email');
        */
        /*
            $contato = new SiteContato();
            $contato->nome = $request->input('nome');
            $contato->telefone = $request->input('telefone');
            $contato->email = $request->input('email');
            $contato->motivo_contato = $request->input('motivo_contato');
            $contato->mensagem = $request->input('mensagem');
        */
            //print_r($contato->getAttributes());
            //$contato->save();
        /*
            $contato = new SiteContato();
            $contato->fill($request->all());
            $contato->save();
        */

        //$contato = new SiteContato();
        //$contato->create($request->all());