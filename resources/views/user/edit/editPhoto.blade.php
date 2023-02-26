@extends('layout.layout')

@section('content')
    @PHP ('DELETE TEST')

    <link rel="stylesheet" href="{{asset('css/editPhotoStyles.css')}}">

    <x-other.profileEditFrame>

        <div class="gradientLeftSide col-lg-6 d-none d-lg-block align-items-center">

            <div class="pt-5 row row-cols-1">
                <div class="col text-center">
                    @if (!is_null($imagePath))
                        <img class="imageBorder profileImage img-fluid bg-light" src="{{asset('/storage/images/users/' . $imagePath)}}" alt="">
                    @else
                        <img class="imageBorder profileImage img-fluid bg-light" src="{{asset('/images/userNoImage.png')}}" alt="">
                    @endif
                </div>

                <div class="mt-3 profileInfo fw-bold col text-center">
                    {{$user->email}}
                </div>

                <div class="profileInfo fw-bold col text-center">
                    {{$user->first_name}} {{$user->last_name}}
                </div>
            </div>

        </div>

        <div class="col-lg-6">
            <div class="card-body p-md-5 text-black">

                <div class="d-none d-sm-block">
                    <div class="d-flex justify-content-between">
                        <div class="p-2">
                            <h3 class="mb-5 text-uppercase fw-bold">Zmena profilovej fotky</h3>
                        </div>
                        <div class="mt-2 p-2">
                            @if (!is_null($imagePath))
                                <img class="d-lg-none imageBorder profileImageSmall img-fluid bg-light" src="{{asset('/storage/images/users/' . $imagePath)}}" alt="">
                            @else
                                <img class="d-lg-none imageBorder profileImageSmall img-fluid bg-light" src="{{asset('/images/userNoImage.png')}}" alt="">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="d-sm-none">
                    <h3 class="mb-3 text-uppercase fw-bold">Zmena profilovej fotky</h3>
                    <div class="mb-5 d-flex justify-content-center">
                        @if (!is_null($imagePath))
                            <img class="d-lg-none imageBorder profileImageXSmall img-fluid bg-light" src="{{asset('/storage/images/users/' . $imagePath)}}" alt="">
                        @else
                            <img class="d-lg-none imageBorder profileImageXSmall img-fluid bg-light" src="{{asset('/images/userNoImage.png')}}" alt="">
                        @endif
                    </div>
                </div>

                <form method="POST" action="/user/photo" enctype="multipart/form-data">
                    @csrf
                    <label class="form-label" for="image">Vyberte novu fotku</label>
                    <input type="file" class="form-control" name="image" id="image">

                    @error('image')
                    <p class="text-danger">{{$message}}</p>
                    @enderror

                    <p class="fw-bold mt-6 mb-1">Prosim, riadte sa nasledujucimi pokynmi:</p>
                    <ul>
                        <li>Maximalna velkost: 2 MB</li>
                        <li>Maximalne rozmery: 2048 pixelov</li>
                        <li>Minimalne rozmery: 256 pixelov</li>
                        <li>Povolene formaty: jpg, bmp, png</li>
                        <li>Optimalny pomer stran fotky je 1:1</li>
                    </ul>

                    <div class="d-flex justify-content-end pt-3 mt-5">
                        <a href="/" type="button" class="btn btn-light btn-lg">Domov</a>
                        <button type="submit" class="btn btn-dark btn-lg ms-2">Ulozit</button>
                    </div>

                </form>

            </div>
        </div>

    </x-other.profileEditFrame>

@endsection
