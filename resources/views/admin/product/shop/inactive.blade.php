@extends('layout.layout')

@section('content')

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct :activeCategory='"shopInactive"'/>
            </div>
            <div class="col-md-12 col-lg-9">
                Shop inactive
            </div>
        </div>
    </div>

@endsection
