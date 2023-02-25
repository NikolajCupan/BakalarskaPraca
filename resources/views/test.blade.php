@extends('layout.layout')

@section('content')

    <style>
        .item {
            position:relative;
            padding-top:20px;
            display:inline-block;
        }
        .notify-badge{
            position: absolute;
            right:-20px;
            top:10px;
            background: #000000;
            text-align: center;
            border-radius: 30px 30px 30px 30px;
            color:white;
            padding:3px 5px;
            font-size:12px;
        }
    </style>

    <ul class="navbar-nav ms-auto align-items-center">
        <li class="nav-item ms-5">
            <div class="item">
                <span class="notify-badge">98</span>
                <a class="userMenuItem navbarButton nav-link mx-2" href="/user/cart">Kosik</a>
            </div>
        </li>
    </ul>

@endsection
