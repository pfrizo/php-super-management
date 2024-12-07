@extends('app.layouts.basic')

@section('title', 'Pedido')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
            Listagem de Pedidos
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('order.create') }}">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>ID Pedido</th>
                            <th>Cliente</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->client_id }}</td>
                                <td><a href="{{ route('order-product.create', ['order' => $order->id])}}">Adicionar Produtos</a></td>
                                <td><a href="{{ route('order.show', ['order' => $order->id]) }}">Visualizar</a></td>
                                <td><a href="{{ route('order.edit', ['order' => $order->id]) }}">Editar</a></td>
                                <td>
                                    <form id="form_{{$order->id}}" method="post" action="{{route('order.destroy', ['order' => $order->id])}}">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="document.getElementById('form_{{$order->id}}').submit()">Excluir</a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $orders->appends($request)->links() }}
            </div>
        </div>

    </div>

@endsection