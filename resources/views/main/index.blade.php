@extends('layout.layout')

@section('content')

    <x-flashMessage/>

    @auth
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn btn-primary">Odhlasit</button>
        </form>
    @else
        <a href="/register" type="button" class="btn btn-primary">Register</a>
        <a href="/login" type="button" class="btn btn-primary">Login</a>
    @endauth

@endsection
