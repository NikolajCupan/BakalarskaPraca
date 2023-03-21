@extends('layout.layout')

@section('content')

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>
    <x-navbar.search/>
    <x-other.longText/>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
