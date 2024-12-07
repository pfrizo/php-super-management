@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
            Produto - Editar
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}">Voltar</a></li>
                <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                @component('app.product._components.create_edit_form', ['product' => $product, 'units' => $units, 'supliers' => $suppliers])
                @endcomponent
            </div>
        </div>

    </div>

@endsection