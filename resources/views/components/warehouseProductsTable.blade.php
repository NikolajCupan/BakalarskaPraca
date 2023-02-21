@aware(['warehouseProducts'])

<table class="warehouseProductsTable mt-4 table table-striped">
    <thead class="table-dark">
    <tr>
        <th class="noSort" scope="col">Typ</th>
        <th scope="col">ID</th>
        <th scope="col">Produkt</th>
        <th scope="col">Kvantita</th>
        <th scope="col">Predavany</th>
        <th class="noSort" scope="col">Detail</th>
    </tr>
    </thead>

    <tbody>

    @php
        // In some cases only single element can be passed, if so
        // element is wrapped to Collection
        if ($warehouseProducts instanceof App\Models\WarehouseProduct)
        {
            $warehouseProducts = collect([$warehouseProducts]);
        }
    @endphp

    @foreach ($warehouseProducts as $warehouseProduct)
        <tr>
            <td>
                <svg class="ms-1 bi bi-box-seam" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                </svg>
            </td>
            <td>{{$warehouseProduct->id_warehouse_product}}</td>
            <td>{{$warehouseProduct->product}}</td>
            <td>{{$warehouseProduct->quantity}}</td>
            @if ($warehouseProduct->isSold())
            <td class="text-success">Ano</td>
            @else
            <td class="text-danger">Nie</td>
            @endif
            <td>
                <a href="/admin/product/warehouse/edit/{{$warehouseProduct->id_warehouse_product}}">
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
