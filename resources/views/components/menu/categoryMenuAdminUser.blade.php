@aware(['activeCategory'])

<style>
    .stickyOffset {
        top: 50px;
    }
</style>

<ul class="sticky-lg-top stickyOffset list-group">
    <x-menu.other.webRoleForm webRoleName="customer" buttonText="Vsetci pouzivatelia" :activeCategory="$activeCategory"/>
    <x-menu.other.webRoleForm webRoleName="accountManager" buttonText="Manazeri uctov" :activeCategory="$activeCategory"/>
    <x-menu.other.webRoleForm webRoleName="productManager" buttonText="Manazeri produktov" :activeCategory="$activeCategory"/>
    <x-menu.other.webRoleForm webRoleName="purchaseManager" buttonText="Manazeri objednavok" :activeCategory="$activeCategory"/>
    <x-menu.other.webRoleForm webRoleName="reviewManager" buttonText="Manazeri recenzii" :activeCategory="$activeCategory"/>
</ul>
