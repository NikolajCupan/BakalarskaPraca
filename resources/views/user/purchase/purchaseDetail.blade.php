@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/userPurchasesStyles.css')}}">

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    {{$purchase}}

    <form action="/pdf/purchase" method="POST" target="_blank">
        @csrf
        <input type="hidden" name="purchaseId" value="{{$purchase->id_purchase}}">
        <button type="submit" class="btn btn-success">Otvor PDF</button>
    </form>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
