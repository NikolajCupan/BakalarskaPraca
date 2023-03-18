@extends('layout.layout')

@section('content')

    <link rel="stylesheet" href="{{asset('css/adminStyles.css')}}">

    <x-other.flashMessage/>
    <x-navbar.navbarAdmin homePath="/admin/purchase"/>

    <div class="container">
        <div class="mt-4 row">
            <div class="mb-5 col-md-12 col-lg-3">
                <x-menu.categoryMenuAdminPurchase/>
            </div>
            <div class="col-md-12 col-lg-9">
                <h3 class="title">Sprava objednavok</h3>
                <p class="mb-0">Nasledujuca sekcia sluzi na spravovanie objednavok. Objednavky mozu nadobudnut nasledujuce statusy:</p>
                <ul>
                    <li><strong>Cakajuca</strong> - Objednavka nadobuda tento status ihned po svojom vzniku.</li>
                    <li><strong>Odoslana</strong> - Produkty su na ceste ku zakaznikovi.</li>
                    <li><strong>Dorucena</strong> - Produkty boli dorucene zakaznikovi.</li>
                    <li><strong>Potvrdena</strong> - Zakaznik potvrdil dorucenie produktov.</li>
                    <li><strong>Zrusena</strong> - Manualne zrusena objednavka alebo objednavka, ktorej vsetky produkty boli reklamovane.</li>
                </ul>

                <p class="mb-0">S objednavkamami, ktore nemaju status Zrusena, je mozne vykonavat nasledujuce akcie:</p>
                <ul>
                    <li><strong>Zrusit objednavku</strong> - Objednavka nadobuda status zrusena a vsatky produkty z danej objednavku su vratene na sklad.</li>
                    <li><strong>Reklamovat</strong> - Reklamovany produkt je odstraneny z objednavky a moze, ale nemusi, byt vrateny na sklad. V pripade ak by doslo k reklamacii vsetkych produktov, objednavka automaticky nadobuda status Zrusena.</li>
                    <li><strong>Nastavit status</strong> - Mozne menit medzi statusmi Cakajuca, Odoslana, Dorucena, Potvrdena.</li>
                    <li><strong>Nastavit datum platby</strong> - Datum, kedy zakaznik vykonal platbu za objednavku.</li>
                    <li><strong>Otvorit PDF</strong> - Zobrazi PDF s informaciami o objednavke.</li>
                </ul>

                <p class="mb-0">S objednavkamami, ktore maju status Zrusena, je mozne vykonavat nasledujuce akcie:</p>
                <ul>
                    <li><strong>Otvorit PDF</strong> - Zobrazi PDF s informaciami o objednavke.</li>
                    <li><strong>Zmazat objednavku</strong> - V pripade ak objednavka neobsahuje ziadne produkty.</li>
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    <x-footer.footer/>
@endsection
