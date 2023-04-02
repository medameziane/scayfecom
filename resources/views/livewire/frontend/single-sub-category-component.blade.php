<section class="shop-section">
    <div class="wrrapper">
        <main class="main-content row">
            <div class="main-details col-md-8">
                <div class="shop-products">
                    <div class="shop-items flexing">
                        <h3 class="shop-title">We found <span class="shop-count">{{count($products)}}</span> Items</h3>
                    </div>
                    <div class="products" wire:loading.remove wire:target="handleFilter">
                        @foreach ( $products as $product)
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
                    <div class="products" wire:loading wire:target="handleFilter">
                        Please wait... <i class="fa-solid fa-spinner fa-spin"></i>
                    </div>
                </div>
            </div>
            <aside class="sidebar col-md-4">
                <div class="sidebar-content">
                    <div class="sidebar-item">
                        <h3 class="sidebar-title">Filter Search</h3>
                        <div class="filter-search-content">
                            <h2 class="filter-title">Filter by price</h2>
                            <div class="filter-input">
                                <input type="range" 
                                class="filter-input-min"
                                min="0"
                                max="{{$this->maxprice}}" 
                                wire:model="minprice" id="shoppricefrom">

                                <input type="range" 
                                class="filter-input-min"
                                min="0"
                                max="{{$maxproductsprice}}" 
                                wire:model="maxprice" id="shoppriceto">
                            </div>

                            <div class="ranger-price">
                                Price Between:  <span class="price-from">{{$this->minprice}}$</span>
                                                <b> — </b>
                                                <span class="price-to">{{$this->maxprice}}$</span>
                            </div>
                            <button wire:click="handleFilter()" class="btn-action my-3">Apply Filter</button>
                        </div>
                    </div>
                </div>
            </aside>
        </main>
    </div>
</section>