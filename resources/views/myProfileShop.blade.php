@extends('layouts.profiles')

@section('title', '| My Profile')

@section('user')
{{$user = Session::get('userData')}}
{{$shop = Session::get('shopData')}}
@endsection

@section('header')
<link rel="stylesheet" href="{{ asset('css/myProfile.css') }}">
<script src="{{ asset('js/userProfile.js') }}" defer></script>
<script src="{{ asset('js/userProfileShop.js') }}" defer></script>
@endsection

@section('content')
<div class="hide" id="compiler">
    <form action="changeShopDetails">
    <span>Compilazione dati shop</span>
        <span>
            Indirizzo dello shop: 
        <input type="text" name = "shop_address">
        </span>

        <span>
            Orari di apertura: 
        <input type="text" name = "shop_open">
        </span>

        <a id = "cancel_modification_button" href="">Annulla</a>
        <input id = "modify_details" type="submit" value="Applica Modifiche">
    </form>
</div> 

<section id="shop_section">
    <div id="user_image">
        <span>{{$user['Nome'][0]}}{{$user['Cognome'][0]}}</span>
    </div>

    <div id="username">{{$user['Username']}}</div>

    <div id='userInfo'>
        <div>Numero di annunci pubblicati: {{$user['Nposts']}}</div>
        <div>Email collegata all'account: {{$user['Email']}}</div>
        <div>Sede del negozio: {{$shop[0]['SedeNegozio']}}</div>
        <div>Orari di apertura: {{$shop[0]['OrariApertura']}}</div>
        <div id = "visualizeEmail" class = "hide">{{$user['VisualizeEmail']}}</div>
        <a id = "email_button" href="changeEmailVisualization"></a>
        <a id = "shop_details_button" href="">Modifica Indirizzo e Orari</a>
    </div>


</section>
@endsection
