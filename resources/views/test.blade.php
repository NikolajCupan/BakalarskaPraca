@extends('layout.layout')

@section('content')

    <label for="dateInputFlatpickr">Select a date:</label>
    <input type="text" id="dateInputFlatpickr">

    <script type="text/javascript" src="{{asset('js/flatpickr.js')}}"></script>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
