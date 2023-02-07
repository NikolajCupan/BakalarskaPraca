@props(['listing'])

<div class="card" style="width: 30rem;">
    <img src="{{asset('images/image.png')}}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{$listing->title}}</h5>
        <p class="card-text">{{$listing->description}}</p>
        <a href="listing/{{$listing->id}}" class="btn btn-primary">Go somewhere</a>
        <x-listing-tags :tagsCsv="$listing->tags"/>
    </div>
</div>
