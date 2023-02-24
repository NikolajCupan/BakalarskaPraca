@extends('layout.layout')

@section('content')

    <script type="text/javascript" src="{{asset('js/numberSelector.js')}}"></script>

    <x-navbar.navbar :imagePath="$imagePath" :user="$user"/>

    <style>
        .card {
            margin-bottom: 30px;
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-clip: border-box;
            border: 0 solid transparent;
            border-radius: 0;
        }
    </style>

    <div class="container mt-4">
        <div class="card rounded border">
            <div class="card-body">
                <div class="row gx-5">

                    <div class="col-lg-5 col-md-5 mt-xl-3">
                        <div class="text-center">
                            @if (!is_null($product->getImagePathIfExists()))
                                <img class="img-fluid img-responsive rounded" src="{{asset('/storage/images/products/' . $product->getImagePathIfExists())}}" alt="">
                            @else
                                <img class="img-fluid img-responsive rounded" src="{{asset('/images/imageMissing.jpg')}}" alt="">
                            @endif
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-7 ms-md-0 ms-sm-4 mt-md-0 mt-4">
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

                        <div class="input-group" style="width: 120px">
                            <span class="input-group-btn">
                            <button id="decrementButton" class="btn" type="button">-</button>
                            </span>

                            <input id="quantityValue" type="number" class="form-control text-center" maxlength="3" value="1">

                            <span class="input-group-btn">
                            <button id="incrementButton" class="btn" type="button">+</button>
                            </span>
                        </div>
                        
                        <button class="btn btn-dark">Pridat do kosika</button>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">General Info</h3>
                        {{$product->description}}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
