@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminProduct.css')}}">

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"warehouseEdit"'/>
            </div>

            <div class="col-md-12 col-lg-9">

                <div class="d-flex justify-content-between">
                    <h3 class="title">Zakladne informacie o produkte</h3>

                    <div>
                        <div class="inner pb-1">
                            @if ($warehouseProduct[0]->canBeDeleted())
                            <form method="POST" action="/admin/product/warehouse/destroy">
                                @csrf
                                <input type="hidden" name="warehouseProductId" id="warehouseProductId" value="{{$warehouseProduct[0]->id_warehouse_product}}">
                                <button type="submit" class="btn btn-danger ms-2">Zmazat</button>
                            </form>
                            @endif
                        </div>

                        <div class="inner">
                            @if (!$warehouseProduct[0]->isSold())
                            <a href="/admin/product/shop/create/{{$warehouseProduct[0]->id_warehouse_product}}" type="submit" class="btn btn-dark ms-2">
                                Spustit predaj
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                @if ($warehouseProduct[0]->isActive())
                    <h4 class="mt-2 activeProduct">Produkt je aktivny</h4>
                @else
                    <h4 class="mt-2 inactiveProduct">Produkt je neaktivny</h4>
                @endif

                <form method="POST" action="/admin/product/warehouse/update">
                    @csrf
                    <input type="hidden" name="warehouseProductId" id="warehouseProductId" value="{{$warehouseProduct[0]->id_warehouse_product}}">

                    <div class="mt-3 col-md-6 mb-4">
                        <div class="form-group form-floating">
                            <input disabled type="text" class="form-control" name="product" id="product" placeholder="product" value="{{$warehouseProduct[0]->product}}">
                            <label for="product">Nazov produktu</label>
                        </div>

                        @error('product')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-group form-floating">
                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity" value="{{old('quantity') ?? $warehouseProduct[0]->quantity}}">
                            <label for="quantity">Pocet kusov produktu</label>
                        </div>

                        @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg ms-2">Ulozit</button>
                </form>

                <h3 class="mt-5 title">Historia predavania produktu</h3>
                <x-productsTable :products="$products"/>

            </div>
        </div>
    </div>

@endsection
