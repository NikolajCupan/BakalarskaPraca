@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminProduct.css')}}">

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"warehouseActive"'/>
            </div>

            <div class="col-md-12 col-lg-9">

                <h3 class="title">Aktivne produkty na sklade</h3>
                <p>Nasledujuca tabulka zobazuje aktivne produkty a ich pocetnosti na sklade. Za aktivny produkt sa povazuje taky, ktory
                   sa predava alebo pocet skladovanych kusov je viac ako 0. Detail produktu zobrazuje, kedy bol produkt predavany. Produktu mozno manualne
                   menit kvantitu a ak nebol nikdy predavany mozno ho zmazat.</p>

                <x-table.warehouseProductsTable :warehouseProducts="$warehouseActiveProducts"/>
            </div>
        </div>
    </div>

@endsection
