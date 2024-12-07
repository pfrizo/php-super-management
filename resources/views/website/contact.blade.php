@extends('website.layouts.basic')

@section('title', 'Contact')

@section('content')
    <div class="page-content">
        <div class="page-title">
            <h1>Entre em contato conosco</h1>
        </div>

        <div class="page-info">
            <div class="main-contact">
                @component('website.layouts._components.contact_form', ['class' => 'black-border', 'contact_types' => $contact_types])
                <p>A nossa equipe analisará a sua mensagem e retornaremos o mais brevemente possível</p>
                <p>Nosso tempo médio de resposta é de 48 horas</p>
                @endcomponent
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
