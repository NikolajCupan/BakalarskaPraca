@extends('layout')

@section('content')

    @include('partials._range')
    @include('partials._search')

    @unless (count(@$listings) == 0)
        @foreach ($listings as $listing)
            <x-card class="mb-5">
                <x-listing-card :listing="$listing"/>
            </x-card>
        @endforeach
    @else
        <p>No listings found!</p>
    @endif

@endsection
