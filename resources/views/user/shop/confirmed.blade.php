@extends('layout.layout')

@section('content')

    <script>
        $(document).ready(function() {
            window.setTimeout(function() {
                let path = $('#redirectButton').attr('href');
                if (path === "/user/purchaseDetail/") {
                    window.location.href = "/";
                } else {
                    window.location.href = path;
                }
            }, 7500);
        });
    </script>

    <style>
        body {
            background: #30cfd0;
            background: -webkit-linear-gradient(to bottom right, rgba(48,207,208,0.5), rgba(51,8,103,0.5));
            background: linear-gradient(to bottom right, rgba(48,207,208,0.5), rgba(51,8,103,0.5));
        }

        .topBorderCard {
            height: 10px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
            background: green;
        }

        .mainCard {
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }
    </style>

    <div class="vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="topBorderCard bg-dark"></div>

            <div class="mainCard bg-white shadow p-5">
                <div class="mb-4 text-center">
                    <svg class="d-inline-block bi bi-check-circle" xmlns="http://www.w3.org/2000/svg" width="75" height="75" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg>
                </div>
                <div class="text-center">
                    <h1>Dakujeme</h1>
                    <p>Dakujeme Vam za Vasu objednavku. O malu chvilu budete presmerovany na detail objednavky, kde najdete informacie o sposobe uhrady.</p>
                    <a id="redirectButton" href="/user/purchaseDetail/{{Session::get('purchaseId')}}" type="button" class="btn btn-dark">Pokracovat</a>
                </div>
            </div>
        </div>
    </div>

@endsection
