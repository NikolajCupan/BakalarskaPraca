@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminProduct.css')}}">

    <x-navbar.navbarAdmin/>

    {{$warehouseProduct->quantity}}
    {{$warehouseProduct->product}}

@endsection
