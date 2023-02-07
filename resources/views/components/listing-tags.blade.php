@props(['tagsCsv'])

@php
    $tags = explode(',', $tagsCsv)
@endphp

<ul class="list-group list-group-horizontal">
    @foreach ($tags as $tag)
        <li class="list-group-item">
            <a href="/?tag={{$tag}}">{{$tag}}</a>
        </li>
    @endforeach
</ul>
