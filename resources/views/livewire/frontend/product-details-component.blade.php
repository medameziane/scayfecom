<!-- Start products details -->
<div class="product-details">
    <div class="wrrapper">
        <main class="main-content">
            <div class="main-details">
                @foreach ($productdetails as $product)                    
                    <div class="p-details row">
                        <div class="p-details-image col-lg-5">
                            <img src="{{asset('images/products/'.$product->image)}}">
                        </div>
                        <div class="p-info col-lg-7">
                            <div class="p-details-name">{{$product->name}}</div>
                            <div class="p-details-item">
                                <span class="p-item">Category:</span>
                                <a href="{{route('subcategory',[$product->SubCategory->Category->slug,$product->SubCategory->slug])}}" class="product-category">
                                    {{$product->SubCategory->subcategory}}
                                </a>
                            </div>
                            <div class="p-details-item">
                                <span class="p-item">Availability:</span>
                                <span class="item-info">In Stock</span>
                            </div>
                            <div class="p-details-item">
                                <span class="p-item">Status:</span>
                                <span class="item-info">New</span>
                            </div>
                            <div class="p-details-item">
                                <span class="p-item">Price:</span>
                                <span class="product-price">{{$product->price}} $</span>
                            </div>
                            <div class="p-details-item">
                                <span class="p-item">Quantity:</span>
                                <div class="cart-quantity flexing mx-0">

                                    {{-- Button minus quantity --}}
                                    <button class ="quantity"  wire:click = "minus({{$product->id}})">-</button>

                                    {{-- Quantity area --}}
                                    <span wire:loading.remove wire:target="plus, minus">
                                        <input type="text" class="quantity inputquantity" min="1" wire:model="quantity"/>
                                    </span>

                                    <span wire:loading wire:target="plus, minus">
                                        <span class="quantity"><i class="fa-solid fa-spinner fa-spin"></i></span>
                                    </span>

                                    {{-- Button plus quantity --}}
                                    <button class = "quantity" wire:click = "plus({{$product->id}})">+</button>
                                </div>
                            </div>
                            <div class="p-details-item">
                                <div class="btn-action w-50 py-2" wire:click="addcart({{$product->id}})">
                                    <span wire:loading.remove wire:target="addcart({{$product->id}})">
                                        <i class="fa-solid fa-cart-plus"></i> 
                                        Add to cart
                                    </span>
                                    
                                    <span wire:loading wire:target= "addcart({{$product->id}})">
                                        Adding to cart ... <i class="fa-solid fa-spinner fa-spin"></i>
                                    </span>
                                </div>

                                {{-- <div class="btn-action bg-success w-50 py-2" wire:click="addcart({{$product->id}})">
                                    <span wire:loading.remove wire:target="addcart({{$product->id}})">
                                        <i class="fa-solid fa-cart-plus"></i> 
                                        Buy Now
                                    </span>
                                    
                                    <span wire:loading wire:target= "addcart({{$product->id}})">
                                        Adding to cart ... <i class="fa-solid fa-spinner fa-spin"></i>
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="more-product my-3">
                        <div class="m-details-title">Description</div>
                        <p class="more-details-description">{{$product->description}}</p>
                    </div>
                @endforeach
                <div class="related-products">
                    <div class="sidebar-title-daily">Related Products</div>
                    <div class="products">
                    <?php
                        $nbr_products = 0;
                        foreach ($category[0]->products as $product) {?>
                            <div class="product">
                                <span class="product-status">new</span>
                                <a href="{{route('details',[$product->slug])}}" class="product-image">
                                    <img src="{{asset('images/products/'.$product->image)}}" alt="{{$product->name}}" />
                                </a>
                                <div class="product-info">
                                    <a href="{{route('subcategory',[$product->SubCategory->Category->slug,$product->SubCategory->slug])}}" class="product-category">{{$product->SubCategory->subcategory}}</a>
                                    <a href="{{route('details',[$product->slug])}}" class="product-name">{{$product->name}}</a>
                                <p class="product-price">{{$product->price}}$</p>
                                <div class="product-items flexing">
                                    <div class="btn-action" wire:click="addcart({{$product->id}})">
                                        <span wire:loading.remove wire:target="addcart({{$product->id}})">
                                            <i class="fa-solid fa-cart-plus"></i> 
                                            Add to cart
                                        </span>
                                        
                                        <span wire:loading wire:target= "addcart({{$product->id}})">
                                            Adding to cart ... <i class="fa-solid fa-spinner fa-spin"></i>
                                        </span>
                                    </div>
                                </div>
                                </div>
                            </div>
                    <?php
                            if ($nbr_products++ == 4) break;
                        }
                    ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>