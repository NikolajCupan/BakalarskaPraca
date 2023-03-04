@extends('layout.layout')

@section('content')

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    TERMS AND CONDITIONS

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
