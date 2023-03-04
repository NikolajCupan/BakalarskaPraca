@aware(['basketProduct'])
@php ($product = $basketProduct->getProduct())

<div class="border-bottom">
    <div class="position-relative row mt-3 mb-3">
        <div class="col-12 col-md-3 basketProductImageSmallContainer">
                <img src="{{is_null($product->getImagePathIfExists()) ? asset('/images/imageMissing.jpg') : asset('/storage/images/products/' . $product->getImagePathIfExists())}}"
                     alt="" class="basketProductImageSmall img-fluid rounded">
        </div>

        <div class="basketProductDescriptionSmall col-12 offset-md-1 col-md-8">
            <h5 class="mb-0">
                <a target="_blank" href="/shop/product/{{$product->id_product}}" class="text-dark d-inline-block align-middle">{{$product->getWarehouseProduct()->product}}</a>
            </h5>
            <span class="text-muted font-weight-normal font-italic d-block">{{$product->getCategory()->category}}</span>

            <div class="mt-2">{{$product->getNewestPrice()->price}} &euro;</div>

            <div>
                <span id="quantityBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}">{{$basketProduct->quantity}}</span> ks
                @if (!$basketProduct->getProduct()->isAvailable())
                    <span class="text-danger">(vypredane)</span>
                @else
                    <span id="warehouseQuantityBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}" class="{{$basketProduct->getProduct()->getWarehouseProduct()->quantity >= $basketProduct->quantity ? 'text-success' : 'text-danger'}}">
                        (na sklade {{$basketProduct->getProduct()->getWarehouseProduct()->quantity}} ks)
                    </span>
                @endif
            </div>

            <strong id="totalPriceBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}">Spolu: {{$basketProduct->getTotalPrice()}} &euro;</strong>
        </div>

        <div class="position-absolute iconEdit">
            <x-shop.basket.iconEdit :basketProduct="$basketProduct"/>
        </div>
        <div class="position-absolute iconDelete">
            <x-shop.basket.iconDelete :basketProduct="$basketProduct"/>
        </div>
    </div>
</div>
