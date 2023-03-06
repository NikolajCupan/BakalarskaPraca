@extends('layout.layout')

@section('content')

    <script type="text/javascript" src="{{asset('js/editBasketProduct.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/numberSelector.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/basketStyles.css')}}">

    <x-other.flashMessage/>
    <x-other.backArrow path="/"/>

    <div class="px-4 px-lg-0">
        <div class="container text-white py-5 text-center">
            <h1 class="display-4">Vas Kosik</h1>
        </div>

        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                        @if ($basket->getBasketProducts()->count() == 0)
                            <div class="row mt-3 mb-3 text-center emptyBasket">
                                <div class="col-12 col-sm-6 mb-3 mb-sm-0">
                                    <strong class="text-muted">Vas kosik je prazdny</strong>
                                </div>

                                <div class="col-12 col-sm-6 text-center">
                                    <a href="/" class=" btn btn-dark rounded-pill py-2 btn-block">Nakupovat</a>
                                </div>
                            </div>
                        @else
                            <!-- Large screen -->
                            <div class="d-none d-lg-block table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Produkt</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Cena</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Kvantita</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Spolu</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Akcia</div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($basket->getBasketProducts() as $basketProduct)
                                        <x-shop.basket.basketProduct :basketProduct="$basketProduct"/>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <!-- Small screen -->
                            <div class="d-lg-none">
                            @foreach ($basket->getBasketProducts() as $basketProduct)
                                <x-shop.basket.basketProductSmall :basketProduct="$basketProduct"/>
                            @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Informacie</div>
                        <div class="ps-0 pe-0 pt-4 pb-4 p-md-4">
                            <p class="font-italic mb-4">
                                Kazda vykonana objednavka je zavazna. Umyselne neuhradenie objednavky bude viest k zruseniu Vasho uctu.
                            </p>

                            <p class="font-italic mb-4">
                                Nakupom na nasom e-shope suhlasite s <a target="_blank" href="/terms" class="link-info">obchodnymi podmienkami</a>. Preto im, prosim, venujte dostatocnu pozornost a dokladne si ich precitajte. E-shop si vyhraduje pravo kedykolvek <a target="_blank" href="/terms" class="link-info">obchodne podmienky</a> zmenit.
                            </p>

                            <p class="font-italic mb-4">
                                Majitel e-shopu nenesie zodpovednost za nepravdive informacie v recenciach produktov od zakaznikov.
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Suhrn objednavky</div>
                        <div class="ps-0 pe-0 pt-4 pb-4 p-md-4">
                            <p class="font-italic mb-4">
                                Pred pokracovanim si, prosim, skontrolujte Vas tovar. Objednavku je mozne vykonat len vtedy, ked z kazdeho tovaru v kosiku, je na sklade dostatok kusov.
                            </p>
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tovar </strong><strong id="totalPurchasePrice">{{$basket->getTotalPrice()}} &euro;</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Dovoz </strong><strong>{{\App\Helpers\Constants::getFormattedDeliveryFee()}} &euro;</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Celkovo </strong>
                                    <h5 id="totalPurchasePriceWithFee" class="font-weight-bold">{{$basket->getTotalPriceWithFee()}} &euro;</h5>
                                </li>
                            </ul>
                            <a id="continueButton" href="/user/purchase/confirm" class="btn btn-dark rounded-pill py-2 btn-block
                            {{($basket->getBasketProducts()->count() == 0 || !$basket->isOrderable()) ? "disabled" : ""}}">
                                Pokracovat
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit basket product -->
    <div class="modal fade" id="editBasketProductModal" tabindex="-1" aria-labelledby="editBasketProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editBasketProductModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <p class="mb-1">Pocet kusov v kosiku</p>
                    <x-shop.elements.numberSelector/>

                    <p class="mt-4 mb-1">Pocet kusov na sklade</p>
                    <input id="warehouseQuantity" class="form-control" type="text" placeholder="" aria-label="Disabled input example" disabled readonly>

                    <input id="basketId" type="hidden">
                    <input id="productId" type="hidden">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Zrusit</button>
                    <a class="editBasketProductClass btn btn-dark" type="button">Ulozit</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete basket product -->
    <div class="modal fade" id="deleteBasketProductModal" tabindex="-1" aria-labelledby="deleteBasketProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteBasketProductModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    Ste si isty, ze chcete zmazat tento tovar z kosiku?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nie</button>
                    <form method="POST" action="/user/destroyBasketProduct">
                        @csrf
                        <input type="hidden" name="destroyBasketId" id="destroyBasketId" value="">
                        <input type="hidden" name="destroyProductId" id="destroyProductId" value="">
                        <button class="btn btn-danger" type="submit">Zmazat</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
