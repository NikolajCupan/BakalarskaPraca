@extends('layout.layout')

@section('content')

    <style>
    #main {
    height: 100px;
    border: 1px solid black;
    font-size: 20px;
    font-weight: bold;
    color: white;
    }
    #left {
    float: left;
    width: 100px;
    height: 100%;
    background-color: green;
    }
    #center {
    float: left;
    width: 100px;
    height: 100%;
    background-color: blue;
    }
    #right {
    width: 100%;
    height: 100%;
    background-color: green;
    }
    </style>

    <div id = "main">
        <div id="left">
            DIV_1
        </div>

        <div id="center">
            DIV_2
        </div>

        <div id="right">
            DIV_3
        </div>
    </div>

@endsection
