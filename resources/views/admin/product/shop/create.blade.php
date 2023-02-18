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

                <h3 class="title">Novy predavany produkt</h3>
                <p>Nasledujuci formular sluzi na spustenie predaja produktu. Produktu je nutne nastavit cenu, obrazok, kategoriu a popis.
                   Predaj produktu je aktivny od momentu odoslania formulara. Pocas predaja je mozne produktu menit cenu, kategoriu
                   a ukoncit jeho predaj.</p>

                <div class="container border">
                    <div class="row d-flex justify-content-center">
                        <div class="col-6">
                            <div class="card-body p-md-5 text-black">
                                <div class="mb-4 form-group form-floating">
                                    <input type="text" class="form-control" name="product" id="product" placeholder="product" value="{{$warehouseProduct->product}}" disabled>
                                    <label for="product">Nazov produktu</label>
                                </div>

                                <div class="mb-4 form-group form-floating">
                                    <input type="text" class="form-control" name="product" id="product" placeholder="product" value="{{$warehouseProduct->quantity}}" disabled>
                                    <label for="product">Pocet kusov produktu</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card-body p-md-5 text-black">
                                <form>
                                    @csrf
                                    <div class="mb-4 form-group form-floating">
                                        <input type="text" class="form-control" name="product" id="product" placeholder="product" value="">
                                        <label for="product">Cena <span class="text-danger fw-bold">*</span></label>
                                    </div>

                                    <div class="mb-4 form-group form-floating">
                                        <input type="text" class="form-control" name="product" id="product" placeholder="product" value="">
                                        <label for="product">Kategoria <span class="text-danger fw-bold">*</span></label>
                                    </div>

                                    <div class="mb-4 form-group form-floating">
                                        <input type="text" class="form-control" name="product" id="product" placeholder="product" value="">
                                        <label for="product">Fotka <span class="text-danger fw-bold">*</span></label>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
