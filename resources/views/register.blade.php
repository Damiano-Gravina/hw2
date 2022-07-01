@extends('layouts.access')

@section('title', '| Registrazione')

@section('script')
<script src="{{ asset('js/regist.js') }}" defer></script>   
@endsection


@section('error')
<div>
@if (Session::get('error'))
<section>
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Login non valido⚠️</div>
        @foreach(Session::get('error') as $err)
        <p>
            {{$err}}
        </p>
        @endforeach
    </article>
</section>
@endif
</div>

<section class="hide">
    <article class = 'errorWindow'>
        <div class = 'warning'>⚠️Registrazione non corretta⚠️</div>
        <p>Modulo non compilato correttamente</p>
    </article>
</section>
@endsection


@section('form')
<form name='regist' method='post' autocomplete="off">
    @csrf                      
    <div class="name">
        <label id="label_name"><strong>Name</strong> <input type='text' name='name' class='label_class' value="{{ old('name') }}"></label>
        <span class = "hide"></span>
    </div>
    <div class="surname">
        <label><strong>Surname </strong><input type='text' name='surname' class='label_class' value="{{ old('surname') }}"></label>
        <span class = "hide"></span>
    </div>
    <div class="username">
        <label><strong>Username </strong><input type='text' name='username' class='label_class' value="{{ old('username') }}"></label>
        <span class = "hide"></span>
    </div>
    <div class="email">
        <label><strong>E-mail </strong><input type='text' name='email' class='label_class' value="{{ old('email') }}"></label>
        <span class = "hide"></span>
    </div>
    <div class="password">
        <label><strong>Password </strong><input type='text' name='password' class='label_class' value="{{ old('password') }}"></label>
        <span class = "hide"></span>
    </div> 
    <div class="confirm_password">  
        <label><strong>Confirm PW </strong><input type='text' name='confirm_password' class='label_class' value="{{ old('confirm_password') }}"></label>
        <span class = "hide"></span>
    </div>
    <label>&nbsp;<input type='submit' id="regist" value='Regist'></label>
    <a href="{{route('login')}}">(Already have an account?)</a>
</form>
@endsection
