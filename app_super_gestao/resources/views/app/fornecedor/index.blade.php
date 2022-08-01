<h3>Fornecedor!!</h3>

<?= 'Texto de teste com sintax PHP' ?>
</br>
{{ 'Texto de teste com {} duplas' }}

{{-- Comentário que será descartado pelo interpretador do blade --}}
</br>
@php
    // Para comentários de uma linha
    /*
    Para comentários de múltiplas linhas
    */

    echo 'Texto de teste';
@endphp