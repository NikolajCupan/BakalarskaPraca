@aware(['webRoleName'])
@aware(['buttonText'])
@aware(['activeCategory'])

<form method="POST" action="/admin/user/users">
    @csrf
    <input type="hidden" name="webRoleName" value="{{$webRoleName}}">
    <button type="submit" class="@if (isset($activeCategory) && $activeCategory == $webRoleName) list-group-item-dark @endif
        list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span>{{$buttonText}}</span>
    </button>
</form>
