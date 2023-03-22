@foreach ( $categories as $category )
<div class="category-item" wire:id = {{$category->id}}>
    <a href="{{route('category',$category->slug)}}" class="flexing">
    {{$category->category}}
    <i class="fa-solid fa-chevron-right icon-menu-right"></i>
    </a>
    <div class="sub-categories">
    <h3 class="sub-category-title">{{$category->category}}</h3>
    @foreach ($category->SubCategory as $SubCategory)
        <a href="{{route('category',[$category->slug,$SubCategory->slug])}}" class="sub-category-item flexing">{{$SubCategory->subcategory}}</a>
    @endforeach
    </div>
</div>
@endforeach