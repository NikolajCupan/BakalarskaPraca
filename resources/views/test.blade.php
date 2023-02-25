@extends('layout.layout')

@section('content')

    <script>
        $(document).ready(function() {
            // hide both collapses
            $('#collapse1').collapse('hide');
            $('#collapse2').collapse('hide');

            // toggle first collapse
            $('#toggle-collapse1').click(function() {
                $('#collapse2').collapse('hide');
                setTimeout(function() {
                    $('#collapse1').collapse('toggle');
                }, 500); // 500ms delay
            });

            // toggle second collapse
            $('#toggle-collapse2').click(function() {
                $('#collapse1').collapse('hide');
                setTimeout(function() {
                    $('#collapse2').collapse('toggle');
                }, 500); // 500ms delay
            });
        });
    </script>

    <div class="container">
        <h2>Bootstrap Collapse Example</h2>
        <button type="button" class="btn btn-info" id="toggle-collapse1">Toggle Collapse 1</button>
        <button type="button" class="btn btn-info" id="toggle-collapse2">Toggle Collapse 2</button>

        <div id="collapse1" class="collapse">
            <x-other.longText/>
        </div>

        <div id="collapse2" class="collapse">
            <x-other.longText/>
        </div>
    </div>

@endsection
