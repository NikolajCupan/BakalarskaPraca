@extends('layout.layout')

@section('content')

    <x-other.profileEditFrame>

        <div class="gradientLeftSide col-xl-6 d-none d-xl-block"></div>

        <div class="col-xl-6">
            <div class="card-body p-md-5 text-black">

                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h3 class="mb-5 text-uppercase fw-bold d-inline-block">Zmena hesla</h3>
                    </div>
                </div>

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
                        <input type="password" class="form-control" name="newPassword" id="newPassword" placeholder="newPassword">
                        <label for="newPassword">Nove heslo</label>

                        @error('newPassword')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group form-floating mb-4">
                        <input type="password" class="form-control" name="newPassword_confirmation" id="newPassword_confirmation" placeholder="newPassword_confirmation">
                        <label for="newPassword_confirmation">Potvrdenie noveho hesla</label>

                        @error('newPassword_confirmation')
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
