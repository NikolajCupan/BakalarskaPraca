@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminProduct.css')}}">

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"shopInactive"'/>
            </div>

            <div class="col-md-12 col-lg-9">

                <h3 class="title">Ukonceny predaj</h3>
                <p>Nasledujuca tabulka zobrazuje historiu predavanych produktov. Detail zobrazuje za ake ceny bol produkt predavany
                   a kolkokrat bol zakupeny. Predaj produktu nie je mozne opatovne obnovit - je potrebne vytvorit novy predaj
                   skladovaneho produktu.</p>

                <x-table.productsTable :products="$shopInactiveProducts"/>
            </div>
        </div>
    </div>

@endsection
