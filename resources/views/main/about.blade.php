@extends('layout.layout')

@section('content')

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

@endsection
