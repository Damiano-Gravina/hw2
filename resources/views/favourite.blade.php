@extends('layouts.profiles')

@section('title', '| Favourite')

@section('nFavourites')
{{$nFavourites = Session::get('numFavourite')}}
@endsection

@section('header')
<script src="{{ asset('js/favourite.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/favourite.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@section('content')

<div id ="numFavourites">
    <span>Numero di Preferiti:</span>
    <div id="number">{{$nFavourites}}</div>
</div>

<main>
</main>
@endsection