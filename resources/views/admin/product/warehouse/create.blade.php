@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminProduct.css')}}">

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"warehouseCreate"'/>
            </div>

            <div class="col-md-12 col-lg-9">

                <h3 class="title">Novy produkt na sklade</h3>
                <p>Nasledujuci formular sluzi na pridanie noveho produktu na sklad. Produkt nachadzajuci sa na sklade nemusi byt predavany.
                   Zo skladu mozno odstranit iba take produkty, ktore nikdy neboli predavane. Mnozstvo skladovaneho produktu je mozne menit
                   - vhodne ak dojde napriklad k poskodeniu tovaru, dodavke tovaru a podobne.</p>

                <form method="POST" action="/admin/product/warehouse/create">
                    @csrf
                    <div class="mt-4 col-md-6 mb-4">
                        <div class="form-group form-floating">
                            <input type="text" class="form-control" name="product" id="product" placeholder="product" value="{{old('product')}}">
                            <label for="product">Nazov produktu <span class="text-danger fw-bold">*</span></label>
                        </div>

                        @error('product')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-4">
                        <div class="form-group form-floating">
                            <input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity" value="{{old('quantity')}}">
                            <label for="quantity">Pocet kusov produktu <span class="text-danger fw-bold">*</span></label>
                        </div>

                        @error('quantity')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg ms-2">Pridat</button>
                </form>

            </div>
        </div>
    </div>

@endsection
