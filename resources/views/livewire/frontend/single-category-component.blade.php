<!-- Start Slide Single Category -->
<div class="wrrapper">
    <div class="slide-single-page my-5">
        @foreach ($singleSlide as $slide)
            <div class="slide-single">
                <div class="overly"></div>
                <div class="slide-single-image"><img src="{{asset('/images/products/'.$slide->image)}}"/></div>
                <div class="slide-single-content">
                    <h2 class="slide-single-title">{{$slide->category}}</h2>
                    <a href="{{route('category',[$slide->slug])}}" class="btn-action">Buy now</a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Start Single Category -->
<div class="wrrapper">
    @foreach ($singlecategory->SubCategory as $SubCategory)
        <div class="my-category my-5">
            <div class="section-header flexing">
                <h2 class="section-title">{{$SubCategory->subcategory}}</h2>
                <a href="{{route('subcategory',[$SubCategory->Category->slug,$SubCategory->slug])}}" class="section-link btn-action">View more</a>
            </div>
            <div class="products">
                @foreach ( $SubCategory->products as $product )
                    <div class="product">
                        <span class="product-status">new</span>
                        <a href="{{route('details',[$product->slug])}}" class="product-image">
                            <img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->name}}" />
                        </a>
                        <div class="product-info">
                            <a href="{{route('subcategory',[$product->SubCategory->Category->slug,$product->SubCategory->slug])}}" class="product-category">{{$product->SubCategory->subcategory}}</a>
                            <a href="{{route('details',[$product->slug])}}" class="product-name">{{$product->name}}</a>
                            <p class="product-price">{{$product->price}}$</p>
                            {{-- <div class="product-items flexing">
                                <button type="button" class="btn-action" wire:click="addcart({{$product->id}})">
                                    <span wire:loading.remove wire:target="addcart({{$product->id}})">
                                        <i class="fa-solid fa-cart-plus"></i> Add to cart
                                    </span>
                                    
                                    <span wire:loading wire:target= "addcart({{$product->id}})">
                                        Adding to cart ... <i class="fa-solid fa-spinner fa-spin"></i>
                                    </span>
                                </button>
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>