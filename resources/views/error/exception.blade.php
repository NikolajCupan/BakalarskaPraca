@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/elementCenter.css')}}">

    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="topBorderCard bg-dark"></div>

            <div class="mainCard bg-white shadow p-5">
                <div class="mb-4 text-center">
                    <svg class="d-inline-block bi bi-exclamation-circle" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"/>
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Chyba</h1>
                    <p>{{$errorMessage}}</p>
                    @if ($back)
                    <a id="redirectButton" onclick="history.back();" type="button" class="btn btn-dark">Naspat</a>
                    @else
                    <a id="redirectButton" href="{{$path}}" type="button" class="btn btn-dark">{{$buttonText}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
