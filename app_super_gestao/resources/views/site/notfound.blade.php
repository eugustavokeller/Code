@extends('site.layouts.basico')

@section('titulo', $titulo)

@section('conteudo')
    <div>
        <div>
            <img class="imagem" src="{{ asset('img/404_NotFound.png') }}" alt="notfound">
        </div>
    </div>

    <style>
        .imagem {
            margin-top: 80px;
            text-align: center;
            width: 100%;
        }
    </style>
@endsection
