{{ $slot }}
<form action={{ route('website.contact') }} method="post">
    @csrf
    <input name="name" value="{{ old('name') }}" type="text" placeholder="Nome" class="{{ $class }}">
    @if ($errors->has('name'))
        {{ $errors->first('name') }}
    @endif
    <br>
    <input name="phone" value="{{ old('phone') }}" type="text" placeholder="Telefone" class="{{ $class }}">
    {{ $errors->has('phone') ? $errors->first('phone') : '' }}
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{ $class }}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}
    <br>
    <select name="contact_type_id" class="{{ $class }}">
        <option value="">Qual o motivo do contato?</option>

        @foreach ($contact_types as $key => $contact_type)
            <option value="{{$contact_type->id}}" {{ old('contact_type_id') == $contact_type->id ? 'selected' : ''}}>{{ $contact_type->contact_type }}</option>
        @endforeach
    </select>
    {{ $errors->has('contact_type_id') ? $errors->first('contact_type_id') : '' }}
    <br>
    <textarea name="message" class="{{ $class }}" placeholder="Preencha aqui a sua mensagem"> {{ (old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem'}}</textarea>
    {{ $errors->has('message') ? $errors->first('message') : '' }}
    <br>
    <button type="submit" class="{{ $class }}">ENVIAR</button>
</form>

@if($errors->any())
    <pre>
        @foreach ($errors->all() as $error)
            {{ $error }}
            <br>
        @endforeach
    </pre>
@endif