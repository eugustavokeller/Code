@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Listagem de Produtos</p>
        </div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <div style="width: 90%; margin-left: auto; margin-right: auto">
                <table style="margin-top: 60px" border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                            <th>Comprimento</th>
                            <th>Altura</th>
                            <th>Largura</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>{{ $produto->descricao }}</td>
                                <td>{{ $produto->fornecedor->nome }}</td>
                                <td>{{ $produto->peso }}</td>
                                <td>{{ $produto->unidade_id }}</td>
                                <td>{{ $produto->itemDetalhe->comprimento ?? ''}}</td>
                                <td>{{ $produto->itemDetalhe->altura ?? ''}}</td>
                                <td>{{ $produto->itemDetalhe->largura ?? ''}}</td>
                                <td><a href="{{ route('produto.show', ['produto' => $produto->id]) }}">Visualizar</a></td>
                                <td>
                                    <form id="form_{{$produto->id}}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                                <td><a href="{{ route('produto.edit', ['produto' => $produto->id]) }}">Editar</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $produtos->appends($request)->links() }}
                <br>
                @if ($produtos->firstItem() == 0)
                    Nenhum registo encontrado.
                @endif
                @if ($produtos->firstItem() != 0)
                    Lista do registro {{ $produtos->firstItem() }} ao {{ $produtos->lastItem() }}
                @endif
                <br>
                {{ $produtos->count() }} registros de {{ $produtos->total() }}.
            </div>
        </div>
    </div>
@endsection
