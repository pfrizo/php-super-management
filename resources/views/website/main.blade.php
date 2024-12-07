@extends('website.layouts.basic')

@section('title', 'Home')

@section('content')
    <div class="main-content">

        <div class="left">
            <div class="infos">
                <h1>Sistema Super Gestão</h1>
                <p>Software para gestão empresarial ideal para sua empresa.<p>
                <div class="info">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="white-text">Gestão completa e descomplicada</span>
                </div>
                <div class="info">
                    <img src="{{ asset('img/check.png') }}">
                    <span class="white-text">Sua empresa na nuvem</span>
                </div>
            </div>

            <div class="video">
                <img src="{{ asset('img/video_player.jpg') }}">
            </div>
        </div>

        <div class="right">
            <div class="contact">
                <h1>Contato</h1>
                <p>Caso tenha qualquer dúvida por favor entre em contato com nossa equipe pelo formulário abaixo.<p>
                @component('website.layouts._components.contact_form', ['class' => 'white-border', 'contact_types' => $contact_types])
                @endcomponent
            </div>
        </div>
    </div>
@endsection
