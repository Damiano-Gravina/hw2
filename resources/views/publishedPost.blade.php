@extends('layouts.profiles')

@section('title', '| Post Published')

@section('header')
<script src="{{ asset('js/post.js') }}" defer></script>
<link rel="stylesheet" href="{{ asset('css/post.css') }}">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
@endsection

@section('content')
<div id = 'published_header'>
    <div id = 'published'>Pubblicazione effettuata</div>
</div>
@endsection