@aware(['product'])

<div class="row p-2 mb-2 bg-white border rounded">
    <div class="col-md-3 mt-1">
        @if (!is_null($product->getImagePathIfExists()))
            <img class="img-fluid img-responsive rounded product-image" src="{{asset('/storage/images/products/' . $product->getImagePathIfExists())}}" alt="">
        @else
            <img class="img-fluid img-responsive rounded product-image" src="{{asset('/images/imageMissing.jpg')}}" alt="">
        @endif
    </div>

    <div class="col-md-6 mt-1">
        <h5>{{$product->getWarehouseProduct()->product}}</h5>
        <div class="d-flex flex-row">
            <div class="ratings mr-2">&#9733;&#9733;&#9733;&#9733;&#9733;</div><span>TODO</span>
        </div>

        <p class="cropText3Lines pt-3 text-justify para mb-0">{{$product->description}}</p>
    </div>
    <div class="align-items-center align-content-center col-md-3 border-left mt-1">
        <div class="d-flex flex-row align-items-center">
            <h4 class="mr-1">{{$product->getNewestPrice()->price}} &euro;</h4>
        </div>

        @if ($product->isAvailable())
            <h6 class="text-success">Na sklade</h6>
        @else
            <h6 class="text-danger">Vypredane</h6>
        @endif

        <div class="d-flex flex-column mt-4">
            <button class="btn btn-primary btn-sm" type="button">Detaily</button>
            <button class="btn btn-outline-primary btn-sm mt-2" type="button">Do kosika</button>
        </div>
    </div>
</div>
