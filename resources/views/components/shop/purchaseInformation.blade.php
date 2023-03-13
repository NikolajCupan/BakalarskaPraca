@aware(['purchase'])

<h3 class="mt-5 title">Vseobecne informacie</h3>
<ul class="purchaseDetailList">
    <li><strong>ID:</strong> {{$purchase->id_purchase}}</li>
    <li><strong>Suma:</strong> {{$purchase->getTotalPrice()}} &euro;</li>
    <li><strong>Status:</strong> {{$purchase->getStatus()->getSlovakStatusName()}}</li>
    <li><strong>Datum objednavky:</strong> {{\App\Helpers\Helper::getFormattedDate($purchase->purchase_date)}}</li>
    <li><strong>Datum platby:</strong><span class="{{is_null($purchase->payment_date) ? "text-danger" : ""}}"> {{\App\Helpers\Helper::getFormattedDate($purchase->payment_date) ?? "neuhradene"}}</span></li>
</ul>

<h3 class="mt-5 title">Dorucovacia adresa</h3>
<ul class="purchaseDetailList">
    <li><strong>Mesto:</strong> {{$purchase->getAddress()->getCity()->city}}</li>
    <li><strong>PSC:</strong> {{substr_replace($purchase->getAddress()->getCity()->postal_code, " ", 3, 0)}}</li>
    <li><strong>Ulica:</strong> {{$purchase->getAddress()->street}}</li>
    <li><strong>Cislo domu:</strong> {{$purchase->getAddress()->house_number}}</li>
</ul>
