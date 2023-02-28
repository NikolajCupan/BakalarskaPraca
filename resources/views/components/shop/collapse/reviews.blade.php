@aware(['reviews'])
@aware(['product'])
@aware(['loggedUser'])

<script>
    $(document).on("click", ".confirmDeleteReviewClass", function () {
        var reviewAuthorId = $(this).data('id');
        $("#authorId").val(reviewAuthorId);
    });
</script>

<link rel="stylesheet" href="{{asset('css/review.css')}}">
<script src="{{asset('js/editReview.js')}}" defer></script>

<div class="container d-flex mt-100 mb-100">
    <div class="row w-100">
        <div class="col-md-12 p-0">
            <div class="reviewCard">
                <div class="reviewCardBody">
                    <h4 class="card-title">Recent Comments</h4>
                    <h6 class="card-subtitle">Latest Comments section by users</h6> </div>

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
