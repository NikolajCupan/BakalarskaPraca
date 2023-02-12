@extends('layout.layout')

@section('content')

    <x-profileEditFrame>

        <div class="gradientLeftSide col-xl-6 d-none d-xl-block"></div>

        <div class="col-xl-6">
            <div class="card-body p-md-5 text-black">

                <h3 class="mb-5 text-uppercase fw-bold d-inline-block">Zmena hesla</h3>

                <form method="POST" action="/user/password">
                    @csrf
                    <div class="form-group form-floating mb-4">
                        <input type="password" class="form-control" name="oldPassword" id="oldPassword" placeholder="oldPassword">
                        <label for="oldPassword">Stare heslo</label>

                        @error('oldPassword')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        <label for="password">Nove heslo</label>

                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group form-floating mb-4">
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="password_confirmation">
                        <label for="password_confirmation">Potvrdenie noveho hesla</label>

                        @error('password_confirmation')
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

    </x-profileEditFrame>

@endsection
