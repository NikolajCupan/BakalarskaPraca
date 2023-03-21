@extends('layout.layout')

@section('content')

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <style>
        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
        }
    </style>

    <div class="bg-light">
        <div class="container py-5">
            <div class="row h-100 align-items-center py-5">
                <div class="text-center col-lg-6 order-2 order-lg-1">
                    <h1 class="display-4">Zvukovatechnika.eu</h1>
                    <p class="lead text-muted mb-0">Vitajte na nasej stranke!</p>
                </div>
                <div class="col-lg-6 px-5 mx-auto order-1 order-lg-2">
                    <img style="width: 50%" src="{{asset('/images/logo.png')}}" alt="eshopLogo" class="mb-4 mb-lg-0 center img-fluid"/>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white py-5">
        <div class="container py-5">
            <div class="row align-items-center mb-5">
                <div class="mt-4 col-lg-6 order-2 order-lg-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="mx-auto mx-lg-0 fa fa-bar-chart fa-2x mb-2 text-primary bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                    </svg>
                    <h2 class="text-center text-lg-start font-weight-light">Kto sme?</h2>
                    <p class="font-italic text-muted mb-4">Sme mala skupina milovnikov hudby, ktori sa rozhodli lasku k hudbe sirit dalej. Na podnet jedneho nasho clena, sme sa rozhodli zalozit vlastny e-shop, kde predavame zvukove vybavenie.</p>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{asset('/images/people.png')}}" alt="people" class="img-fluid mb-4 mb-lg-0"/></div>
            </div>

            <div class="row align-items-center">
                <div class="col-lg-5 px-5 mx-auto">
                    <img src="{{asset('/images/shop.jpg')}}" alt="" class="rounded img-fluid mb-4 mb-lg-0">
                </div>
                <div class="mt-4 col-lg-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="mx-auto mx-lg-0 fa fa-bar-chart fa-2x mb-2 text-primary bi bi-question-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
                    </svg>
                    <h2 class="text-center text-lg-start font-weight-light">Preco my?</h2>
                    <p class="font-italic text-muted mb-4">Vdaka rozsiahlym znalostiam zvukovej techniky Vam vieme poradit a najst spravny produkt prave pre Vas. V pripade akychkolvek otazok nas nevahajte kontaktovat, ci uz telefonicky, e-mailom alebo sa zastavte osobne v nasej predajni.</p>
                    <div class="text-center text-lg-start">
                        <a href="/contact" class="btn btn-dark px-5 rounded-pill shadow-sm">Kontaktujte nas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row mb-4">
                <div class="col-lg-5">
                    <h2 class="text-center text-lg-start display-4 font-weight-light">Nas tim</h2>
                </div>
            </div>

            <div class="row text-center">
                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('/images/userNoImage.png')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Nikolaj Cupan</h5>
                        <span class="small text-uppercase text-muted">Zakladatel</span>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('/images/userNoImage.png')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Joe White</h5>
                        <span class="small text-uppercase text-muted">Zakladatel</span>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('/images/userNoImage.png')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Richard Black</h5>
                        <span class="small text-uppercase text-muted">Manazer produktov</span>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 mb-5">
                    <div class="bg-white rounded shadow-sm py-5 px-4"><img src="{{asset('/images/userNoImage.png')}}" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                        <h5 class="mb-0">Robert William</h5>
                        <span class="small text-uppercase text-muted">Marketingovy manazer</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
