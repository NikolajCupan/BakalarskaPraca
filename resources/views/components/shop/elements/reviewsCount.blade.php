@aware(['product'])

@php ($reviewCount = $product->getReviewCount())

@if ($reviewCount == 0 || $reviewCount > 5)
    <span>{{$reviewCount}} recenzii</span>
@elseif ($reviewCount == 1)
    <span>{{$reviewCount}} recenzia</span>
@else
    <span>{{$reviewCount}} recenzie</span>
@endif
