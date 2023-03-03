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
            <svg style="margin-bottom: 8px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="editBasketProduct d-inline-block bi bi-pencil-square" viewBox="0 0 16 16">
                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
            </svg>
        </a>

        <a class="openDeleteBasketProductModal"
                data-product-name="{{$basketProduct->getProduct()->getWarehouseProduct()->product}}"
                data-id-basket="{{$basketProduct->id_basket}}"
                data-id-product="{{$basketProduct->id_product}}"
                data-bs-toggle="modal" data-bs-target="#deleteBasketProductModal">
            <svg style="margin-bottom: 8px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="deleteBasketProduct d-inline-block ms-2 bi bi-trash3" viewBox="0 0 16 16">
                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
            </svg>
        </a>
    </td>
</tr>
