@aware(['purchases'])

<table class="userPurchasesTable mt-4 table table-striped display nowrap" style="width: 100%">
    <thead class="table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Status</th>
        <th scope="col">Celkova cena</th>
        <th scope="col">Pocet roznych produktov</th>
        <th scope="col">Datum objednavky</th>
        <th scope="col">Datum uhrady</th>
        <th class="noSort" scope="col">Detail</th>
    </tr>
    </thead>

    <tbody>

    @foreach ($purchases as $purchase)
        <tr>
            <td>{{$purchase->id_purchase}}</td>
            <td>{{$purchase->getStatus()->getSlovakStatusName()}}</td>
            <td>{{$purchase->getTotalPrice()}} &euro;</td>
            <td>{{$purchase->getBasket()->getVariousProductsCount()}}</td>
            <td>{{\App\Helpers\Helper::getFormattedDate($purchase->purchase_date)}}</td>
            <td class="{{is_null($purchase->payment_date) ? "text-danger" : ""}}">{{\App\Helpers\Helper::getFormattedDate($purchase->payment_date) ?? "neuhradene"}}</td>
            <td>
                <a href="/user/purchaseDetail/{{$purchase->id_purchase}}">
                    <svg class="ms-1 bi bi-info-circle" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
