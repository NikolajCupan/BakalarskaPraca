@aware(['activeCategory'])

<style>
    .stickyOffset {
        top: 50px;
    }
</style>

<ul class="sticky-lg-top stickyOffset list-group">
    <x-menu.other.menuButton buttonValue="all" buttonText="Vsetky" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="pending" buttonText="Cakajuca" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="shipped" buttonText="Odoslana" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="delivered" buttonText="Dorucena" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="cancelled" buttonText="Zrusena" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="confirmed" buttonText="Potvrdena" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
</ul>
