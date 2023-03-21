@extends('layout.layout')

@section('content')

    <x-navbar.navbar :imagePath="$imagePath" :user="$user" :basket="$basket"/>

    <div class="bg-white py-5">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="mt-4 col-lg-6 order-2 order-lg-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="mx-auto mx-lg-0 fa fa-bar-chart fa-2x mb-3 text-primary bi bi-journal-text" viewBox="0 0 16 16">
                        <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                    </svg>
                    <h2 class="text-center text-lg-start font-weight-light">Spojte sa s nami</h2>
                    <p class="font-italic text-muted mb-4">Ponukame viacero moznosti ako sa mozete s nami skontaktovat:<br>- telefonicka zakaznicka podpora,<br>- e-mailova podpora,<br>- osobna podpora v nasej predajni.</p>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{asset('/images/contactIcons.png')}}" alt="people" class="img-fluid mb-4 mb-lg-0"/></div>
            </div>

            <div class="row align-items-center pt-5 mb-5">
                <div class="col-lg-5 px-5 mx-auto">
                    <img src="{{asset('/images/contactPhone.jpg')}}" alt="" class="rounded img-fluid mb-4 mb-lg-0">
                </div>
                <div class="mt-4 col-lg-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="mx-auto mx-lg-0 fa fa-bar-chart fa-2x mb-3 text-primary bi bi-telephone" viewBox="0 0 16 16">
                        <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                    </svg>
                    <h2 class="text-center text-lg-start font-weight-light">Telefonicka zakaznicka podpora</h2>
                    <p class="font-italic text-muted mb-4">Nasi zamestanci su k dispozicii a radi Vam pomozu kedykolvek pocas pracovnych dni od 8:00 do 16:00. Nevahajte a kontaktujte nas na cisle <strong>{{\App\Helpers\Constants::COMPANY_PHONE_NUMBER}}</strong>.</p>
                </div>
            </div>

            <div class="row align-items-center pt-5 mb-5">
                <div class="mt-4 col-lg-6 order-2 order-lg-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="mx-auto mx-lg-0 fa fa-bar-chart fa-2x mb-3 text-primary bi bi-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                    </svg>
                    <h2 class="text-center text-lg-start font-weight-light">E-mailova podpora</h2>
                    <p class="font-italic text-muted mb-4">Pre tych, ktori nas nemozu kontaktovat telefonicky ponukame e-mailovu podporu. Garantujeme, ze od nas dostanete odpoved najneskor do troch dni od Vasej spravy. Vase otazky, ziadosti a pripomienky posielajte, prosim, na <strong>{{\App\Helpers\Constants::COMPANY_EMAIL}}</strong>.</p>
                </div>
                <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="{{asset('/images/contactEmail.jpg')}}" alt="people" class="rounded img-fluid mb-4 mb-lg-0"/></div>
            </div>

            <div class="row align-items-center pt-5 mb-5">
                <div class="col-lg-5 px-5 mx-auto">
                    <img src="{{asset('/images/contactBuilding.jpg')}}" alt="" class="rounded img-fluid mb-4 mb-lg-0">
                </div>
                <div class="mt-4 col-lg-6">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="mx-auto mx-lg-0 fa fa-bar-chart fa-2x mb-3 text-primary bi bi-geo-alt" viewBox="0 0 16 16">
                        <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    </svg>
                    <h2 class="text-center text-lg-start font-weight-light">Navstivte nas</h2>
                    <p class="font-italic text-muted mb-4">Nasa predajna je otvorena pocas pracovnych dni od 8:00 do 16:00 a v sobotu od 12:00 do 16:00. Ak potrebujete pomoct, pridte ku nam a my Vam s radostou poradime. Najdete nas na adrese <strong>{{\App\Helpers\Constants::COMPANY_STREET . ' ' . \App\Helpers\Constants::COMPANY_HOUSE_NUMBER . ', ' . \App\Helpers\Constants::COMPANY_POSTAL_CODE . ' ' . \App\Helpers\Constants::COMPANY_CITY}}</strong>.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-light py-5">
        <div class="container">
            <div class="text-center col-lg-12">
                <h1 class="display-4 mb-4">Kde nas najdete?</h1>
            </div>
            <div class="text-center col-lg-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3782.334116127707!2d18.757866787493192!3d49.202496618504036!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471459479ebe78cd%3A0x5794f873537c6ba9!2sFakulta%20riadenia%20a%20informatiky%20%C5%BDilinskej%20univerzity%20v%20%C5%BDiline!5e1!3m2!1ssk!2ssk!4v1679408749113!5m2!1ssk!2ssk"
                        height="600" style="border:0; width: 100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded">
                </iframe>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
