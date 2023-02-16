@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/selectStyles.css')}}">

    <div class="box">
        <div class="container">
            <div class="row">

                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12">

                    <div class="border box-part text-center d-flex flex-column justify-content-center align-items-center">

                        <svg class="fa bi bi-person" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>

                        <div class="title">
                            <h4>Sprava uctov</h4>
                        </div>

                        <div class="text">
                            <span>Nasledujuca stranka sluzi na spravu pouzivatelskych uctov (mazanie, zmena roli, banovanie)</span>
                        </div>

                        <a href="/user/edit">Pokracovat</a>

                    </div>
                </div>


                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12">

                    <div class="border box-part text-center d-flex flex-column justify-content-center align-items-center">

                        <svg class="fa bi bi-image" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                            <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                        </svg>

                        <div class="title">
                            <h4>Sprava recenzii</h4>
                        </div>

                        <div class="text">
                            <span>Nasledujuca stranka sluzi na spravu recenziiprofilovej fotky</span>
                        </div>

                        <a href="/user/photo">Pokracovat</a>

                    </div>
                </div>


                <div class="col-xxl-4 col-xl-12 col-lg-12 col-md-12">

                    <div class="border box-part text-center d-flex flex-column justify-content-center align-items-center">

                        <svg class="fa bi bi-image"  xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                            <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
                        </svg>

                        <div class="title">
                            <h4>Sprava tovarov</h4>
                        </div>

                        <div class="text">
                            <span>Nasledujuca stranka sluzi na zmenu hesla, s ktorym sa prihlasujete</span>
                        </div>

                        <a href="/user/password">Pokracovat</a>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
