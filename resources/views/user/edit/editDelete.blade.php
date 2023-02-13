@extends('layout.layout')

@section('content')

    <x-profileEditFrame>

        <div class="gradientLeftSideWarning col-xl-6 d-none d-xl-block"></div>

        <div class="col-xl-6">
            <div class="card-body p-md-5 text-black">

                <div class="d-flex justify-content-between">
                    <div class="p-2">
                        <h3 class="mb-5 text-uppercase fw-bold d-inline-block">Zmazanie uctu</h3>
                    </div>
                </div>


                <form method="POST" action="/user/delete">
                    @csrf
                    <div class="form-group form-floating mb-4">
                        <input type="text" class="form-control" name="email" id="email" placeholder="email" value="{{old('email')}}">
                        <label for="email">Email</label>

                        @error('email')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group form-floating mb-4">
                        <input type="password" class="form-control" name="password" id="password" placeholder="password">
                        <label for="password">Heslo</label>

                        @error('password')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="true" name="confirmDelete" id="confirmDelete" placeholder="confirmDelete">
                        <label class="form-check-label" for="confirmDelete">
                            Prajem si zmazat svoj ucet
                        </label>

                        @error('confirmDelete')
                        <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-end pt-3 mt-5">
                        <a href="/" type="button" class="btn btn-light btn-lg">Domov</a>
                        <button type="submit" class="btn btn-danger btn-lg ms-2">Zmazat</button>
                    </div>

                </form>

            </div>
        </div>

    </x-profileEditFrame>

@endsection
