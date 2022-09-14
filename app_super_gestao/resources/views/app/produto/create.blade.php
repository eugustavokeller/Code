@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">

        <div class="titulo-pagina-2">
            <p>Produto - Adicionar</p>
        </div>
        
        <div class="menu">
            <ul>
                <li><a href="">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
                        
            <div style="width: 30%; margin-left: auto; margin-right: auto">
                <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                    
                    @csrf
                    <input type="text" value="" name="nome" placeholder="Nome" class="borda-preta">
                    
                    <input type="text" value="" name="site" placeholder="Site" class="borda-preta">
                    
                    <input type="text" value="" name="uf" placeholder="UF" class="borda-preta">
                    
                    <input type="text" value="" name="email" placeholder="E-mail" class="borda-preta">
                    
                    <button type="submit" class="borda-preta">Cadastrar</button>
                </form>

            </div>
        </div>
    </div>


@endsection
