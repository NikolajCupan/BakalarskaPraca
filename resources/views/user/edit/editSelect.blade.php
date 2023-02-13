@extends('layout.layout')

@section('content')

    <script>
        // Function to get height of the highest box
        // and set other boxes to this height
        $(document).ready(function() {
            let maxHeight = 0;
            $('.box-part').each(function() {
                if ($(this).height() > maxHeight) {
                    maxHeight = $(this).height();
                }
            });
            $('.box-part').height(maxHeight);
        });
    </script>

    <link rel="stylesheet" href="{{asset('css/editSelectStyles.css')}}">

    <div class="d-flex justify-content-md-center align-items-center vh-100">

        <div class="m-2 row">

            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <div class="d-flex flex-column border box-part text-center">

                    <div class="fa mb-3 d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                    </div>

                    <div class="title">
                        <h4>Zmena profilovych udajov</h4>
                    </div>

                    <div class="text">
                        <span>Nasledujuca stranka sluzi na editovanie profilovych udajov, akymi su Meno, Priezvisko, Email, Telefonne cislo, Mesto, PSC, Ulica, Cislo domu</span>
                    </div>

                    <a class="mt-auto" href="/user/edit">Pokracovat</a>

                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <div class="d-flex flex-column border box-part text-center">

                    <div class="fa mb-3 d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                        </svg>
                    </div>

                    <div class="title">
                        <h4>Zmena profilovej fotky</h4>
                    </div>

                    <div class="text">
                        <span>Nasledujuca stranka sluzi na zmenu profilovej fotky</span>
                    </div>

                    <a class="mt-auto" href="/user/photo">Pokracovat</a>

                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <div class="d-flex flex-column border box-part text-center">

                    <div class="fa mb-3 d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                            <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                            <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
                        </svg>
                    </div>
                    <div class="title">
                        <h4>Zmena hesla</h4>
                    </div>

                    <div class="text">
                        <span>Nasledujuca stranka sluzi na zmenu hesla, s ktorym sa prihlasujete</span>
                    </div>

                    <a class="mt-auto" href="/user/password">Pokracovat</a>

                </div>
            </div>

            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <div class="d-flex flex-column border box-part text-center">

                    <div class="fa mb-3 d-flex justify-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                        </svg>
                    </div>

                    <div class="title">
                        <h4>Zmazanie uctu</h4>
                    </div>

                    <div class="text">
                        <span>Nasledujuca stranka sluzi na zmazanie uctu. Zmazany ucet nie je mozne obnovit</span>
                    </div>

                    <a class="mt-auto" href="/user/delete">Pokracovat</a>

                </div>
            </div>

        </div>
    </div>

@endsection
