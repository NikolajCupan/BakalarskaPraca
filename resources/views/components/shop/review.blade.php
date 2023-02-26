@aware(['review'])
@aware(['loggedUser'])

<style>
    .wrapText {
        word-break: break-all;
    }
</style>

<div class="d-flex flex-row comment-row">
    <div class="p-2">
        <span class="round">
            @if (!is_null($review->getAuthor()->getImagePathIfExists()))
                <img src="{{asset('/storage/images/users/' . $review->getAuthor()->getImagePathIfExists())}}" alt="" width="50">
            @else
                <img src="{{asset('/images/userNoImage.png')}}" alt="" width="50">
            @endif
        </span>
    </div>

    <div class="comment-text w-100">

        <h5 class="reviewTitle mb-1">{{$review->getAuthor()->first_name . ' ' . $review->getAuthor()->last_name}}</h5>

        <div class="comment-footer mb-3">
            <span class="date">
                <div class="d-flex ratings mr-2">
                    <x-shop.stars :stars="$review->rating"/>

                    @if ($loggedUser->ownsReview($review) || $loggedUser->hasRole('moderator'))
                    <a class="editReviewClass reviewAction" data-rating="{{$review->rating}}" data-product-id="{{$review->id_product}}" data-author-id="{{$review->id_user}}">
                        <svg style="margin-top: 3px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-3 bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>

                    <a class="confirmDeleteReviewClass reviewAction" data-id="{{$review->id_user}}" data-bs-toggle="modal" data-bs-target="#confirmDeleteReview">
                        <svg style="margin-top: 3px" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="ms-1 bi bi-trash3" viewBox="0 0 16 16">
                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                        </svg>
                    </a>
                    @endif
                </div>
            </span>
        </div>

        <p id="product{{$review->id_product}}author{{$review->id_user}}" class="wrapText m-b-5 m-t-10">
            {{$review->comment}}
        </p>
    </div>

</div>
