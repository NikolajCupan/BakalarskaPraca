@extends('layout.layout')

@section('content')

    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">

                            <div class="gradientLeftSideWarning col-xl-6 d-none d-xl-block"></div>

                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">

                                    <h3 class="mb-5 text-uppercase fw-bold d-inline-block">Zmena hesla</h3>

                                    <form method="POST" action="/user/delete">
                                        @csrf
                                        <div class="form-group form-floating mb-4">
                                            <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                            <label for="password">Heslo</label>

                                            @error('oldPassword')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group form-floating mb-4">
                                            <input type="text" class="form-control" name="email" id="email" placeholder="email">
                                            <label for="email">Email</label>

                                            @error('password')
                                            <p class="text-danger">{{$message}}</p>
                                            @enderror
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="confirmDelete">
                                            <label class="form-check-label" for="confirmDelete">
                                                Prajem si zmazat svoj ucet
                                            </label>
                                        </div>

                                        <div class="d-flex justify-content-end pt-3 mt-5">
                                            <a href="/" type="button" class="btn btn-light btn-lg">Domov</a>
                                            <button type="submit" class="btn btn-danger btn-lg ms-2">Zmazat</button>
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
