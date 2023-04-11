@aware(['purchases'])
@aware(['path'])

<table class="purchasesTable mt-4 table table-striped display nowrap" style="width: 100%">
    <thead class="table-dark">
    <tr>
        <th class="noSort" scope="col">Typ</th>
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
            <td>
                <svg class="ms-1 bi bi-file-earmark-text" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M5.5 7a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5zM5 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5z"/>
                    <path d="M9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.5L9.5 0zm0 1v2A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z"/>
                </svg>
            </td>
            <td>{{$purchase->id_purchase}}</td>
            <td>{{$purchase->getStatus()->getSlovakStatusName()}}</td>
            <td>{{$purchase->getTotalPriceWithFee()}} &euro;</td>
            <td>{{$purchase->getBasket()->getVariousProductsCount()}}</td>
            <td>{{\App\Helpers\Helper::getFormattedDate($purchase->purchase_date)}}</td>
            <td class="{{is_null($purchase->payment_date) ? "text-danger" : ""}}">{{\App\Helpers\Helper::getFormattedDate($purchase->payment_date) ?? "neuhradene"}}</td>
            <td>
                <a href="{{$path . $purchase->id_purchase}}">
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
