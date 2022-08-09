<h3>Fornecedor!!</h3>


@php

@endphp

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados!</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem varios fornecedores cadastrados!!!</h3>
@else
    <h3>Não existem fornecedores cadastrados!!!</h3>
@endif

<br>

@isset($fornecedores)

    @for ($i = 0; isset($fornecedores[$i]); $i++)
        Fornecedor: {{ $fornecedores[$i]['nome'] }}
        <br>
        Status: {{ $fornecedores[$i]['status'] }}
        <br>
        CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Valor não definido' }}
        <br>
        Telefone: ({{ $fornecedores[$i]['ddd'] ?? '' }}) {{ $fornecedores[$i]['telefone'] ?? '' }}
        <hr>
    @endfor
@endisset




