@extends('layout.layout')

@section('content')

    <label for="exampleDataList" class="form-label">Datalist example</label>
    <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
    <datalist id="datalistOptions">
        @foreach ($cities as $city)
            <option value="{{$city->city}}">
        @endforeach
    </datalist>

@endsection
