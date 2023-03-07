@aware(['purchases'])

<table class="userPurchasesTable mt-4 table table-striped display nowrap" style="width: 100%">
    <thead class="table-dark">
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Status</th>
        <th scope="col">Celkova cena</th>
        <th scope="col">Pocet unikatnych produktov</th>
        <th scope="col">Datum objednavky</th>
        <th class="noSort" scope="col">Detail</th>
    </tr>
    </thead>

    <tbody>

    @foreach ($purchases as $purchase)
        <tr>
            <td>{{$purchase->id_purchase}}</td>
            <td>{{$purchase->getStatus()->status}}</td>
            <td>{{$purchase->getTotalPrice()}}</td>
            <td>{{$purchase->getBasket()->getVariousProductsCount()}}</td>
            <td>{{\App\Helpers\Helper::getFormattedDate($purchase->purchase_date)}}</td>
            <td>IDK}</td>
        </tr>
    @endforeach
    </tbody>
</table>
