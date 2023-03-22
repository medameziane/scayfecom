<!-- Start cart -->
<section class="cart-section">
    <div class="wrrapper">
        @if (session()->has("deleted"))
            <div class="alert alert-success">
                {{session("deleted")}}
            </div>
        @endif
        @if (session()->has("updated"))
            <div class="alert alert-success">
                {{session("updated")}}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-6">
                <a href="/" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                Back To Shopping</a>
            </div>
        </div>
        <div class="row">
            <!-- <form method="post" id="form-cart"> -->
            <div class="col-lg-8">
                <table class="table table-borderless table-nowrap table-centered table-bordered">
                    <thead class="table-light text-center">
                    <tr>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Sub Total</td>
                        <td>Remove</td>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($carts as $cart)
                            <tr class="align-middle">
                                <td>
                                    <div class="cart-product">
                                        <a href="{{route('details',[$cart->product->slug])}}">
                                            <img src="{{asset('images/products/'.$cart->product->image)}}" class="img-cart"/>
                                        </a>
                                        <a href="{{route('details',[$cart->product->slug])}}" class="cart-product-name">{{$cart->product->name}}</a>
                                    </div>
                                </td>

                                <td><input type="text" value="{{$cart->product->price}}$" id="productprice{{$cart->product->id}}" class="cart-price productqte{{$cart->product->id}}" disabled/></td>

                                <td>
                                    <div class="cart-quantity">
                                        <button 
                                            class="c-qa minus" 
                                            id="minus" 
                                            wire:click = 'minus({{$cart->product->id}})'
                                            data-calc = "productcalc{{$cart->product->id}}" 
                                            data-qte ='productqte{{$cart->product->id}}' 
                                            data-price   = "productprice{{$cart->product->id}}">-</button>

                                        <input type="number" name="product-quantity" min="1" value="{{$cart->quantity}}" class="product-quantity" id="productqte{{$cart->product->id}}" disabled/>

                                        <button 
                                            class="c-qa plus" 
                                            id="plus" 
                                            wire:click = 'plus({{$cart->product->id}})'
                                            data-calc ="productcalc{{$cart->product->id}}" 
                                            data-qte ='productqte{{$cart->product->id}}' 
                                            data-price = "productprice{{$cart->product->id}}">+</button>
                                    </div>
                                </td>
                                <td><input type="text" value="{{$cart->product->price * $cart->quantity}}$" id="productcalc{{$cart->product->id}}" class="cart-price product-sub-price" disabled/></td>
                                <td>
                                    <button type="button" 
                                        class="btn-action bg-danger"
                                            onclick="confirm('Are you sure you want to remove the product from this group?') || event.stopImmediatePropagation()" 
                                            wire:click="delete({{$cart->id}})">
                                            <span wire:loading.remove wire:target="delete({{$cart->id}})">
                                                <i class="fa-solid fa-trash"></i> Remove
                                            </span>
                                            
                                            <div wire:loading wire:target= "delete({{$cart->id}})">
                                                Removing ... <i class="fa-solid fa-spinner fa-spin"></i>
                                            </div>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4">
                <div class="border p-3 mt-4 mt-lg-0 rounded">
                <h4 class="header-title mb-3">Order Summary</h4>
                <div class="table-responsive">
                    <table class="table mb-3">
                        <tbody>
                            <tr>
                                <td>Shipping :</td>
                                <td>Free Shipping</td>
                            </tr>
                            <tr>
                                <td>Total :</td>
                                <td><input type="text" id="total" class="cart-price" disabled/></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-sm-start">
                        <a href="{{route('checkout')}}" class="btn btn-primary w-100">Proceed To Checkout</a>
                    </div>
                </div>
                </div>
            </div>
            <!-- </form> -->
        </div>
    </div>
</section>