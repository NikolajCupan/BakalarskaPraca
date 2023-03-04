@aware(['basketProduct'])
@php ($product = $basketProduct->getProduct())

<tr>
    <th scope="row" class="border-0">
        <div class="p-2">
            @if (!is_null($product->getImagePathIfExists()))
                <img src="{{asset('/storage/images/products/' . $product->getImagePathIfExists())}}" alt="" width="70" class="img-fluid rounded shadow-sm">
            @else
                <img src="{{asset('/images/imageMissing.jpg')}}" alt="" width="70" class="img-fluid rounded shadow-sm">
            @endif

            <div class="ms-3 d-inline-block align-middle">
                <h5 class="mb-0">
                    <a target="_blank" href="/shop/product/{{$product->id_product}}" class="basketProductName text-dark d-inline-block align-middle">{{$product->getWarehouseProduct()->product}}</a>
                </h5>
                <span class="text-muted font-weight-normal font-italic d-block">{{$product->getCategory()->category}}</span>
            </div>
        </div>
    </th>

    <td class="border-0 align-middle">{{$product->getNewestPrice()->price}} &euro;</td>
    <td class="border-0 align-middle">
        <span id="quantityBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}">{{$basketProduct->quantity}}</span> ks
        @if (!$basketProduct->getProduct()->isAvailable())
            <span class="text-danger">(vypredane)</span>
        @else
            <span id="warehouseQuantityBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}" class="{{$basketProduct->getProduct()->getWarehouseProduct()->quantity >= $basketProduct->quantity ? 'text-success' : 'text-danger'}}">
                (na sklade {{$basketProduct->getProduct()->getWarehouseProduct()->quantity}} ks)
            </span>
        @endif
    </td>
    <td class="border-0 align-middle"><strong id="totalPriceBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}">{{$basketProduct->getTotalPrice()}} &euro;</strong></td>
    <td class="border-0 align-middle">
        <x-shop.basket.iconEdit :basketProduct="$basketProduct"/>
        <x-shop.basket.iconDelete :basketProduct="$basketProduct"/>
    </td>
</tr>
