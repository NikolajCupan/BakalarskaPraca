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
                    <h3 class="title">Editovanie predavaneho produktu</h3>

                    @if (!$product->isSaleOver())
                    <form method="POST" action="/admin/product/shop/endSale/">
                        @csrf
                        <input type="hidden" name="productId" id="productId" value="{{$product->id_product}}">
                        <button type="submit" class="btn btn-danger ms-2">Ukoncit predaj</button>
                    </form>
                    @endif
                </div>

                <p>TODO: dopisat</p>

                {{$warehouseProduct}}
                {{$product}}

                <form method="POST" action="/admin/product/warehouse/destroy">
                    @csrf
                    <input type="hidden" name="warehouseProductId" id="warehouseProductId" value="{{$warehouseProduct->id_warehouse_product}}">
                    <button type="submit" class="btn btn-danger ms-2">Zmazat</button>
                </form>

            </div>
        </div>
    </div>

@endsection
