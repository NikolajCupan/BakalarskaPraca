@extends('layout.layout')

@section('content')

    <script>
        window.onload = function () {
            $('#reloadValuesButton').click(function() {
                $.ajax({
                    url: "/getPreviousValues",
                    type: "GET",
                    success: function(data) {
                        let user = data.user;
                        let address = data.address;
                        let city = data.city;

                        document.getElementById("firstName").value = user.first_name;
                        document.getElementById("lastName").value = user.last_name;
                        document.getElementById("email").value = user.email;
                        document.getElementById("phoneNumber").value = user.phone_number;

                        document.getElementById("city").value = city.city;
                        document.getElementById("postalCode").value = city.postal_code;

                        document.getElementById("street").value = address.street;
                        document.getElementById("houseNumber").value = address.house_number;
                    }
                });
            });
        };
    </script>

    <x-other.profileEditFrame>

        <div class="gradientLeftSide col-xl-6 d-none d-xl-block"></div>

        <div class="col-xl-6">
            <div class="card-body p-md-5 text-black">

                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h3 class="mb-5 text-uppercase fw-bold d-inline-block">Zmena profilovych udajov</h3>
                    </div>
                    <div class="mt-2 p-2">
                        <a id="reloadValuesButton" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bootstrap-reboot d-inline-block resetButton" viewBox="0 0 16 16">
                                <path d="M1.161 8a6.84 6.84 0 1 0 6.842-6.84.58.58 0 1 1 0-1.16 8 8 0 1 1-6.556 3.412l-.663-.577a.58.58 0 0 1 .227-.997l2.52-.69a.58.58 0 0 1 .728.633l-.332 2.592a.58.58 0 0 1-.956.364l-.643-.56A6.812 6.812 0 0 0 1.16 8z"/>
                                <path d="M6.641 11.671V8.843h1.57l1.498 2.828h1.314L9.377 8.665c.897-.3 1.427-1.106 1.427-2.1 0-1.37-.943-2.246-2.456-2.246H5.5v7.352h1.141zm0-3.75V5.277h1.57c.881 0 1.416.499 1.416 1.32 0 .84-.504 1.324-1.386 1.324h-1.6z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <form method="POST" action="/user/edit">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-group form-floating">
                                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="firstName" value="{{old('firstName') ?? $user->first_name}}">
                                <label for="firstName">Meno</label>
                            </div>

                            @error('firstName')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="form-group form-floating">
                                <input type="text" class="form-control" name="lastName" id="lastName" placeholder="lastName" value="{{old('lastName') ?? $user->last_name}}">
                                <label for="lastName">Priezvisko</label>
                            </div>

                            @error('lastName')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group form-floating mb-4">
                        <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{old('email') ?? $user->email}}">
                        <label for="email">Email</label>

                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group form-floating mb-4 mt-5">
                        <input type="text" class="form-control" name="phoneNumber" id="phoneNumber" placeholder="phoneNumber" value="{{old('phoneNumber') ?? $user->phone_number}}">
                        <label for="phoneNumber">Telefonne cislo</label>

                        @error('phoneNumber')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-group form-floating">
                                <input autocomplete="off" type="text" class="form-control" list="cityOptions" name="city" id="city" placeholder="city"  value="{{ old('city') ?? (isset($currentCity) ? $currentCity->city : '') }}">
                                <label for="city" class="form-label">Mesto</label>
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
                        <div class="col-md-6 mb-4">
                            <div class="form-group form-floating">
                                <input type="text" class="form-control" name="postalCode" id="postalCode" placeholder="postalCode" value="{{ old('postalCode') ?? (isset($currentCity) ? $currentCity->postal_code : '') }}">
                                <label for="postalCode">PSC</label>
                            </div>

                            @error('postalCode')
                            <p class="text-danger">{{$message}}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="form-floating mb-4">
                        <input type="text" class="form-group form-control" name="street" id="street" placeholder="street" value="{{old('street') ?? $address->street}}">
                        <label for="street">Ulica</label>

                        @error('street')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-floating mb-4">
                        <input type="number" class="form-group form-control" name="houseNumber" id="houseNumber" placeholder="houseNumber" value="{{old('houseNumber') ?? $address->house_number}}">
                        <label for="houseNumber">Cislo domu</label>

                        @error('houseNumber')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end pt-3 mt-5">
                        <a href="/" type="button" class="btn btn-light btn-lg">Domov</a>
                        <button type="submit" class="btn btn-dark btn-lg ms-2">Ulozit</button>
                    </div>

                </form>

            </div>
        </div>
    </x-other.profileEditFrame>
@endsection
