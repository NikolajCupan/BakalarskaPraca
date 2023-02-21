<link rel="stylesheet" href="{{asset('css/onlyImage.css')}}">

@if (!is_null($imagePath))
<img class="imageCenter" src="{{asset('/storage/images/products/' . $imagePath)}}" alt="">
@else
<img class="imageCenter" src="{{asset('/images/imageMissing.jpg')}}" alt="">
@endif
