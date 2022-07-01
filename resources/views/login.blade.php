@extends('layouts.access')

@section('title', '| Login')

@section('script')   
<script src="{{ asset('js/login.js') }}" defer></script>   
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
@endsection

@section('error')
<div>
@if (Session::get('error'))
<section>
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Login non valido⚠️</div>
        <p>{{Session::get('error')}}</p>
    </article>
</section>
@endif
</div>


<section class="hide">
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Login non valido⚠️</div>
        <p>Inserisci nome utente e password</p>
    </article>
</section>
@endsection

@section('form')
<form name='login' method='post'>
    @csrf
    <label id="label_username"><strong>Username </strong> <input type='text' name='username' class='label_class'></label>
    <label><strong> Password </strong><input type='password' name='password' class='label_class' id="label_password"></label> 
    <span class="material-symbols-outlined">visibility_off</span>
    <label>&nbsp;<input type='submit' id="regist" value='Login'></label>
    <a href="{{route('register')}}">(Don't have an account?)</a>
</form>
@endsection
