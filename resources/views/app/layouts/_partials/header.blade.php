<div class="header">
    <div class="logo">
        <img src="{{ asset('img/logo.png') }}">
    </div>

    <div class="menu">
        <ul>
            <li><a href="{{ route('app.home') }}">Home</a></li>
            <li><a href="{{ route('client.index') }}">Cliente</a></li>
            <li><a href="{{ route('order.index') }}">Pedido</a></li>
            <li><a href="{{ route('product.index') }}">Produto</a></li>
            <li><a href="{{ route('app.supplier') }}">Fornecedor</a></li>
            <li><a href="{{ route('app.logout') }}">Sair</a></li>
        </ul>
    </div>
</div>
