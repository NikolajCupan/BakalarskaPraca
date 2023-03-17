@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/userPurchasesStyles.css')}}">

    <x-other.flashMessage/>
    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <div class="container mt-4">
        <div class="d-md-flex justify-content-between">
            <h3 class="title">Informacie o objednavke</h3>

            <div class="mb-lg-3 mb-xl-0">
                @if ($purchase->hasStatus('delivered'))
                    <div class="d-inline-block">
                        <form class="d-inline-block" action="/user/purchase/confirm" method="POST">
                            @csrf
                            <input type="hidden" name="purchaseId" value="{{$purchase->id_purchase}}">
                            <button type="submit" class="btn btn-dark">Potvrdit dorucenie</button>
                        </form>
                    </div>
                @endif

                <div class="d-inline-block">
                    <form action="/pdf/purchase" method="POST" target="_blank">
                        @csrf
                        <input type="hidden" name="purchaseId" value="{{$purchase->id_purchase}}">
                        <button type="submit" class="btn btn-dark">Otvorit PDF</button>
                    </form>
                </div>
            </div>
        </div>

        @if ($purchase->hasStatus('cancelled'))
            <p class="mt-2 mb-2 text-danger">Objednavka bola zrusena</p>
        @elseif (is_null($purchase->payment_date))
            <p class="mt-2 mb-2 text-danger">Platba za objednavku nebola vykonana. Vykonajte platbu na ucet:</p>
            <ul class="purchaseDetailList">
                <li><strong>IBAN:</strong> {{\App\Helpers\Constants::COMPANY_IBAN}}</li>
                <li><strong>Suma:</strong> {{$purchase->getTotalPrice()}} &euro;</li>
                <li><strong>Variabilny symbol:</strong> {{\App\Helpers\Helper::addLeadingZeros(10, $purchase->id_purchase)}}</li>
                <li><strong>Specificky symbol:</strong> {{\App\Helpers\Helper::addLeadingZeros(10, $purchase->id_purchase)}}</li>
                <li><strong>Konstantny symbol:</strong> {{\App\Helpers\Constants::CONSTANT_SYMBOL_PURCHASE}}</li>
            </ul>
        @else
            <p class="mt-2 mb-2 text-success">Platba za objednavku bola vykonana dna:</p>
            <ul class="purchaseDetailList">
                <li><strong>Datum platby:</strong> {{\App\Helpers\Helper::getFormattedDate($purchase->payment_date)}}</li>
            </ul>
        @endif

        <x-shop.purchaseInformation :purchase="$purchase"/>

        <h3 class="mt-5 title">Objednane produkty</h3>
        <x-table.purchaseProductsTable :purchaseDate="$purchase->purchase_date" :basketProducts="$purchase->getBasket()->getBasketProducts()" path="/shop/product/"/>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
