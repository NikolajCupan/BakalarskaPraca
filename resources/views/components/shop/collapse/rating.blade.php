@aware(['product'])
@aware(['absoluteRatings'])
@aware(['percentageRatings'])

<style>
    .progressBar {
        display: inline-block;
        width: 70%;
    }

    .textStarRating {
        position: relative;
        bottom: 2px;
    }

    .svgStarRating {
        display: inline-block;
        margin-bottom: 10px;
        vertical-align: middle;
    }

    .ratingInformation {
        font-size: 25px;
    }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-6">
            @for ($i = 0; $i < 6; $i++)
                <div class="mb-2 text-center">
                    <span class="textStarRating">{{5 - $i}}</span>

                    <svg class="svgStarRating bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                    </svg>

                    <div class="progressBar progress" role="progressbar" aria-label="Rating" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar" style="width: {{$percentageRatings[5 - $i]}}%">{{$percentageRatings[5 - $i]}} %</div>
                    </div>

                    <span class="textStarRating">{{$absoluteRatings[5 - $i]}} x</span>
                </div>
            @endfor
        </div>

        <div class="col-md-6">
            <div class="ratingInformation text-center mt-4">
                <x-shop.elements.reviewsCount :product="$product"/>
            </div>
            <div class="ratingInformation text-center mt-4">
                Priemerne hodnotenie<br>
                <span class="fw-bold">{{$product->getStarsCount()}}</span>
                <svg class="svgStarRating bi bi-star-fill" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
                </svg>
            </div>
        </div>

        <div class="mt-5"></div>
    </div>
</div>
