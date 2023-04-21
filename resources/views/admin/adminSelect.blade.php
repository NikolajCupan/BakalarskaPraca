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
                            <span>Nasledujuca stranka sluzi na spravu pouzivatelskych uctov (zmena roli)</span>
                        </div>
                        <a href="/admin/user">Pokracovat</a>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12">
                    <div class="border box-part text-center d-flex flex-column justify-content-center align-items-center">
                        <svg class="fa bi bi-box-seam" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                        </svg>
                        <div class="title">
                            <h4>Sprava tovarov</h4>
                        </div>
                        <div class="text">
                            <span>Nasledujuca stranka sluzi na spravu skladovanych produktov a predavanych produktov</span>
                        </div>
                        <a href="/admin/product">Pokracovat</a>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-6 col-lg-6 col-md-12">
                    <div class="border box-part text-center d-flex flex-column justify-content-center align-items-center">
                        <svg class="fa bi bi-file-earmark-text" xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                            <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                        </svg>
                        <div class="title">
                            <h4>Sprava objednavok</h4>
                        </div>
                        <div class="text">
                            <span>Nasledujuca stranka sluzi na spravu objednavok (zmena stavov objednavok, rusenie objednavok, reklamacie)</span>
                        </div>
                        <a href="/admin/purchase">Pokracovat</a>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
