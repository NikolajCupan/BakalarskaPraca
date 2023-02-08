

@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv);
    $tags = array_map('trim', $tags);
@endphp

<ul class="list-group list-group-horizontal">
    @foreach ($tags as $tag)
        <li class="list-group-item">
            <a href="/listings/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>
