@extends('layout.layout')

@section('content')

    <x-navbar.navbarAdmin/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct/>
            </div>
            <div class="col-md-12 col-lg-9">
                Nothing
            </div>
        </div>
    </div>

@endsection
