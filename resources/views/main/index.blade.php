@extends('layout.layout')

@section('content')

    <x-flashMessage/>
    <x-navbar :imagePath="$imagePath" :user="$user"/>

@endsection