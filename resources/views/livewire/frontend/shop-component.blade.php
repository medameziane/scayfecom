<!-- Start Shop details -->
<section class="shop-section">
    <div class="wrrapper">
    <main class="main-content">
        <div class="main-details">
            <div class="shop-products">
                <div class="shop-items flexing">
                <div class="shop-title">We found <span class="shop-count">{{count($singlesubcategory[0]->products)}}</span> Items</div>
                </div>
                <div class="products">
                    @foreach ( $singlesubcategory[0]->products as $product)
                        <div class="product">
                            <span class="product-status">new</span>
                            <a href="{{route('details',[$product->slug])}}" class="product-image">
                                <img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->name}}" />
                            </a>
                            <div class="product-info">
                                <a href="{{$product->SubCategory->slug}}" class="product-category">{{$product->SubCategory->subcategory}}</a>
                                <a href="{{route('details',[$product->slug])}}" class="product-name">{{$product->name}}</a>
                                <div class="product-price">{{$product->price}} $</div>
                                <div class="product-items flexing">
                                    <div class="product-add btn-action"><i class="fa-solid fa-cart-plus"></i> Add to cart</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <aside class="sidebar">
            <div class="sidebar-content">
                <div class="sidebar-item">
                <div class="sidebar-title">Filter Search</div>
                <form action="#" class="form-filter">
                    <div class="filter-title">Filter by price</div>
                    <div class="filter-input">
                    <input type="range" class="filter-input-min" value="0" min="0" max="250" id="shoppricefrom">
                    <input type="range" class="filter-input-min" value="0" min="0" max="250" id="shoppriceto">
                    </div>
                    <div class="ranger-price">
                    Price Between:  
                    <span class="price-from">0$</span> <b> — </b>
                    <span class="price-to">250$</span>
                    </div>
                    <input type="submit" value="Apply Filter " class="btn-action my-3">
                </form>
                </div>
            </div>
        </aside>
    </main>
    </div>
</section>