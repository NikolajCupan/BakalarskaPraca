@extends('layout.layout')

@section('content')

    <script type="text/javascript" src="{{asset('js/numberSelector.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/navbarToggles.js')}}"></script>

    <x-other.flashMessage/>
    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <section class="py-5 pt-0">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6">
                    <img src="{{$product->getImagePathIfExists() ? asset('/storage/images/products/' . $product->getImagePathIfExists()) : asset('/images/imageMissing.jpg')}}"
                         class="rounded card-img-top mb-5 mb-md-0 {{$product->isSaleOver() ? "imageSaleOver" : ""}}" alt="">
                </div>
                <div class="col-md-6">
                    <div class="small mb-1">{{$product->getCategory()->category}}</div>
                    <h1 class="display-5 fw-bolder mb-0">{{$product->getWarehouseProduct()->product}}</h1>

                    <div class="d-flex mb-4">
                        <div class="d-flex mr-2"><x-shop.elements.productStars :stars="$product->getStarsCount()"/></div>
                        <x-shop.elements.reviewsCount :product="$product"/>
                    </div>

                    @if ($product->isSaleOver())
                        <h5 class="text-danger mb-0">Predaj produktu bol ukonceny</h5>
                    @elseif($product->isAvailable())
                        <h5 class="text-success mb-0">Na sklade ({{$product->getWarehouseProduct()->quantity}} ks)</h5>
                    @else
                        <h5 class="text-danger mb-0">Vypredane</h5>
                    @endif

                    <div class="fs-5 mb-5">
                        <span>{{$product->getNewestPrice()->price}} &euro;</span>
                    </div>

                    <div class="d-flex">
                        @if ($product->isAvailable() && !$product->isSaleOver())
                        <form method="POST" action="/user/addToBasket" class="d-flex">
                            @csrf
                            <input type="hidden" name="productId" id="productId" value="{{$product->id_product}}">

                            <x-shop.elements.numberSelector/>
                            <button class="ms-2 btn btn-dark" type="submit">Pridat do kosika</button>
                        </form>
                        @else
                        <x-shop.elements.numberSelector/>
                        <button class="ms-2 btn btn-dark" disabled>Pridat do kosika</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="offset-1 col-10">
                <nav class="ms-3 me-3 nav nav-pills justify-content-center flex-column flex-sm-row">
                    <a id="toggleDescription" class="me-sm-3 text-center flex-sm-fill text-sm-center nav-link toggles">Popis</a>
                    <a id="toggleRating" class="ms-sm-3 me-sm-3 text-center flex-sm-fill text-sm-center nav-link toggles">Hodnotenie</a>
                    <a id="toggleReviews" class="ms-sm-3 text-center flex-sm-fill text-sm-center nav-link toggles">Recenzie</a>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt-4 ms-0 me-0 ms-md-4 me-md-4">
            <div id="collapseDescription" class="collapse">
                <x-shop.collapse.description :description="$product->description"/>
            </div>

            <div id="collapseRating" class="collapse">
                <x-shop.collapse.rating :absoluteRatings="$absoluteRatings" :percentageRatings="$percentageRatings" :product="$product"/>
            </div>

            <div id="collapseReviews" class="collapse">
                <x-shop.collapse.reviews :reviews="$reviews" :product="$product" :loggedUser="$user"/>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
