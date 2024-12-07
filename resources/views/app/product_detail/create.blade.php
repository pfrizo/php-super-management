@extends('app.layouts.basic')

@section('title', 'Detalhes do Produto')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
                Produto - Adicionar Detalhes do Produto
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product_detail._components.create_edit_form', ['units' => $units])
                @endcomponent
            </div>
        </div>

    </div>

@endsection