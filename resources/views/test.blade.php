@extends('layout.layout')

@section('content')

    <style>
        .card-no-border .reviewCard {
            border: 0px;
            border-radius: 4px;
            -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
        }

        .reviewCardBody {
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .comment-widgets .comment-row:hover {
            background: rgba(0, 0, 0, 0.02);
            cursor: pointer;
        }

        .comment-widgets .comment-row {
            border-bottom: 1px solid rgba(120, 130, 140, 0.13);
            padding: 15px;
        }

        .comment-text:hover{
            visibility: hidden;
        }

        .comment-text:hover{
            visibility: visible;
        }

        .round img {
            border-radius: 100%;
        }

        .mt-100 {
            margin-top: 100px
        }

        .mb-100 {
            margin-bottom: 100px
        }

        .reviewAction:hover {
            text-decoration: none;
            color: inherit;
        }
    </style>

    <script>
        $(document).on("click", ".confirmDeleteReviewClass", function () {
            var reviewAuthorId = $(this).data('id');
            $("#authorId").val(reviewAuthorId);
        });
    </script>

    <script src="{{ asset('js/editComment.js') }}" defer></script>

    <div class="container d-flex justify-content-center mt-100 mb-100">
        <div class="row">
            <div class="col-md-12">
                <div class="reviewCard">
                    <div class="reviewCardBody">
                        <h4 class="card-title">Recent Comments</h4>
                        <h6 class="card-subtitle">Latest Comments section by users</h6> </div>

                    <div class="comment-widgets m-b-20">
                        <div class="row">
                            <div class="col-12">
                            @foreach ($reviews as $review)
                            <x-shop.review :review="$review" :loggedUser="$user"/>
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

@endsection
