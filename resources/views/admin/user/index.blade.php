@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-other.flashMessage/>
    <x-navbar.navbarAdmin homePath="/admin/user"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminUser/>
            </div>
            <div class="col-md-12 col-lg-9">
                <h3 class="title">Sprava pouzivatelov</h3>
                <p class="mb-0">Nasledujuca sekcia sluzi na spravovanie pouzivatelov. Pouzivatel moze mat nasledujuce role:</p>
                <ul>
                    <li><strong>Zakaznik</strong> - Rola, ktora je pridelena zakaznikovi automaticky po registracii. Vsetci pouzivatelia maju tuto rolu.</li>
                    <li><strong>Manazer uctov</strong> - Umoznuje pridavat a odoberat role ostatnym pouzivatelom.</li>
                    <li><strong>Manazer produktov</strong> - Sprava skladoveho hospodarstva a predavanych produktov.</li>
                    <li><strong>Manazer objednavok</strong> - Zmena statusov objednavok, rusenie objednavok, nastavenie platieb za objednavky, mazanie objednavok.</li>
                    <li><strong>Manazer recenzii</strong> - Umoznuje mazat recenzie ostatnych pouzivatelov.</li>
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
