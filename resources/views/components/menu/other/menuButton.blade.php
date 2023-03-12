@aware(['buttonValue'])
@aware(['buttonText'])
@aware(['activeCategory'])
@aware(['action'])

<form method="POST" action="{{$action}}">
    @csrf
    <input type="hidden" name="category" value="{{$buttonValue}}">
    <button type="submit" class="@if (isset($activeCategory) && $activeCategory == $buttonValue) list-group-item-dark @endif
        list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
        <span>{{$buttonText}}</span>
    </button>
</form>
