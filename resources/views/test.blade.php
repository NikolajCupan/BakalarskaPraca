@extends('layout.layout')

@section('content')

    <label for="date-input">Select a date:</label>
    <input type="text" id="date-input">


    <script>
        flatpickr("#date-input", {
            enableTime: true,
            dateFormat: "d.m.y H:i",
        });
    </script>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
