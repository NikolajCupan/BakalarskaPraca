@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/basketStyles.css')}}">

    <x-other.backArrow path="/user/basket"/>

    <div class="px-4 px-lg-0">
        <div class="container text-white py-5 text-center">
            <h1 class="display-4">Potvrdenie objednavky</h1>
        </div>

        <div class="pb-5">
            <div class="container">
                <form method="POST" action="/user/purchase/validateInformation">
                    @csrf
                    <input name="firstName" type="hidden" value="{{$user->first_name}}">
                    <input name="lastName" type="hidden" value="{{$user->last_name}}">
                    <input name="email" type="hidden" value="{{$user->email}}">

                    <div class="row">
                        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase text-center font-weight-bold">Dodacie udaje</div>

                            <div class="row pt-4">
                                <div class="col-12 col-xl-6 col-xxl-4 mb-4">
                                    <div class="form-group form-floating">
                                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="firstName" value="{{$user->first_name}}" disabled>
                                        <label for="firstName">Meno</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 col-xxl-4 mb-4">
                                    <div class="form-group form-floating">
                                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="lastName" value="{{$user->last_name}}" disabled>
                                        <label for="lastName">Priezvisko</label>
                                    </div>
                                </div>
                                <div class="col-12 col-xl-12 col-xxl-4 mb-4">
                                    <div class="form-group form-floating mb-4">
                                        <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{$user->email}}" disabled>
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-xl-12 col-xxl-4 mb-4">
                                    <div class="form-group form-floating">
                                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="phoneNumber" value="{{old('phoneNumber') ?? $user->phone_number}}">
                                        <label for="phoneNumber">Telefonne cislo <span class="text-danger fw-bold">*</span></label>

                                        @error('phoneNumber')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 col-xxl-4 mb-4">
                                    <div class="form-group form-floating">
                                        <input autocomplete="off" type="text" class="form-control" list="cityOptions" name="city" id="city" placeholder="city" value="{{old('city') ?? (isset($currentCity) ? $currentCity->city : '')}}">
                                        <label for="city" class="form-label">Mesto <span class="text-danger fw-bold">*</span></label>
                                        <datalist id="cityOptions">
                                            @foreach ($cities as $city)
                                                <option value="{{$city->city}}">
                                            @endforeach
                                        </datalist>

                                        @error('city')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 col-xxl-4 mb-4">
                                    <div class="form-group form-floating">
                                        <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="postalCode" value="{{old('postalCode') ?? (isset($currentCity) ? $currentCity->postal_code : '') }}">
                                        <label for="postalCode">PSC <span class="text-danger fw-bold">*</span></label>

                                        @error('postalCode')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 mb-4">
                                    <div class="form-group form-floating">
                                        <input type="text" class="form-group form-control" name="street" id="street" placeholder="street" value="{{old('street') ?? $address->street}}">
                                        <label for="street">Ulica <span class="text-danger fw-bold">*</span></label>

                                        @error('street')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-xl-6 mb-4">
                                    <div class="form-group form-floating">
                                        <input type="number" class="form-group form-control" name="houseNumber" id="houseNumber" placeholder="houseNumber" value="{{old('houseNumber') ?? $address->house_number}}">
                                        <label for="houseNumber">Cislo domu <span class="text-danger fw-bold">*</span></label>

                                        @error('houseNumber')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row py-5 p-4 bg-white rounded shadow-sm">
                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Informacie</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">
                                    Zmena dodacich udajov pri objednavke nema vplyv na adresu, ktoru mate nastavenu na Vasom ucte. Adresa aj telefonne cislo musia byt vyplnene.
                                </p>

                                <p class="font-italic mb-4">
                                    Nakupom na nasom e-shope suhlasite s <a target="_blank" href="/terms" class="link-info">obchodnymi podmienkami</a>. Preto im, prosim, venujte dostatocnu pozornost a dokladne si ich precitajte. E-shop si vyhraduje pravo kedykolvek <a target="_blank" href="/terms" class="link-info">obchodne podmienky</a> zmenit.
                                </p>

                                <p class="font-italic mb-4">
                                    Majitel e-shopu nenesie zodpovednost za nepravdive informacie v recenciach produktov od zakaznikov.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Suhrn objednavky</div>
                            <div class="p-4">
                                <p class="font-italic mb-4">
                                    Objednavka je <strong>zavazna</strong>.
                                </p>
                                <ul class="list-unstyled mb-4">
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tovar </strong><strong id="totalPurchasePrice">{{$basket->getTotalPrice()}} &euro;</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Dovoz </strong><strong>{{\App\Helpers\Constants::getFormattedDeliveryFee()}} &euro;</strong></li>
                                    <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Celkovo </strong>
                                        <h5 id="totalPurchasePriceWithFee" class="font-weight-bold">{{$basket->getTotalPriceWithFee()}} &euro;</h5>
                                    </li>
                                </ul>
                                <button type="submit" class="btn btn-dark rounded-pill py-2 btn-block">
                                    Objednat
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
