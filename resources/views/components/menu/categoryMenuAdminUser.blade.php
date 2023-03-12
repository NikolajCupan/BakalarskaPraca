@aware(['activeCategory'])

<style>
    .stickyOffset {
        top: 50px;
    }
</style>

<ul class="sticky-lg-top stickyOffset list-group">
    <x-menu.other.menuButton buttonValue="customer" buttonText="Vsetci pouzivatelia" :activeCategory="$activeCategory" action="/admin/user/users"/>
    <x-menu.other.menuButton buttonValue="accountManager" buttonText="Manazeri uctov" :activeCategory="$activeCategory" action="/admin/user/users"/>
    <x-menu.other.menuButton buttonValue="productManager" buttonText="Manazeri produktov" :activeCategory="$activeCategory" action="/admin/user/users"/>
    <x-menu.other.menuButton buttonValue="purchaseManager" buttonText="Manazeri objednavok" :activeCategory="$activeCategory" action="/admin/user/users"/>
    <x-menu.other.menuButton buttonValue="reviewManager" buttonText="Manazeri recenzii" :activeCategory="$activeCategory" action="/admin/user/users"/>
</ul>
