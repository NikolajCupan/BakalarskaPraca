@aware(['activeCategory'])

<style>
    .stickyOffset {
        top: 50px;
    }
</style>

<ul class="sticky-lg-top stickyOffset list-group">
    <x-menu.other.menuButton buttonValue="all" buttonText="Vsetky" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="pending" buttonText="Cakajuce" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="shipped" buttonText="Odoslane" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="delivered" buttonText="Dorucene" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="confirmed" buttonText="Potvrdene" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
    <x-menu.other.menuButton buttonValue="cancelled" buttonText="Zrusene" :activeCategory="$activeCategory" action="/admin/purchase/purchases"/>
</ul>
