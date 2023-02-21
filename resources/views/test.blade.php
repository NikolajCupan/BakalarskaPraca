@extends('layout.layout')

@section('content')

    <style>
        .crop-text-1 {
            -webkit-line-clamp: 1;
            overflow : hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
        .crop-text-2 {
            -webkit-line-clamp: 4;
            overflow : hidden;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-box-orient: vertical;
        }
    </style>

    <div class="container">
        <div class="row">
            <h2>Truncating Multiple Line Text <small>(crop, clampin)</small></h2>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="thumbnail">
                    <img src="http://placehold.it/250x150" alt="Image">
                    <div class="caption">
                        <h3 class="crop-text-2">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</h3>
                        <p class="crop-text-1">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
