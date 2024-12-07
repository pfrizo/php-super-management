@extends('website.layouts.basic')

@section('title', 'About Us')

@section('content')
    <div class="page-content">
        <div class="page-title">
            <h1>Olá, eu sou o Super Gestão</h1>
        </div>

        <div class="page-info">
            <p>O Super Gestão é o sistema online de controle administrativo que pode transformar e potencializar os negócios da sua empresa.</p>
            <p>Desenvolvido com a mais alta tecnologia para você cuidar do que é mais importante, seus negócios!</p>
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
