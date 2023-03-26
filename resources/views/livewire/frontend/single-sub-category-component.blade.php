<section class="shop-section">
    <div class="wrrapper">
        <main class="main-content row">
            <div class="main-details col-md-8">
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
                                    <p class="product-price">{{$product->price}} $</p>
                                    <div class="product-items flexing">
                                        <div class="btn-action" wire:click="addcart({{$product->id}})">
                                            <span wire:loading.remove wire:target="addcart({{$product->id}})">
                                                <i class="fa-solid fa-cart-plus"></i> Add to cart
                                            </span>
                                            
                                            <span wire:loading wire:target= "addcart({{$product->id}})">
                                                Adding to cart ... <i class="fa-solid fa-spinner fa-spin"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <aside class="sidebar col-md-4">
                <div class="sidebar-content">
                    <div class="sidebar-item">
                    <div class="sidebar-title">Filter Search</div>
                    <form action="#" class="form-filter">
                        <h2 class="filter-title">Filter by price</h2>
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