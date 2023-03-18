@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-other.flashMessage/>
    <x-navbar.navbarAdmin homePath="/admin/product"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminProduct/>
            </div>
            <div class="col-md-12 col-lg-9">
                <h3 class="title">Sprava produktov</h3>
                <p class="mb-0">Nasledujuca sekcia sluzi na spravovanie produktov. Produkty su rozdelene do 2 kategorii:</p>
                <ul>
                    <li><strong>Sklad</strong> - Predstavuje produkt nachadzajuci sa na sklade. Skladovany produkt ma nazov a pocet skladovanych kusov. Nazov musi byt unikatny, pocet skladovanych kusov mozno menit.</li>
                    <li><strong>Obchod</strong> - Po spusteni predaja skladovaneho tovaru sa z neho stava produkt v obchode. Predavany produkt ma cenu, kategoriu, fotku a popis. Vsetky tieto polozky mozno pocas predaja menit.</li>
                </ul>

                <p>Jeden skladovany produkt moze byt asociovany s viacerymi predavanymi produktmi, ale v jednom case moze byt skladovany produkt predavany maximalne raz.
                                <strong>Priklad:</strong> skladovany produkt sa predaval od 01.02.2023 do 31.05.2023 a dalsi predaj zacal od 01.06.2023. Pri prvom predaji bol prepojeny
                                s inym predavanym produktom ako pri druhom. A v case ked sa nepredaval nebol prepojeny so ziadnym.</p>

                <p>Predavany produkt si pamata historiu cien pocas svojho predaja a objednavky, v ktorych sa nachadza.</p>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
