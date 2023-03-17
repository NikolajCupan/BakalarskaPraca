@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-navbar.navbarAdmin homePath="/admin/product"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"shopActive"'/>
            </div>

            <div class="col-md-12 col-lg-9">

                <h3 class="title">Aktivny predaj</h3>
                <p>Nasledujuca tabulka zobrazuje vsetky produkty, ktore su aktualne predavane. Pocet skladovanych kusov tychto preduktov
                   moze byt rovny 0, v pripade ak boli vsetky predane. Predavanemu produktu je mozne zmenit cenu, kategoriu, popis a obrazok.
                   Pripadne je mozne ukoncit jeho predaj. Detail zobrazuje za ake ceny bol produkt predavany a objednavky, v ktorych sa bol zakupeny.</p>

                <x-table.productsTable :products="$shopActiveProducts"/>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
