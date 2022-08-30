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

    public function salvar(Request $request) {
        // Realizar a validação dos dados do formulário recebido no request.
        $request->validate([
            'nome' => 'required|min:3|max:40',
            'telefone' => 'required|max:11',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:1000',
        ]);
        
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