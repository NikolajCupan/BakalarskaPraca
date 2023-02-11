@extends('layout.layout')

@section('content')

    <x-flashMessage/>

    @auth
        <form method="POST" action="/logout">
            @csrf
            <button type="submit" class="btn btn-primary">Odhlasit</button>
        </form>

        <a href="/admin" type="button" class="btn btn-primary">Admin</a>
        <a href="/user/select" type="button" class="btn btn-primary">Edit</a>
    @else
        <a href="/register" type="button" class="btn btn-primary">Register</a>
        <a href="/login" type="button" class="btn btn-primary">Login</a>
    @endauth

@endsection
