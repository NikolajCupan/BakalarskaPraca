@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-other.flashMessage/>
    <x-navbar.navbarAdmin homePath="/admin/user"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminUser/>
            </div>
            <div class="col-md-12 col-lg-9">
                <h3 class="title">Informacie o pouzivatelovi</h3>
                <ul class="userDetailList">
                    <li><strong>Meno:</strong> {{$user->first_name}}</li>
                    <li><strong>Priezvisko:</strong> {{$user->last_name}}</li>
                    <li><strong>Email:</strong> {{$user->email}}</li>
                    <li><strong>Telefonne cislo:</strong><span class="{{is_null($user->phone_number) ? "text-danger" : ""}}"> {{$user->phone_number ?? "nezadane"}}</span></li>
                </ul>

                <h3 class="mt-5 title">Adresa</h3>
                <ul class="userDetailList">
                    <li><strong>Mesto:</strong><span class="{{is_null($user->getAddress()->getCity()) ? "text-danger" : ""}}"> {{is_null($user->getAddress()->getCity()) ? "nezadane" : $user->getAddress()->getCity()->city}}</span></li>
                    <li><strong>PSC:</strong><span class="{{is_null($user->getAddress()->getCity()) ? "text-danger" : ""}}"> {{is_null($user->getAddress()->getCity()) ? "nezadane" : substr_replace($user->getAddress()->getCity()->postal_code, " ", 3, 0)}}</span></li>
                    <li><strong>Ulica:</strong><span class="{{is_null($user->getAddress()->street) ? "text-danger" : ""}}"> {{$user->getAddress()->street ?? "nezadane"}}</span></li>
                    <li><strong>Cislo domu:</strong><span class="{{is_null($user->getAddress()->house_number) ? "text-danger" : ""}}"> {{$user->getAddress()->house_number ?? "nezadane"}}</span></li>
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
