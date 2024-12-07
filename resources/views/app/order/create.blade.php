@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
                Pedido - Adicionar
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.order._components.create_edit_form', ['clients' => $clients])
                @endcomponent
            </div>
        </div>

    </div>

@endsection