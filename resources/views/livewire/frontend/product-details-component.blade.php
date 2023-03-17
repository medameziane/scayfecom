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
                                <a [href="{{route('category',[$product->SubCategory->Category->slug,$product->SubCategory->slug])}}" class="product-category">{{$product->SubCategory->subcategory}}</a>
                            </div>
                            <div class="p-details-item">
                                <span class="p-item">Stock:</span>
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
                            <!-- <form action="/" method="post"> -->
                                <div class="p-details-item">
                                <span class="p-item">Select Quantity</span>
                                <div class="product-info">
                                    <div class="cart-quantity">
                                    <button class="c-qa minus" id="minus" data-calc = "calc5" data-qte ='qte5'>-</button>
                                    <input type="number" name="product-quantity" min="1" value="1" class="product-quantity" disabled/>
                                    <button class="c-qa plus" id="plus" data-calc ="calc5" data-qte ='qte5'>+</button>
                                    </div>
                                </div>
                                </div>
                                <div class="p-details-actions">
                                <button type="submit" class="p-details-shop btn btn-primary">Buy now</button>
                                <button class="p-details-shop btn btn-success">Add to cart</button>
                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="more-product">
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
                                    <a href="{{route('category',[$product->SubCategory->Category->slug,$product->SubCategory->slug])}}" class="product-category">{{$product->SubCategory->subcategory}}</a>
                                    <a href="{{route('details',[$product->slug])}}" class="product-name">{{$product->name}}</a>
                                <div class="product-price">{{$product->price}}</div>
                                <div class="product-items flexing">
                                    <div class="product-add btn-action"><i class="fa-solid fa-cart-plus"></i> Add to cart</div>
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
            <!-- <aside class="sidebar">
            <div class="sidebar-content">
                <div class="sidebar-item">
                <div class="sidebar-title">Latest Products</div>
                <div class="sidebar-latest-products">
                    <a href="#" class="product-image">
                    <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/03/banner-5-min.png">
                    </a>
                    <div class="product-info">
                    <a href="#" class="product-name">Iphone 14 pro max</a>
                    <div class="product-price">2500 $</div>
                    </div>
                </div>
                <div class="sidebar-latest-products">
                    <a href="#" class="product-image">
                    <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/03/banner-5-min.png">
                    </a>
                    <div class="product-info">
                    <a href="#" class="product-name">Iphone 14 pro max</a>
                    <div class="product-price">2500 $</div>
                    </div>
                </div>
                <div class="sidebar-latest-products">
                    <a href="#" class="product-image">
                    <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/03/banner-5-min.png">
                    </a>
                    <div class="product-info">
                    <a href="#" class="product-name">Iphone 14 pro max</a>
                    <div class="product-price">2500 $</div>
                    </div>
                </div>
                <div class="sidebar-latest-products">
                    <a href="#" class="product-image">
                    <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/03/banner-5-min.png">
                    </a>
                    <div class="product-info">
                    <a href="#" class="product-name">Iphone 14 pro max</a>
                    <div class="product-price">2500 $</div>
                    </div>
                </div>
                </div>
                <div class="sidebar-item">
                <div class="sidebar-title">New Products</div>
                <div class="sidebar-latest-products">
                    <a href="#" class="product-image">
                    <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/03/banner-5-min.png">
                    </a>
                    <div class="product-info">
                    <a href="#" class="product-name">Iphone 14 pro max</a>
                    <div class="product-price">2500 $</div>
                    </div>
                </div>
                <div class="sidebar-latest-products">
                    <a href="#" class="product-image">
                    <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/03/banner-5-min.png">
                    </a>
                    <div class="product-info">
                    <a href="#" class="product-name">Iphone 14 pro max</a>
                    <div class="product-price">2500 $</div>
                    </div>
                </div>
                <div class="sidebar-latest-products">
                    <a href="#" class="product-image">
                    <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/03/banner-5-min.png">
                    </a>
                    <div class="product-info">
                    <a href="#" class="product-name">Iphone 14 pro max</a>
                    <div class="product-price">2500 $</div>
                    </div>
                </div>
                <div class="sidebar-latest-products">
                    <a href="#" class="product-image">
                    <img src="https://themepanthers.com/wp/nest/d1/wp-content/uploads/2022/03/banner-5-min.png">
                    </a>
                    <div class="product-info">
                    <a href="#" class="product-name">Iphone 14 pro max</a>
                    <div class="product-price">2500 $</div>
                    </div>
                </div>
                </div>
            </div>
            </aside> -->
        </main>
    </div>
</div>