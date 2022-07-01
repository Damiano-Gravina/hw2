@extends('layouts.profiles')

@section('title', '| My Profile')

@section('user')
{{$user = Session::get('userData')}}
{{$shop = Session::get('shopData')}}
@endsection

@section('header')
<link rel="stylesheet" href="{{ asset('css/userPage.css') }}">
@endsection

@section('content')
<section>
    <div id="user_image">
        <span>{{$user['Nome'][0]}}{{$user['Cognome'][0]}}</span>
    </div>

    <div id="username">{{$user['Username']}}</div>
    <div id="num_posts">Numero di annunci pubblicati: {{$user['Nposts']}}</div>
    <div id="email">Contatta il venditore per il suo annuncio: 
        @if($user['VisualizeEmail'] == 1)
        {{$user['Email']}}
        @else
        Email non visibile
        @endif


        @if($user['Negozio'])
        <div>
        <div>Sede del negozio: {{$shop[0]['SedeNegozio']}}</div>
        <div>Orari di apertura: {{$shop[0]['OrariApertura']}}</div>
        </div>
        @endif
    </div>

</section>
@endsection