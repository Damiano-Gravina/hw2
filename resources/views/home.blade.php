@extends('layouts.content')

@section('title','| Home')

@section('user')
{{$user = Session::get('userData')}}
@endsection


@section('header')
<script src="{{ asset('js/home.js') }}" defer></script>  
<link rel="stylesheet" href="{{ asset('css/homepage.css') }}"> 
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('top')
<div id="title_image">
            <div id="icon">🦊</div>
            <section>
                <div id="user_image">
                    <span>{{$user['Nome'][0]}}{{$user['Cognome'][0]}}<span>
                </div>
                    @if($user['Negozio'] == 0)
                    <div>{{$user['Nome']}} {{$user['Cognome']}}</div>
                    @endif
                <div class='hide' id='UserId'>{{$user['Id']}}</div>
            </section>

            <div id="option_bar">
                <a href="{{route('userProfile')}}"><strong>My profile</strong></a>
                <a href="{{route('favourite')}}"><strong>Favourite</strong></a>
                <a href="{{route('logout')}}"><strong>Logout</strong></a>
            </div>
            <div id="shade"></div>
            <strong>Buy and sell music tools</strong>
        </div>
@endsection

@section('playlist')
<section id="musicPlaylists">
    <span>Ascolta qualcosa mentre sei qui:</span>
    
    <section id="spotifyMusic">
        <span>Oppure ascolta qualcosa da spotify:</span>
        <form>
            <input type="submit" value="Artista Randomico" class = "noButtonEsthetic" id="spotifyButton">
        </form>
    
    </section>
</section>
@endsection


