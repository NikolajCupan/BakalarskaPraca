@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-navbar.navbarAdmin homePath="/admin/purchase"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminPurchase/>
            </div>
            <div class="col-md-12 col-lg-9">
                <h3 class="title">Objednavka cislo {{$purchase->id_purchase}}</h3>

                <div class="d-inline-block">
                    @if (!$purchase->hasStatus('cancelled'))
                        <button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#cancelPurchaseModal">Zrusit objednavku</button>
                    @endif
                    <button type="button" class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#setPaymentDateModal">Nastavit datum platby</button>
                    <button type="button" class="btn btn-dark mb-2" data-bs-toggle="modal" data-bs-target="#setPurchaseStatusModal">Nastavit status</button>

                    <form class="d-inline-block" action="/pdf/purchase" method="POST" target="_blank">
                        @csrf
                        <input type="hidden" name="purchaseId" value="{{$purchase->id_purchase}}">
                        <button type="submit" class="btn btn-dark mb-2">Otvorit PDF</button>
                    </form>
                </div>

                <x-shop.purchaseInformation :purchase="$purchase"/>

                <h3 class="mt-5 title">Informacie o pouzivatelovi</h3>
                <!-- User might have deleted his account -->
                @if (is_null($user))
                    <p class="text-danger">Pouzivatel zmazal svoj ucet</p>
                @else
                    <x-table.usersTable :users="$user"/>
                @endif

                <h3 class="mt-5 title">Objednane produkty</h3>
                <x-table.purchaseProductsTable :purchaseDate="$purchase->purchase_date" :basketProducts="$purchase->getBasket()->getBasketProducts()" path="/admin/product/shop/show/"/>
            </div>
        </div>
    </div>

    <!-- Cancel purchase -->
    <div class="modal fade" id="cancelPurchaseModal" tabindex="-1" aria-labelledby="cancelPurchaseModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="cancelPurchaseModalLabel">Zrusit objednavku</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ste si isty, ze chcete zrusit objednavku? Vsetky objednane produkty budu vratene na sklad.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Nie</button>
                    <form method="POST" action="/admin/purchase/cancelPurchase/">
                        @csrf
                        <input type="hidden" name="purchaseId" id="purchaseId" value="{{$purchase->id_purchase}}">
                        <button type="submit" class="btn btn-danger">Zrusit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Set purchase payment date modal -->
    <div class="modal fade" id="setPaymentDateModal" tabindex="-1" aria-labelledby="setPaymentDateModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="setPaymentDateModalLabel">Nastavit datum platby</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Set purchase status modal -->
    <div class="modal fade" id="setPurchaseStatusModal" tabindex="-1" aria-labelledby="setPurchaseStatusModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="setPurchaseStatusModalLabel">Nastavit status</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
