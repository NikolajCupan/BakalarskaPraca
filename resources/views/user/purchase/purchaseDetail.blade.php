@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/userPurchasesStyles.css')}}">

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <div class="container mt-4">
        <div class="d-sm-flex justify-content-between">
            <h3 class="title">Informacie o objednavke</h3>

            <form action="/pdf/purchase" method="POST" target="_blank">
                @csrf
                <input type="hidden" name="purchaseId" value="{{$purchase->id_purchase}}">
                <button type="submit" class="btn btn-dark">Otvor PDF</button>
            </form>
        </div>

        @if (is_null($purchase->payment_date))
            <p class="mt-2 mb-2 text-danger">Platba za objednavku nebola vykonana. Vykonajte platbu na ucet:</p>
            <ul class="purchasePaymentList">
                <li><strong>IBAN:</strong> {{\App\Helpers\Constants::COMPANY_IBAN}}</li>
                <li><strong>Suma:</strong> {{$purchase->getTotalPrice()}} &euro;</li>
                <li><strong>Variabilny symbol:</strong> {{\App\Helpers\Helper::addLeadingZeros(10, $purchase->id_purchase)}}</li>
                <li><strong>Specificky symbol:</strong> {{\App\Helpers\Helper::addLeadingZeros(10, $purchase->id_purchase)}}</li>
                <li><strong>Konstantny symbol:</strong> {{\App\Helpers\Constants::CONSTANT_SYMBOL_PURCHASE}}</li>
            </ul>
        @else
            <p class="mt-2 mb-2 text-success">Platba za objednavku bola vykonana dna:</p>
            <ul class="purchasePaymentList">
                <li><strong>Datum platby:</strong> {{\App\Helpers\Helper::getFormattedDate($purchase->payment_date)}}</li>
            </ul>
        @endif

        <h3 class="mt-5 title">Vseobecne informacie</h3>
        <ul class="purchasePaymentList">
            <li><strong>ID:</strong> {{$purchase->id_purchase}}</li>
            <li><strong>Suma:</strong> {{$purchase->getTotalPrice()}} &euro;</li>
            <li><strong>Status:</strong> {{$purchase->getStatus()->status}}</li>
            <li><strong>Datum objednavky:</strong> {{\App\Helpers\Helper::getFormattedDate($purchase->purchase_date)}}</li>
            <li><strong>Datum platby:</strong><span class="{{is_null($purchase->payment_date) ? "text-danger" : ""}}"> {{\App\Helpers\Helper::getFormattedDate($purchase->payment_date) ?? "neuhradene"}}</span></li>
        </ul>

        <h3 class="mt-5 title">Dorucovacia adresa</h3>
        <ul class="purchasePaymentList">
            <li><strong>Mesto:</strong> {{$purchase->getAddress()->getCity()->city}}</li>
            <li><strong>PSC:</strong> {{substr_replace($purchase->getAddress()->getCity()->postal_code, " ", 3, 0)}}</li>
            <li><strong>Ulica:</strong> {{$purchase->getAddress()->street}}</li>
            <li><strong>Cislo domu:</strong> {{$purchase->getAddress()->house_number}}</li>
        </ul>

        <h3 class="mt-5 title">Objednane produkty</h3>
        <x-table.user.purchaseProductsTable :purchaseDate="$purchase->purchase_date" :basketProducts="$purchase->getBasket()->getBasketProducts()"/>
    </div>
@endsection

@section('footer')
    <x-footer.footer/>
@endsection