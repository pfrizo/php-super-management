@if (isset($client->id))
    <form method="post" action="{{ route('client.update', ['client' => $client->id])}}">
        @csrf
        @method('PUT')
@else
    <form method="post" action="{{ route('client.store')}}">
        @csrf
@endif
        <input type="text" name="name" value="{{ $client->name ?? old('name') }}" placeholder="Nome" class="black-border">
        {{ $errors->has('name') ? $errors->first('name') : '' }}

        <button type="submit" class="black-border">Cadastrar</button>
    </form>