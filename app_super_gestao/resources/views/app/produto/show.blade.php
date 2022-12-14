@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
                        
            <div style="width: 50%; margin-left: auto; margin-right: auto">
                
                <table border="1" style="test-align: left">
                    <tr>
                        <td>ID</td>
                        <td>Nome</td>
                        <td>Peso</td>
                        <td>Descrição</td>
                        <td>Unidade</td>
                        
                    </tr>
                    <tr>
                        <td>{{ $produto->id}}</td>
                        <td>{{ $produto->nome}}</td>
                        <td>{{ $produto->peso}} Kg</td>
                        <td>{{ $produto->descricao}}</td>
                        <td>{{ $produto->unidade_id}}</td>
                    </tr>
                    
                </table>

            </div>
        </div>
    </div>


@endsection
