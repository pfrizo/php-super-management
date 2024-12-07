@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
            Produto - Visualizar
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.index') }}">Voltar</a></li>
                <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align: left;">
                    <tr>
                        <td>ID:</td>
                        <td>{{ $product->id }}</td>
                    </tr>
                    <tr>
                        <td>Nome:</td>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <td>Descrição:</td>
                        <td>{{ $product->description }}</td>
                    </tr>
                    <tr>
                        <td>Peso:</td>
                        <td>{{ $product->weight }} kg</td>
                    </tr>
                    <tr>
                        <td>Unidade de Medida:</td>
                        <td>{{ $product->unit_id }}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>

@endsection