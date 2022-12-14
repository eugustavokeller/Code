{{ $slot }}
<form action={{ route('site.contato') }} method="post">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="{{ $classe }}">
    @if($errors->has('nome'))
        <div style="background:red">
        {{ $errors->first('nome') }}
        </div>
    @endif
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{ $classe }}">
    @if ($errors->has('telefone'))
        <div style="background:red">
        {{ $errors->first('telefone') }}
        </div>
    @endif
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $classe }}">
    @if ($errors->has('email'))
        <div style="background:red">
        {{ $errors->first('email') }}
        </div>
    @endif
    <br>

    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $key => $motivo_contato)
            <option value="{{ $motivo_contato->id }}"
                {{ old('motivo_contatos_id') == $motivo_contato->id ? 'seleted' : '' }}>
                {{ $motivo_contato->motivo_contato }}</option>
        @endforeach
    </select>
    <div style="background:red">
    {{ $errors->has('motivo_contatos_id')  ?  $errors->first('motivo_contatos_id') : '' }} 
    </div>
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ old('mensagem') != '' ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    <div style="background:red">
    {{ $errors->has('mensagem') ? $errors->first('mensagem') : '' }}
    </div>
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

