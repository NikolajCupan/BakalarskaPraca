@extends('layout.layout')

@section('content')

    <script type="text/javascript" src="{{asset('js/numberSelector.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/navbarToggles.js')}}"></script>

    <x-other.flashMessage/>
    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <div class="container mt-4">
        <div class="productShowCard rounded border" style="background-color: white">
            <div class="card-body">
                <div class="row gx-5">
                    <div class="col-lg-5 col-md-5 mt-xl-3">
                        <div class="me-3 me-md-0 ms-3 mt-3 mt-xl-0 text-center">
                            @if (!is_null($product->getImagePathIfExists()))
                                <img class="productImage img-fluid img-responsive rounded" src="{{asset('/storage/images/products/' . $product->getImagePathIfExists())}}" alt="">
                            @else
                                <img class="productImage img-fluid img-responsive rounded" src="{{asset('/images/imageMissing.jpg')}}" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-7 ms-3 ms-sm-5 ms-md-0 mt-md-0 mt-4">
                        <h2 class="box-title mt-md-3 mt-lg-5">{{$product->getWarehouseProduct()->product}} </h2>

                        <div class="d-flex mt-4">
                            <div class="d-flex mr-2"><x-shop.stars :product="$product"/></div>
                            <x-shop.reviewsCount :product="$product"/>
                        </div>

                        @if ($product->isAvailable())
                            <h5 class="text-success">Na sklade ({{$product->getWarehouseProduct()->quantity}} ks)</h5>
                        @else
                            <h5 class="text-danger">Vypredane</h5>
                        @endif

                        <h2 class="mt-4">
                            {{$product->getNewestPrice()->price}} &euro;
                        </h2>

                        <form method="POST" action="/user/addToCart" class="d-flex">
                            @csrf
                            <input type="hidden" name="productId" id="productId" value="{{$product->id_product}}">

                            <x-shop.numberSelector/>
                            <button class="ms-2 btn btn-dark" type="submit">Pridat do kosika</button>
                        </form>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 mt-5">
                        <nav class="ms-3 me-3 nav nav-pills justify-content-center flex-column flex-sm-row">
                            <a id="toggleDescription" class="me-sm-3 text-center flex-sm-fill text-sm-center nav-link toggles">Popis</a>
                            <a id="toggleRating" class="ms-sm-3 me-sm-3 text-center flex-sm-fill text-sm-center nav-link toggles">Hodnotenie</a>
                            <a id="toggleReviews" class="ms-sm-3 text-center flex-sm-fill text-sm-center nav-link toggles">Recenzie</a>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="mt-4 ms-4 me-4">
                <div id="collapseDescription" class="collapse">
                    <x-shop.collapse.description :description="$product->description"/>
                </div>

                <div id="collapseRating" class="collapse">
                    <x-shop.collapse.rating/>
                </div>

                <div id="collapseReviews" class="collapse">
                    <x-shop.collapse.reviews/>
                </div>
            </div>

        </div>
    </div>

@endsection
