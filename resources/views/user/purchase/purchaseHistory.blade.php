@extends('layout.layout')

@section('content')

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>
    <x-table.userPurchasesTable :purchases="$userPurchases"/>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
