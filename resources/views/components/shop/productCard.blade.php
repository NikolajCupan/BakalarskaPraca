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
            <div class="d-flex ratings mr-2">
                @php
                    $totalHalfStars = $product->getHalfStarsCount();

                    $fullStars = intdiv($totalHalfStars, 2);
                    $halfStars = $totalHalfStars - ($fullStars * 2);
                    $emptyStars = 5 - ($fullStars + $halfStars);
                @endphp

                @for ($i = 0; $i < $fullStars; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="starProduct bi bi-star-fill" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
                @endfor

                @for ($i = 0; $i < $halfStars; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="starProduct bi bi-star-half" viewBox="0 0 16 16">
                    <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z"/>
                </svg>
                @endfor

                @for ($i = 0; $i < $emptyStars; $i++)
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="starProduct bi bi-star" viewBox="0 0 16 16">
                    <path d="M2.866 14.85c-.078.444.36.791.746.593l4.39-2.256 4.389 2.256c.386.198.824-.149.746-.592l-.83-4.73 3.522-3.356c.33-.314.16-.888-.282-.95l-4.898-.696L8.465.792a.513.513 0 0 0-.927 0L5.354 5.12l-4.898.696c-.441.062-.612.636-.283.95l3.523 3.356-.83 4.73zm4.905-2.767-3.686 1.894.694-3.957a.565.565 0 0 0-.163-.505L1.71 6.745l4.052-.576a.525.525 0 0 0 .393-.288L8 2.223l1.847 3.658a.525.525 0 0 0 .393.288l4.052.575-2.906 2.77a.565.565 0 0 0-.163.506l.694 3.957-3.686-1.894a.503.503 0 0 0-.461 0z"/>
                </svg>
                @endfor
            </div>

            @php ($reviewCount = $product->getReviewCount())

            @if ($reviewCount == 0)
                <span class="text-danger">{{$reviewCount}} recenzii</span>
            @elseif ($reviewCount < 5)
                <span>{{$reviewCount}} recenzie</span>
            @else
                <span>{{$reviewCount}} recenzii</span>
            @endif
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
            <a type="button" class="btn btn-primary btn-sm" href="/shop/product/{{$product->id_product}}">Detaily</a>
            <button class="btn btn-outline-primary btn-sm mt-2" type="button">Do kosika</button>
        </div>
    </div>
</div>
