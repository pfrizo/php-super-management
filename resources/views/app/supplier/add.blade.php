@extends('app.layouts.basic')

@section('title', 'Fornecedor')

@section('content')
    
    <div class="page-content">
        
        <div class="page-title-2">
            Fornecedor - Adicionar
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{ route('app.supplier.add') }}">Novo</a></li>
                <li><a href="{{ route('app.supplier') }}">Consulta</a></li>
            </ul>
        </div>

        <div class="page-info">
            <div style="width: 30%; margin-left: auto; margin-right: auto;">
                <form method="post" action="{{ route('app.supplier.add')}}">
                    <input type="hidden" name="id" value="{{ $supplier->id ?? ''}}">
                    @csrf
                    <input type="text" name="name" value="{{ $supplier->name ?? old('name') }}" placeholder="Nome" class="black-border">
                    {{ $errors->has('name') ? $errors->first('name') : '' }}

                    <input type="text" name="website" value="{{ $supplier->website ?? old('website') }}" placeholder="Site" class="black-border">
                    {{ $errors->has('website') ? $errors->first('website') : '' }}
                    
                    <input type="text" name="uf" value="{{ $supplier->uf ?? old('uf') }}" placeholder="UF" class="black-border">
                    {{ $errors->has('uf') ? $errors->first('uf') : '' }}

                    <input type="text" name="email" value="{{ $supplier->email ?? old('email') }}" placeholder="E-mail" class="black-border">
                    {{ $errors->has('email') ? $errors->first('email') : '' }}

                    <button type="submit" class="black-border">Cadastrar</button>
                </form>
                {{ $msg ?? '' }}
            </div>
        </div>

    </div>

@endsection