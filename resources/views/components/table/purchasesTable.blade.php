@aware(['purchases'])

<table class="pricesTable mt-4 table table-striped display nowrap" style="width: 100%">
    <thead class="table-dark">
    <tr>
        <th class="noSort" scope="col">Typ</th>
        <th scope="col">ID</th>
        <th scope="col">Status</th>
        <th scope="col">Celkova cena</th>
        <th scope="col">Datum</th>
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
            <td>{{$purchase->getStatus()->status}}</td>
            <td>{{\App\Helpers\Helper::getFormattedDate($price->date_price_start)}}</td>
            <td>{{\App\Helpers\Helper::getFormattedDate($price->date_price_end)}}</td>
            <td>{{$price->price}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
