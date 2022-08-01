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
Fornecedor: {{ $fornecedores[0]['nome'] }}
<br>
Status: {{ $fornecedores[0]['status'] }}
<br>
@if( !($fornecedores[0]['status'] == 'S'))
    Fornecedor inativo!! if com condição !
@endif
<br>

@unless($fornecedores[0]['status'] == 'S')
    Fornecedor inativo!! condição false padrão unless...
@endunless

