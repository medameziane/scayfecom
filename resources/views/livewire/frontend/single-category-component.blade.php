<!-- Start Slide Single Category -->
<div class="wrrapper">
    <div class="slide-single-page my-5">
        @foreach ($singleSlide as $slide)
            <div class="slide-single">
                <div class="overly"></div>
                <div class="slide-single-image">
                    <img src="{{asset('/images/products/'.$slide->image)}}"/>
                </div>
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
    @foreach ($singlecategory[0]->SubCategory as $SubCategory)
        <div class="my-category my-5">
            <div class="section-header flexing">
                <h2 class="section-title">{{$SubCategory->subcategory}}</h2>
                <a href="{{route('category',[$SubCategory->Category->slug,$SubCategory->slug])}}" class="section-link btn-action">View more</a>
            </div>
            <div class="products">
                <?php
                    $nbr_products = 0;
                    foreach ($SubCategory->products as $product) {?>
                        <div class="product">
                            <span class="product-status">new</span>
                            <a href="{{route('details',[$product->slug])}}" class="product-image">
                                <img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->name}}" />
                            </a>
                            <div class="product-info">
                                <a href="{{$product->SubCategory->subcategory}}" class="product-category">{{$product->SubCategory->subcategory}}</a>
                                <a href="{{route('details',[$product->slug])}}" class="product-name">{{$product->name}}</a>
                            <div class="product-price">{{$product->price}}</div>
                            <div class="product-items flexing">
                                <div class="product-add btn-action"><i class="fa-solid fa-cart-plus"></i> Add to cart</div>
                            </div>
                            </div>
                        </div>
                <?php
                        if ($nbr_products++ == 9) break;
                    }
                ?>
            </div>
        </div>
    @endforeach

</div>