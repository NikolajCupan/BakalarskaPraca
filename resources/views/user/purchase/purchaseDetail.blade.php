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

        <x-shop.purchaseInformation :purchase="$purchase"/>

        <h3 class="mt-5 title">Objednane produkty</h3>
        <x-table.purchaseProductsTable :purchaseDate="$purchase->purchase_date" :basketProducts="$purchase->getBasket()->getBasketProducts()" path="/shop/product/"/>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
