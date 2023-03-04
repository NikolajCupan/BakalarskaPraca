@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminProduct.css')}}">

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"shopSalable"'/>
            </div>

            <div class="col-md-12 col-lg-9">

                <h3 class="title">Novy predavany produkt</h3>
                <p>Nasledujuca stranka obsahuje dve tabulky. Prva tabulka zobrazuje produkty na sklade, ktore aktualne nie su predavane a pocet
                   skladovanych kusov je viac ako 0. Druha tabulka zobrazuje produkty, ktore tiez nie su predavane, ale pocet skladovanych kusov
                   je rovny 0. Predavat sa moze zacat ktoryhokolvek z uvedenych produktov.</p>

                <h3 class="mt-5 title">Na sklade</h3>
                <x-table.warehouseProductsTable :warehouseProducts="$inStock"/>

                <h3 class="mt-5 title">Vypredane</h3>
                <x-table.warehouseProductsTable :warehouseProducts="$outOfStock"/>

            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
