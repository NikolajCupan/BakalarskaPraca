@aware(['prices'])

<table class="pricesTable mt-4 table table-striped display nowrap" style="width: 100%">
    <thead class="table-dark">
    <tr>
        <th class="noSort" scope="col">Typ</th>
        <th scope="col">Cena od</th>
        <th scope="col">Cena do</th>
        <th scope="col">Cena</th>
    </tr>
    </thead>

    <tbody>

    @foreach ($prices as $price)
        <tr>
            <td>
                <svg class="ms-1 bi bi-cash" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                    <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                </svg>
            </td>
            <td>{{\App\Helpers\Helper::getFormattedDate($price->date_price_start)}}</td>
            <td>{{\App\Helpers\Helper::getFormattedDate($price->date_price_end)}}</td>
            <td>{{$price->price}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
