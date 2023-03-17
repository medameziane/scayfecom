@section("title","ScayfEcom")
<div class="wrrapper">
    
    <!-- Start Services -->
    <div class="wrrapper-conrtainer">
        <section class="our-services">
            <div class="card-service">
                <div class="serive-image"><img src="{{asset('frontend/assets/imgs/icons/feature-1.png')}}" /></div>
                <h2 class="serive-title">Free Shipping</h2>
            </div>
            <div class="card-service">
                <div class="serive-image"><img src="{{asset('frontend/assets/imgs/icons/feature-2.png')}}" /></div>
                <h2 class="serive-title">Online Order</h2>
            </div>
            <div class="card-service">
                <div class="serive-image"><img src="{{asset('frontend/assets/imgs/icons/feature-3.png')}}" /></div>
                <h2 class="serive-title">Save Money</h2>
            </div>
            <div class="card-service">
                <div class="serive-image"><img src="{{asset('frontend/assets/imgs/icons/feature-6.png')}}" /></div>
                <h2 class="serive-title">24/7 Support</h2>
            </div>
        </section>     
    </div>

    <!-- Start products -->
    <div class="wrrapper-conrtainer">
        <h2 class="sidebar-title-daily">Recommended for you</h2>
        <section class="products">
            @foreach ( $products as $product)
                <div class="product">
                    <span class="product-status">new</span>
                    <a href="{{route('details',[$product->slug])}}" class="product-image">
                        <img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->name}}" />
                    </a>
                    <div class="product-info">
                        <a href="{{route('category',[$product->SubCategory->Category->slug,$product->SubCategory->slug])}}" class="product-category">{{$product->SubCategory->subcategory}}</a>
                        <a href="{{route('details',[$product->slug])}}" class="product-name">{{$product->name}}</a>
                        <div class="product-price">{{$product->price}} $</div>
                        <div class="product-items flexing">
                            <div class="product-add btn-action"><i class="fa-solid fa-cart-plus"></i> Add to cart</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </div>

    <!-- Start Popular catgories -->
    <div class="wrrapper-conrtainer">
        <h2 class="sidebar-title-daily">Popular categories</h2>
        <section class="popular-categories">
            <div class="categories" id="categories">
                @foreach ($limitcategories as $category)
                    <div class="category">
                        <a href="{{route('category',[$category->slug])}}" class="category-image">
                            <img src="{{asset('images/products/'.$category->image)}}">
                        </a>
                        <a href="{{route('category',[$category->slug])}}" class="category-title">{{$category->category}}</a>
                        <p class="product-count">{{count($category->products)}} Products</p>
                    </div>
                @endforeach
            </div>
        </section>   
    </div>

    <!-- Start weekly selles -->
    <div class="wrrapper-container my-4">
        <h2 class="sidebar-title-daily">Latest Deals for This Week</h2>
        <section class="daily-selles flexing">
            @foreach ($productslatestWeek as $productlatestWeek)
                <div class="d-selle">
                    <a href="{{route('details',[$productlatestWeek->slug])}}" class="product-image">
                        <img src="{{asset('images/products/'.$productlatestWeek->image)}}" />
                    </a>
                    <div class="product-info">
                        <a href="{{route('category',[$productlatestWeek->SubCategory->Category->slug,$productlatestWeek->SubCategory->slug])}}" class="product-category">{{$productlatestWeek->SubCategory->subcategory}}</a>
                        <a href="{{route('details',[$productlatestWeek->slug])}}" class="product-name">{{$productlatestWeek->name}}</a>
                        <div class="product-price">{{$productlatestWeek->price}} $</div>
                        <span class="available">Available:  <span class="in-stock">{{$productlatestWeek->quantity}}</span> In stock</span>
                    </div>
                </div>
            @endforeach
        </section>
    </div>

    <!-- Start product columns -->
    <div class="wrrapper-conrtainer">
        <section class="product-columns">
            
            <div class="product-column">
                <h2 class="sidebar-title">Best Seller</h2>
                @foreach ($bestsellerproducts as $bestsellerproduct)
                    <div class="p-column flex-start">
                        <a href="{{route('details',[$bestsellerproduct->slug])}}" class="category-image">
                            <img src="{{asset('images/products/'.$bestsellerproduct->image)}}">
                        </a>
                        <div class="product-info">
                            <a href="{{route('details',[$bestsellerproduct->slug])}}" class="product-name">{{$bestsellerproduct->name}}</a>
                            <div class="product-price">{{$bestsellerproduct->price}} $</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="product-column">
                <h2 class="sidebar-title">Products for you</h2>
                @foreach ($foryouproducts as $foryouproduct)
                    <div class="p-column flex-start">
                        <a href="{{route('details',[$foryouproduct->slug])}}" class="category-image">
                            <img src="{{asset('images/products/'.$foryouproduct->image)}}">
                        </a>
                        <div class="product-info">
                            <a href="{{route('details',[$foryouproduct->slug])}}" class="product-name">{{$foryouproduct->name}}</a>
                            <div class="product-price">{{$foryouproduct->price}} $</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="product-column">
                <h2 class="sidebar-title">Hot now</h2>
                @foreach ($hotproducts as $hotproduct)
                    <div class="p-column flex-start">
                        <a href="{{route('details',[$hotproduct->slug])}}" class="category-image">
                            <img src="{{asset('images/products/'.$hotproduct->image)}}">
                        </a>
                        <div class="product-info">
                            <a href="{{route('details',[$hotproduct->slug])}}" class="product-name">{{$hotproduct->name}}</a>
                            <div class="product-price">{{$hotproduct->price}} $</div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="product-column">
                <h2 class="sidebar-title">Popular products</h2>
                @foreach ($popularproducts as $popularproduct)
                    
                    <div class="p-column flex-start">
                        <a href="{{route('details',[$popularproduct->slug])}}" class="category-image">
                            <img src="{{asset('images/products/'.$popularproduct->image)}}">
                        </a>
                        <div class="product-info">
                            <a href="{{route('details',[$popularproduct->slug])}}" class="product-name">{{$popularproduct->name}}</a>
                            <div class="product-price">{{$popularproduct->price}} $</div>
                        </div>
                    </div>
                @endforeach
            </div>

        </section>      
    </div>

    <!-- Start single category -->
    <div class="wrrapper-conrtainer">
        <section class="single-categories">
            @foreach ($singleCategory as $single)
                <div class="single-category row mb-2">
                    <div class="single-category-brand col-lg-3">
                        <div class="single-category-info">
                            <h2 class="single-category-title"><b>{{$single->category}}</b></h2>
                            <a href="{{route('category',[$single->category])}}" class="btn-action">Shop now</a>
                        </div>
                        <div class="single-category-image"><img src="{{asset('images/products/'.$single->image)}}"></div>
                    </div>
                    <div class="single-category-products col-lg-9">
                        <div class="section-header flexing">
                            <h2 class="section-title">Shop best <b>{{$single->category}}</b> now</h2>
                            <a href="{{route('category',[$single->category])}}" class="section-link btn-action">View more</a>
                        </div>
                        <section class="products">
                            <?php 
                                $nbr_products = 0;
                                foreach ($single->products as $s_product) {?>
                                    <div class="product">
                                        <span class="product-status">new</span>
                                        <a href="{{route('details',[$s_product->slug])}}" class="product-image">
                                            <img src="{{asset('images/products/'.$s_product->image)}}" alt="{{$s_product->name}}" />
                                        </a>
                                        <div class="product-info">
                                            <a href="{{route('category',[$s_product->SubCategory->Category->slug,$s_product->SubCategory->slug])}}" class="product-category">{{$s_product->SubCategory->subcategory}}</a>
                                            <a href="{{route('details',[$s_product->slug])}}" class="product-name">{{$s_product->name}}</a>
                                        <div class="product-price">{{$s_product->price}}</div>
                                        <div class="product-items flexing">
                                            <div class="product-add btn-action"><i class="fa-solid fa-cart-plus"></i> Add to cart</div>
                                        </div>
                                        </div>
                                    </div>
                            <?php
                                if ($nbr_products++ === 3) break;
                                }
                            ?>
                        </section>
                    </div>
                </div>
            @endforeach
        </section> 
    </div>

    <!-- Start Featured categories -->
    <div class="wrrapper-conrtainer">
        <section class="featured-categories">
            <div class="featured-header flexing">
                <h2 class="featured-header-title">Featured Categories</h2>
                <div class="featured-header-categories" id="featured-header-categories">
                    @foreach ($featuredcategories as $featuredcategory)
                        <span class="featured-header-category" data-cat ='{{$featuredcategory->id}}'>
                            {{$featuredcategory->category}}
                        </span>
                    @endforeach
                </div>
            </div>
            @foreach ($featuredcategories as $featuredcategory)
                <div class="featured-items" id="{{$featuredcategory->id}}">
                    <section class="products">
                        <?php
                            $nbr_products = 0;
                            foreach ($featuredcategory->products as $featured_product) {?>
                                <div class="product">
                                    <span class="product-status">new</span>
                                    <a href="{{route('details',[$featured_product->slug])}}" class="product-image">
                                        <img src="{{asset('images/products/'.$featured_product->image)}}" alt="{{$featured_product->name}}" />
                                    </a>
                                    <div class="product-info">
                                        <a href="{{route('category',[$featured_product->SubCategory->Category->slug,$featured_product->SubCategory->slug])}}" class="product-category">{{$featured_product->SubCategory->subcategory}}</a>
                                        <a href="{{route('details',[$featured_product->slug])}}" class="product-name">{{$featured_product->name}}</a>
                                    <div class="product-price">{{$featured_product->price}}</div>
                                    <div class="product-items flexing">
                                        <div class="product-add btn-action"><i class="fa-solid fa-cart-plus"></i> Add to cart</div>
                                    </div>
                                    </div>
                                </div>
                        <?php
                                if ($nbr_products++ == 9) break;
                            }
                        ?>
                    </section>
                </div>
            @endforeach
        </section>
    </div>

</div>