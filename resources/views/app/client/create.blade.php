@extends('app.layouts.basic')

@section('title', 'Cliente')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
                Cliente - Adicionar
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('client.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.client._components.create_edit_form')
                @endcomponent
            </div>
        </div>

    </div>

@endsection