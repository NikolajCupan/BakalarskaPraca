@extends('layout.layout')

@section('content')

    <section class="h-700">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">

                            <div class="gradientLeftSide col-xl-6 d-none d-xl-block"></div>

                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">

                                    <h3 class="mb-5 text-uppercase fw-bold">Prihlaste sa</h3>

                                    <form method="POST" action="/login">
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

                                        <div class="d-flex justify-content-end pt-3 mt-5">
                                            <a href="/" type="button" class="btn btn-light btn-lg">Domov</a>
                                            <button type="submit" class="btn btn-dark btn-lg ms-2">Prihlasit</button>
                                        </div>

                                    </form>

                                    <p class="mt-5">Namate ucet? <a href="/register" class="link-info">Registrovat</a></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
