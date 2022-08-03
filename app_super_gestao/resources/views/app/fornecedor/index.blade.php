<h3>Fornecedor!!</h3>


@php
    // sintax if no php puro - If retorna quando a condição é true

    /*
    if() {
    } elseif() {
    } else {
    }
    */
@endphp

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores cadastrados!</h3>
    @elseif(count($fornecedores) > 10)
        <h3>Existem varios fornecedores cadastrados!!!</h3>
        @else
            <h3>Não existem fornecedores cadastrados!!!</h3>

@endif

{{-- @unless retorna if quando a condição é false --}}

<br>
@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    CNPJ: {{ $fornecedores[0]['cnpj'] }}
@endisset
<br>
<br>
@isset($fornecedores)
    Fornecedor: {{ $fornecedores[0]['nome'] }}
    <br>
    Status: {{ $fornecedores[0]['status'] }}
    <br>
    @isset($fornecedores[0]['cnpj'])
    CNPJ: {{ $fornecedores[0]['cnpj'] }}
        @empty($fornecedores[0]['cnpj'])
            - Vazio
        @endempty
    @endisset
@endisset

{{-- @isset para impor uma condição true, @endisset para fechar o bloco, ele verifica se ela existe --}}
{{-- @empty com condição no if retornando true se a variável estiver vazia, diferente de @isses que verifica se ela existe --}}

{{-- Exemplos de váriaveis com valor vazio:
    - ''
    - 0
    - 0.0
    - '0'
    - null
    - false
    - array()
    - $var  variavel declarada sem valor, apenas declarada.
 --}}