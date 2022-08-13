<h3>Fornecedor!!</h3>


@php

@endphp

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados!</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem varios fornecedores cadastrados!!!</h3>
@else
    <h3>Não existem fornecedores cadastrados!!!</h3>
@endif

<br>

@isset($fornecedores)

    @forelse ($fornecedores as $indice => $fornecedor)
        Iteração atual: {{ $loop->iteration }}
        <br>  
        Fornecedor: {{ $fornecedor['nome'] }}
        <br>
        Status: {{ $fornecedor['status'] }}
        <br>
        CNPJ: {{ $fornecedor['cnpj'] ?? 'Valor não definido' }}
        <br>
        Telefone: ({{ $fornecedor['ddd'] ?? '' }}) {{ $fornecedor['telefone'] ?? '' }}
        <br>
            @if($loop->first)
                Primeira iteração do Loop!
            @endif
            
            @if ($loop->last)
                Última iteração do Loop!
                <br>
                Total de registros Loop: {{ $loop->count }}
            @endif
            <hr>
        @empty
            Não há fornecedores cadastrados!!!
         
    @endforelse    
@endisset