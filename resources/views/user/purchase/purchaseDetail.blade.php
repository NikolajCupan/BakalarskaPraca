@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/userPurchasesStyles.css')}}">

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    {{$purchase}}

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
