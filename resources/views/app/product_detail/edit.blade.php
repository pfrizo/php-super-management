@extends('app.layouts.basic')

@section('title', 'Detalhes do Produto')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
            Produto - Editar Detalhes do Produto
        </div>

        <div class="menu">
            <ul>
                <li><a href="#">Voltar</a></li>
            </ul>
        </div>

        <div class="page-info">

            <h4>Produto</h4>
            <div>Nome: {{ $product_detail->product->name }}</div>
            <br>
            <div>Descrição: {{ $product_detail->product->description }}</div>
            <br>

            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product_detail._components.create_edit_form', ['product_detail' => $product_detail, 'units' => $units])
                @endcomponent
            </div>
        </div>

    </div>

@endsection