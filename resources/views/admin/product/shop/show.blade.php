@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminProduct.css')}}">

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct/>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="d-xl-flex justify-content-between">
                    <h3 class="title">Informacie o predavanom produkte</h3>

                    @if (!$product->isSaleOver())
                    <div>
                        <a class="btn btn-dark" href="/admin/product/shop/edit/{{$product->id_product}}">Editovat</a>
                    </div>
                    @endif
                </div>

                <h4 class="mt-5 title">Skladove informacie</h4>
                <x-warehouseProductsTable :warehouseProducts="$warehouseProduct"/>

                <h4 class="mt-5 title">Informacie o predaji</h4>
                <x-productsTable :products="$product"/>

                <h4 class="mt-5 title">Historia cien</h4>
                <x-pricesTable :prices="$prices"/>
            </div>
        </div>
    </div>

@endsection
