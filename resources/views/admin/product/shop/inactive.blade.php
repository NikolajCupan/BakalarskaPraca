@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-navbar.navbarAdmin homePath="/admin/product"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"shopInactive"'/>
            </div>

            <div class="col-md-12 col-lg-9">

                <h3 class="title">Ukonceny predaj</h3>
                <p>Nasledujuca tabulka zobrazuje ukoncene predaje produktov. Predaj produktu nie je mozne opatovne obnovit - je potrebne vytvorit novy predaj
                   skladovaneho produktu. Detail zobrazuje za ake ceny bol produkt predavany a objednavky, v ktorych sa bol zakupeny.</p>

                <x-table.productsTable :products="$shopInactiveProducts"/>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection

