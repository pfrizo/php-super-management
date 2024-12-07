@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
            Fornecedor
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.supplier.add') }}">Novo</a></li>
                <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Site</th>
                            <th>UF</th>
                            <th>Email</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->website }}</td>
                                <td>{{ $supplier->uf }}</td>
                                <td>{{ $supplier->email }}</td>
                                <td><a href="{{ route('app.supplier.edit', $supplier->id) }}">Editar</a></td>
                                <td><a href="{{ route('app.supplier.delete', $supplier->id) }}">Excluir</a></td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    <p>Lista de Produtos</p>
                                    <table border="1" style="margin:20px">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nome</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($supplier->products as $key => $product)
                                            
                                            <tr>
                                                <td>{{ $product->id }}</td>
                                                <td>{{ $product->name }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $suppliers->appends($request)->links() }}
            </div>
        </div>

    </div>

@endsection