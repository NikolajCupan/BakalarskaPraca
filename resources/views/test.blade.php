@extends('layout.layout')

@section('content')

    <button onclick="goBack()">Go Back</button>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>

@endsection
