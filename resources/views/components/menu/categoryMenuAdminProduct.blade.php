<style>
    .stickyOffset {
        top: 50px;
    }
</style>

<ul class="sticky-lg-top stickyOffset list-group">

    <a href="/admin/product/warehouse/create" class="@if (isset($activeCategory) && $activeCategory == 'warehouseCreate') list-group-item-dark @endif
    list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span>Sklad - novy produkt</span>
    </a>

    <a href="/admin/product/warehouse/active" class="@if (isset($activeCategory) && $activeCategory == 'warehouseActive') list-group-item-dark @endif
    list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span>Sklad - aktivne produkty</span>
    </a>

    <a href="/admin/product/warehouse/inactive" class="@if (isset($activeCategory) && $activeCategory == 'warehouseInactive') list-group-item-dark @endif
    list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span>Sklad - neaktivne produkty</span>
    </a>

    <a href="/admin/product/shop/salable" class="@if (isset($activeCategory) && $activeCategory == 'shopCreate') list-group-item-dark @endif
    list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span>Obchod - novy predaj</span>
    </a>

    <a href="/admin/product/shop/active" class="@if (isset($activeCategory) && $activeCategory == 'shopActive') list-group-item-dark @endif
    list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span>Obchod - aktivny predaj</span>
    </a>

    <a href="/admin/product/shop/inactive" class="@if (isset($activeCategory) && $activeCategory == 'shopInactive') list-group-item-dark @endif
    list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span>Obchod - ukonceny predaj</span>
    </a>

</ul>
