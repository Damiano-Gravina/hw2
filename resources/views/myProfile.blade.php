@extends('layouts.profiles')

@section('title', '| My Profile')

@section('user')
{{$user = Session::get('userData')}}
@endsection

@section('header')
<link rel="stylesheet" href="{{ asset('css/myProfile.css') }}">
<script src="{{ asset('js/userProfile.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div id="user_image">
        <span>{{$user['Nome'][0]}}{{$user['Cognome'][0]}}</span>
    </div>

    <div id="username">{{$user['Username']}}</div>

    <div id='userInfo'>
        <div>
            <span> Nome: {{$user['Nome']}}</span>
            <span> Cognome: {{$user['Cognome']}}</span>
        </div>
        <div>Numero di annunci pubblicati: {{$user['Nposts']}}</div>
        <div>Email collegata all'account: {{$user['Email']}}</div>
        <div id = "visualizeEmail" class = "hide">{{$user['VisualizeEmail']}}</div>
        <a id = "email_button"></a>
    </div>
</section>
@endsection