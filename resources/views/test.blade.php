@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/navbarStyles.css')}}">

    <style>
        .badge {
            position: relative;
            top: -19px;
            left: -10px;
            border: 1px solid black;
            border-radius: 25px;
        }
        button {
            margin:5px;
        }
    </style>

    <li class="nav-item ms-5">
        <a class="userMenuItem navbarButton nav-link mx-2" href="/user/cart">
            Kosik
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            <span style="color: black" class="badge badge-light">99+</span>
        </a>
    </li>

    <div class="container-fluid">
        <br>
        <br>
        <center>
            <h1>GeeksforGeeks</h1>
            <h4>Icon with count Badge:

                <!-- Wrapping the icon and badge -->
                <span id="group">
                 <button type="button" class="btn btn-info">
                  <i class="fa fa-envelope"></i>
                 </button>
                 <span style="color: black" class="badge badge-light">5</span>
               </span>
            </h4>
            <br>
            <br>
            <button class="btn btn-danger">
                <i class="fas fa-minus"></i>
                Subtract
            </button>
            <button class="btn btn-success">
                <i class="fas fa-plus"></i>
                Addition
            </button>
        </center>
    </div>

@endsection
