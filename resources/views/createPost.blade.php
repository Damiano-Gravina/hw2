@extends('layouts.profiles')

@section('title', '| New Post')

@section('header')
<script src="{{ asset('js/post.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@section('content')
<section class= "hide">
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Errore compilazione⚠️</div>
        <p class = "hide" id="title_error">Il titolo deve essere compreso tra 0 e 75 caratteri</p>
        <p class = "hide" id="text_error">Il testo deve essere compreso tra 0 e 255 caratteri</p>
    </article>
</section>


<form id="post" method = "post">
    @csrf
    <label><input type=text name="title" id="postTitle" value = "Titolo annuncio"></label>
    <textarea name="text" id="postText"></textarea>
    <input type='submit' id="publish" value='Pubblica annuncio'>
</form>
@endsection