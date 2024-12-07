@extends('website.layouts.basic')

@section('title', 'Login')

@section('content')
    <div class="page-content">
        <div class="page-title">
            <h1>Login</h1>
        </div>

        <div class="page-info">
            
            <div style="width:30%; margin-left:auto; margin-right:auto;">
                <form action={{ route('website.login') }} method="post">
                    @csrf
                    <input name="user" value="{{ old('user') }}" type="text" placeholder="Usuário" class="black-border">
                    {{ $errors->has('user') ? $errors->first('user') : '' }}

                    <input name="password" value="{{ old('password') }}" type="password" placeholder="Senha" class="black-border">
                    {{ $errors->has('password') ? $errors->first('password') : '' }}

                    <button type="submit" class="black-border">Acessar</button>
                </form>
                {{ isset($error) && $error != '' ? $error : '' }}
            </div>

        </div>
    </div>

    <div class="footer">
        <div class="social-media">
            <h2>Redes sociais</h2>
            <img src="{{ asset('img/facebook.png') }}">
            <img src="{{ asset('img/linkedin.png') }}">
            <img src="{{ asset('img/youtube.png') }}">
        </div>
        <div class="contact-area">
            <h2>Contato</h2>
            <span>(11) 3333-4444</span>
            <br>
            <span>supergestao@dominio.com.br</span>
        </div>
        <div class="location">
            <h2>Localização</h2>
            <img src="{{ asset('img/map.png') }}">
        </div>
    </div>
@endsection
