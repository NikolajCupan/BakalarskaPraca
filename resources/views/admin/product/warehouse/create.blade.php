@extends('layout.layout')

@section('content')

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"warehouse"'/>
            </div>
            <div class="col-md-12 col-lg-9">

                <form method="POST" action="/admin/product/warehouse/create">
                    @csrf
                    <div class="col-md-6 mb-4">
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

                    <button type="submit" class="btn btn-dark btn-lg ms-2">Registrovat</button>
                </form>

            </div>
        </div>
    </div>

@endsection
