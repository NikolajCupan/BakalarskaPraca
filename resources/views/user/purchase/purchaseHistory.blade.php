@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/userPurchasesStyles.css')}}">

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <div class="container mt-4">
        <h3 class="title">Historia objednavok</h3>
        <x-table.purchasesTable :purchases="$userPurchases" path="/user/purchaseDetail/"/>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
