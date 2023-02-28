@aware(['reviews'])
@aware(['product'])
@aware(['loggedUser'])

<script>
    $(document).on("click", ".confirmDeleteReviewClass", function () {
        let reviewAuthorId = $(this).data('id');
        $("#authorId").val(reviewAuthorId);
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
</style>

<link rel="stylesheet" href="{{asset('css/review.css')}}">
<script src="{{asset('js/editReview.js')}}" defer></script>

<div class="addReviewContainer mt-3 mb-3">
    <!-- Link is changed if user is not logged in -->
    <a class="btn btn-dark addReview d-inline justify-content-center fs-5 fw-bold"
    {!! Auth::check() ? "data-bs-toggle='modal' data-bs-target='#createReview'" : "href='/login'" !!}>
        Napisat recenziu
        <svg style="margin-bottom: 2px" class="d-inline-block bi bi-plus-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
        </svg>
   </a>
</div>

<div class="container d-flex">
    <div class="row w-100">
        <div class="col-md-12 p-0">
            <div class="reviewCard">
                <div class="comment-widgets m-b-20">
                    <div class="row">
                        <div class="col-12 p-0">
                            @foreach ($reviews as $review)
                                <x-shop.collapse.review :review="$review" :loggedUser="$loggedUser"/>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Review create modal -->
<div class="modal fade" id="createReview" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
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
                    <input type="hidden" name="productId" id="productId" value="{{$product->id_product}}">
                    <input type="hidden" name="authorId" id="authorId" value="">
                    <button type="submit" class="btn btn-danger">Zmazat</button>
                </form>
            </div>
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
                    <input type="hidden" name="productId" id="productId" value="{{$product->id_product}}">
                    <input type="hidden" name="authorId" id="authorId" value="">
                    <button type="submit" class="btn btn-danger">Zmazat</button>
                </form>
            </div>
        </div>
    </div>
</div>
