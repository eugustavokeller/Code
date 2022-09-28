@extends('app.layouts.basico')

@section('titulo', 'Detalhe do Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Detalhes</p>
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
                        <td>Produto ID</td>
                        <td>Comprimento</td>
                        <td>Largura</td>
                        <td>Altura</td>
                        <td>Unidade ID</td>
                        
                    </tr>
                    <tr>
                        <td>{{ $produto_detalhe->id}}</td>
                        <td>{{ $produto_detalhe->produto_id}}</td>
                        <td>{{ $produto_detalhe->comprimento}} cm</td>
                        <td>{{ $produto_detalhe->largura}} cm</td>
                        <td>{{ $produto_detalhe->altura}} cm</td>
                        <td>{{ $produto_detalhe->unidade_id}}</td>
                    </tr>
                    
                </table>

            </div>
        </div>
    </div>


@endsection
