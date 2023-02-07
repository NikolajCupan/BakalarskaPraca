@extends('layout')

@section('content')
@include('partials._range')
    <h2>{{$listing['title']}}</h2>
    <p>{{$listing['description']}}</p>
    <x-listing-tags :tagsCsv="$listing->tags"/>
@endsection
