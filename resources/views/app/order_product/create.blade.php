@extends('app.layouts.basic')

@section('title', 'Pedido Produto')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
                Adicionar Produtos ao Pedido
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.index') }}">Voltar</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            
            <h4>Detalhes do Pedido</h4>
            <p>ID do Pedido: {{ $order->id }}</p>
            <p>ID do Cliente: {{ $order->client_id }}</p>
            
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <h4>Itens do Pedido</h4>
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome do Produto</th>
                            <th>Data de inclusão do item no pedido</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->pivot->created_at->format('d/m/Y') }}</td>
                                <td>
                                    <form id="form_{{$product->pivot->id}}" method="post" action="{{ route('order-product.destroy', ['orderProduct' => $product->pivot->id]) }}">
                                        @method('DELETE')
                                        @csrf
                                        <a href="#" onclick="document.getElementById('form_{{$product->pivot->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>

                @component('app.order_product._components.create_edit_form', ['order' => $order, 'products' => $products])
                @endcomponent
            </div>
        </div>

    </div>

@endsection