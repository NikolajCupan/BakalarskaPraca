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
                    <button type="submit" class="btn btn-danger mb-2">Zrusit objednavku</button>
                    <button type="submit" class="btn btn-dark mb-2">Nastavit datum platby</button>
                    <button type="submit" class="btn btn-dark mb-2">Nastavit status</button>

                    <form class="d-inline-block" action="/pdf/purchase" method="POST" target="_blank">
                        @csrf
                        <input type="hidden" name="purchaseId" value="{{$purchase->id_purchase}}">
                        <button type="submit" class="btn btn-dark mb-2">Otvorit PDF</button>
                    </form>
                </div>

                <h3 class="mt-5 title">Informacie o objednavke</h3>
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

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
