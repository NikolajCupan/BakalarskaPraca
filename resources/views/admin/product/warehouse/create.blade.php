@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-navbar.navbarAdmin homePath="/admin/product"/>

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
                    <div class="mt-2 mb-5 container border formFrame">
                        <div class="row d-flex justify-content-center">
                            <div class="p-0 col-md-12 col-lg-6">
                                <div class="p-3 pt-md-5 p-lg-5 card-body text-black">
                                    <div class="form-group form-floating">
                                        <input type="text" class="form-control" name="product" id="product" placeholder="product" value="{{old('product')}}">
                                        <label for="product">Nazov produktu <span class="text-danger fw-bold">*</span></label>
                                    </div>

                                    @error('product')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="p-0 col-md-12 col-lg-6">
                                <div class="p-3 p-lg-5 card-body text-black">
                                    <div class="form-group form-floating">
                                        <input type="number" class="form-control" name="quantity" id="quantity" placeholder="quantity" value="{{old('quantity')}}">
                                        <label for="quantity">Pocet kusov produktu <span class="text-danger fw-bold">*</span></label>
                                    </div>

                                    @error('quantity')
                                    <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="p-3 pb-md-5 pt-md-0 pt-lg-0 p-lg-5 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark btn-lg ms-2">Pridat</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
