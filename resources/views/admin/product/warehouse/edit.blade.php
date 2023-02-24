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
                    <h3 class="title">Informacie o produkte na sklade</h3>

                    <div class="mb-lg-3 mb-xl-0">
                        <div class="inner pb-1">
                            @if ($warehouseProduct->canBeDeleted())
                            <button type="button" class="btn btn-danger ms-2 ms-lg-0" data-bs-toggle="modal" data-bs-target="#confirmDestroyModal">
                                Zmazat
                            </button>
                            @endif
                        </div>

                        <div class="inner">
                            @if (!$warehouseProduct->isSold())
                            <a href="/admin/product/shop/create/{{$warehouseProduct->id_warehouse_product}}" class="btn btn-dark ms-2">
                                Spustit predaj
                            </a>
                            @endif
                        </div>
                    </div>
                </div>

                <p>Nasledujuca stranka zobrazuje informacie o produkte na sklade. Tabulka obsahuje historicke udaje o tom, kedy bol produkt predavany.
                   Detail predavaneho produktu zobrazuje informacie o cenach pocas predaja. Predaj produktu mozno kedykolvek zastavit.</p>

                @if ($warehouseProduct->isActive())
                    <h4 class="mt-2 mb-1 activeProduct">Produkt je aktivny:</h4>
                @else
                    <h4 class="mt-2 mb-1 inactiveProduct">Produkt je neaktivny:</h4>
                @endif

                @if ($warehouseProduct->isSold())
                    <p class="mb-0 activeProduct">- produkt je predavany</p>
                @else
                    <p class="mb-0 inactiveProduct">- produkt nie je predavany</p>
                @endif

                @if ($warehouseProduct->quantity > 0)
                    <p class="mt-0 mb-4 activeProduct">- produkt je na sklade</p>
                @else
                    <p class="mt-0 mb-4 inactiveProduct">- produkt je vypredany</p>
                @endif

                <form method="POST" action="/admin/product/warehouse/update">
                    @csrf
                    <input type="hidden" name="warehouseProductId" id="warehouseProductId" value="{{$warehouseProduct->id_warehouse_product}}">

                    <div class="mt-3 col-md-6 mb-4">
                        <div class="form-group form-floating">
                            <input disabled type="text" class="form-control" name="product" id="product" placeholder="product" value="{{$warehouseProduct->product}}">
                            <label for="product">Nazov produktu</label>
                        </div>

                        @error('product')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-group form-floating">
                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity" value="{{old('quantity') ?? $warehouseProduct->quantity}}">
                            <label for="quantity">Pocet kusov produktu</label>
                        </div>

                        @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg ms-2">Ulozit</button>
                </form>

                <h4 class="mt-5 title">Historia predavania produktu</h4>
                <x-table.productsTable :products="$products"/>

            </div>
        </div>
    </div>

    <!-- Warehouse product destroy confirmation modal -->
    <div class="modal fade" id="confirmDestroyModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalLabel">Potvrdenie zmazania</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Zmazany produkt nie je mozne obnovit. Ste si isty, ze chcete vykonat nasledujucu akciu?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Nie</button>
                    <form method="POST" action="/admin/product/warehouse/destroy">
                        @csrf
                        <input type="hidden" name="warehouseProductId" id="warehouseProductId" value="{{$warehouseProduct->id_warehouse_product}}">
                        <button type="submit" class="btn btn-danger">Zmazat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
