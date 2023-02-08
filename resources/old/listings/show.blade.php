@extends('old.layout')

@section('content')
    @include('old.partials._range')
    <h2>{{$listing['title']}}</h2>
    <p>{{$listing['description']}}</p>
    <x-listing-tags :tagsCsv="$listing->tags"/>

    <a href="/listings/{{$listing->id}}/edit" type="button" class="btn btn-primary">Edit</a>

    <form method="post" action="/listings/{{$listing->id}}">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-primary">Delete</button>
    </form>
@endsection
