@aware(['reviews'])
@aware(['product'])
@aware(['loggedUser'])

<script>
    $(document).on("click", ".confirmDeleteReviewClass", function () {
        let reviewAuthorId = $(this).data('id');
        $("#authorId").val(reviewAuthorId);
    });

    $(document).ready(function() {
        // Prevents form from submitting when comment has too many characters
        $("#createReviewForm").submit(function(e) {
            let charCount = $('#comment').val().length;
            // 999 might be subject to change (see: Helpers/Constants -> MAX_REVIEW_COMMENT_CHARACTERS)
            if (charCount > 999)
            {
                alert('Pole komentar nemoze mat viac ako 999 znakov.');
                e.preventDefault(e);
            }
        });
    });
</script>

<style>
    @media (max-width: 767px) {
        .addReviewContainer {
            text-align: center;
        }
    }

    .addReview {
        padding: 12px 20px;
        border-radius: 6px;
    }

    .wrapText {
        overflow-wrap: anywhere;
    }

    .loggedUserReview {
        border: 1px solid black;
    }
</style>

<link rel="stylesheet" href="{{asset('css/review.css')}}">
<script src="{{asset('js/editReview.js')}}" defer></script>

<div class="addReviewContainer mt-3 mb-3">
    @if (is_null($loggedUser) || !$product->hasReviewFromUser($loggedUser))
        <a class="btn btn-dark addReview d-inline justify-content-center fs-5 fw-bold"
        {!! Auth::check() ? "data-bs-toggle='modal' data-bs-target='#createReview'" : "href='/login'" !!}>
            Napisat recenziu
            <svg style="margin-bottom: 2px" class="d-inline-block bi bi-plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </a>
    @endif
</div>

<div class="container d-flex mb-4">
    <div class="row w-100">
        <div class="col-md-12 p-0">
            <div class="reviewCard">
                <div class="comment-widgets m-b-20">
                    <div class="row">
                        <div class="col-12 p-0">
                            @if ($product->hasReviewFromUser($loggedUser))
                                @php ($userReview = $product->getReviewFromUser($loggedUser))
                                <div class="loggedUserReview">
                                <x-shop.collapse.review :review="$userReview" :loggedUser="$loggedUser"/>
                                </div>
                            @endif

                            @foreach ($reviews as $review)
                                @if ($review->id_user != $loggedUser->id_user)
                                <x-shop.collapse.review :review="$review" :loggedUser="$loggedUser"/>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review create modal -->
<div class="modal fade" id="createReview" tabindex="-1" data-bs-backdrop="static" aria-labelledby="newReviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="newReviewModalLabel">Nova recenzia</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="createReviewForm" method="POST" action="/user/createReview">
                @csrf
                <div class="modal-body">
                    <label class="form-label" for="comment">Komentar</label>
                    <textarea class="form-control" placeholder="nepovinne" name="comment" id="comment" style="height: 200px">{{old('comment')}}</textarea>

                    <select class="mt-3 form-select form-control-color" aria-label="stars selector" name="rating" id="rating">
                        <option value="0">&star;&star;&star;&star;&star;</option>
                        <option value="1">&starf;&star;&star;&star;&star;</option>
                        <option value="2">&starf;&starf;&star;&star;&star;</option>
                        <option value="3">&starf;&starf;&starf;&star;&star;</option>
                        <option value="4">&starf;&starf;&starf;&starf;&star;</option>
                        <option value="5" selected>&starf;&starf;&starf;&starf;&starf;</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="newReviewProductId" id="newReviewProductId" value="{{$product->id_product}}">
                    <button type="submit" class="btn btn-dark">Odoslat</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Review deletion confirmation modal -->
<div class="modal fade" id="confirmDeleteReview" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="modalLabel">Potvrdenie zmazania</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Zmazanu recenziu nie je mozne obnovit. Ste si isty, ze chcete vykonat nasledujucu akciu?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Nie</button>
                <form method="POST" action="/user/destroyReview">
                    @csrf
                    <input type="hidden" name="destroyReviewProductId" id="destroyReviewProductId" value="{{$product->id_product}}">
                    <input type="hidden" name="authorId" id="authorId" value="">
                    <button type="submit" class="btn btn-danger">Zmazat</button>
                </form>
            </div>
        </div>
    </div>
</div>
