@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/categoryProducts.css')}}">

    <x-other.flashMessage/>
    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenu :categories="$categories" :activeCategory="$activeCategory"/>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="container mb-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            @foreach ($productsFromCategory as $productFromCategory)
                                <x-shop.productCard :product="$productFromCategory"/>
                            @endforeach

                            {{$productsFromCategory->onEachSide(1)->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
