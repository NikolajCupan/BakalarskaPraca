@extends('layout.layout')

@section('content')

    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">

                            <div class="loginLeftSide col-xl-6 d-none d-xl-block"></div>

                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">

                                    <h3 class="mb-5 text-uppercase fw-bold">Vytvorte si ucet</h3>

                                    <form method="POST" action="/register">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group form-floating">
                                                    <input type="text" class="form-control" name="firstName" id="firstName" placeholder="firstName" value="{{old('firstName')}}">
                                                    <label for="firstName">Meno <span class="text-danger fw-bold">*</span></label>
                                                </div>

                                                @error('firstName')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group form-floating">
                                                    <input type="text" class="form-control" name="lastName" id="lastName" placeholder="lastName" value="{{old('lastName')}}">
                                                    <label for="lastName">Priezvisko <span class="text-danger fw-bold">*</span></label>
                                                </div>

                                                @error('lastName')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group form-floating mb-4">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{old('email')}}">
                                            <label for="email">Email <span class="text-danger fw-bold">*</span></label>

                                            @error('email')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group form-floating mb-4">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                            <label for="password">Heslo <span class="text-danger fw-bold">*</span></label>

                                            @error('password')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group form-floating mb-4">
                                            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation">
                                            <label for="password_confirmation">Potvrdenie hesla <span class="text-danger fw-bold">*</span></label>

                                            @error('password_confirmation')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group form-floating mb-4 mt-5">
                                            <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="phoneNumber" value="{{old('phoneNumber')}}">
                                            <label for="phoneNumber">Telefonne cislo</label>

                                            @error('phoneNumber')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group form-floating">
                                                    <input type="text" class="form-control" name="city" id="city" placeholder="city" value="{{old('city')}}">
                                                    <label for="city">Mesto</label>

                                                    @error('city')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-group form-floating">
                                                    <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="postalCode" value="{{old('postalCode')}}">
                                                    <label for="postalCode">PSC</label>
                                                </div>

                                                @error('postalCode')
                                                    <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="text" class="form-group form-control" name="street" id="street" placeholder="street" value="{{old('street')}}">
                                            <label for="street">Ulica</label>

                                            @error('street')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-4">
                                            <input type="number" class="form-group form-control" name="houseNumber" id="houseNumber" placeholder="houseNumber" value="{{old('houseNumber')}}">
                                            <label for="houseNumber">Cislo domu</label>

                                            @error('houseNumber')
                                                <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="d-flex justify-content-end pt-3 mt-5">
                                            <a href="/" type="button" class="btn btn-light btn-lg">Domov</a>
                                            <button type="submit" class="btn btn-dark btn-lg ms-2">Registrovat</button>
                                        </div>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
