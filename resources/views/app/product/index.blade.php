@extends('app.layouts.basic')

@section('title', 'Produto')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
            Listagem de Produtos
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('product.create') }}">Novo</a></li>
                <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Nome Fornecedor</th>
                            <th>Site Fornecedor</th>
                            <th>Peso</th>
                            <th>Unidade ID</th>
                            <th>Comprimento</th>
                            <th>Largura</th>
                            <th>Altura</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->supplier->name }}</td>
                                <td>{{ $product->supplier->website }}</td>
                                <td>{{ $product->weight }}</td>
                                <td>{{ $product->unit_id }}</td>
                                <td>{{ $product->productDetail->length ?? '' }}</td>
                                <td>{{ $product->productDetail->width ?? '' }}</td>
                                <td>{{ $product->productDetail->height ?? '' }}</td>
                                <td><a href="{{ route('product.show', ['product' => $product->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('product.edit', ['product' => $product->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$product->id}}" method="post" action="{{route('product.destroy', ['product' => $product->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$product->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="12">
                                    <p>Pedidos</p>
                                    @foreach ($product->orders as $order)
                                        <a href="{{ route('order-product.create', ['order' => $order->id]) }}">
                                            Pedido: {{ $order->id }}, 
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $products->appends($request)->links() }}
            </div>
        </div>

    </div>

@endsection