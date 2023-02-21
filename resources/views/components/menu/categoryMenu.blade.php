@aware(['categories'])
@aware(['activeCategory'])

<style>
    .stickyOffset {
        top: 50px;
    }
</style>

<ul class="sticky-lg-top stickyOffset list-group">
    @foreach ($categories as $category)

        @if (isset($activeCategory) && $activeCategory->category == $category->category)
            <a href="/shop/{{$category->category}}" class="list-group-item list-group-item-action list-group-item-dark d-flex justify-content-between align-items-center">
                <span style="word-break: break-all">{{$category->getDisplayName()}}</span>
                <span class="badge bg-primary rounded-pill">{{$category->getSellingProductsCount()}}</span>
            </a>
        @else
            <a href="/shop/{{$category->category}}" class="list-group-item list-group-item-action list-group-item d-flex justify-content-between align-items-center">
                <span style="word-break: break-all">{{$category->getDisplayName()}}</span>
                <span class="badge bg-primary rounded-pill">{{$category->getSellingProductsCount()}}</span>
            </a>
        @endif

    @endforeach
</ul>
