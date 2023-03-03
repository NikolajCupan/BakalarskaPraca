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
                    <a target="_blank" href="/shop/product/{{$product->id_product}}" class="text-dark d-inline-block align-middle">{{$product->getWarehouseProduct()->product}}</a>
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
            <span id="warehouseQuantityBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}" class="{{$basketProduct->getProduct()->getWarehouseProduct()->quantity > $basketProduct->quantity ? 'text-success' : 'text-danger'}}">
                (na sklade {{$basketProduct->getProduct()->getWarehouseProduct()->quantity}} ks)
            </span>
        @endif
    </td>
    <td class="border-0 align-middle"><strong id="totalPriceBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}">{{$basketProduct->getTotalPrice()}} &euro;</strong></td>
    <td class="border-0 align-middle">
        <a class="openEditBasketProductModal"
                id="actionButtonBasket{{$basketProduct->id_basket}}product{{$basketProduct->id_product}}"
                data-product-name="{{$basketProduct->getProduct()->getWarehouseProduct()->product}}"
                data-warehouse-quantity="{{$basketProduct->getProduct()->getWarehouseProduct()->quantity}}"
                data-basket-quantity="{{$basketProduct->quantity}}"
                data-id-basket="{{$basketProduct->id_basket}}"
                data-id-product="{{$basketProduct->id_product}}"
                data-bs-toggle="modal" data-bs-target="#editBasketProductModal">
            <svg style="margin-bottom: 8px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="editBasketProduct bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>

        <a>
            <svg style="margin-bottom: 8px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>
    </td>
</tr>
