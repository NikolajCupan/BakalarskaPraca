@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/categoryProducts.css')}}">

    <x-other.flashMessage/>
    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenu :categories="$categories"/>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="container mb-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            @if (is_null($searchedTerm))
                                <h2 class="title mb-2">Nastala chyba. Nebol zadany ziadny hladany vyraz.</h2>
                            @else
                                <h2 class="title mb-2">Hladany vyraz: {{$searchedTerm}}</h2>
                                <p class="font-italic text-muted mb-4">Pocet najdenych produktov: <strong>{{$productsCount}}</strong></p>

                                @foreach ($products as $product)
                                    <x-shop.productCard :product="$product"/>
                                @endforeach

                                {{$products->onEachSide(1)->links()}}
                            @endif
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
