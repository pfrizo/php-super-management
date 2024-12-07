@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
            Listagem de Cliente
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('client.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($clients as $client)
                            <tr>
                                <td>{{ $client->name }}</td>
                                <td><a href="{{ route('client.show', ['client' => $client->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('client.edit', ['client' => $client->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$client->id}}" method="post" action="{{route('client.destroy', ['client' => $client->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$client->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $clients->appends($request)->links() }}
            </div>
        </div>

    </div>

@endsection