@extends('layout.layout')

@section('content')

    <script type="text/javascript" src="{{asset('js/numberSelector.js')}}"></script>

    <div class="input-group" style="width: 120px">
        <span class="input-group-btn">
            <button id="decrementButton" class="btn" type="button">-</button>
        </span>

        <input id="quantityValue" type="number" class="form-control text-center" maxlength="3" value="1">

        <span class="input-group-btn">
            <button id="incrementButton" class="btn" type="button">+</button>
        </span>
    </div>

@endsection
