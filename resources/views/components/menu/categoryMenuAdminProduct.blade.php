<style>
    .stickyOffset {
        top: 50px;
    }
</style>

<ul class="sticky-lg-top stickyOffset list-group">

    <a href="/admin/product/warehouse/index" class="@if (isset($activeCategory) && $activeCategory == 'warehouse') list-group-item-dark @endif
                                              list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span style="word-break: break-all">Sklad</span>
    </a>

    <a href="/admin/product/shop/index" class="@if (isset($activeCategory) && $activeCategory == 'shop') list-group-item-dark @endif
                                         list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span style="word-break: break-all">Obchod</span>
    </a>

</ul>
