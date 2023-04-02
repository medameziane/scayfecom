<div class="cart-hidden">
    <div class="cart-hidden-header flexing py-3 px-2">
        <div class="cart-hidden-close" id="close-cart"><i class="fa-solid fa-xmark"></i></div>
        <h2 class="cart-hidden-title">Shopping cart</h2>
    </div>
    @if(Auth::check())
        <a href="{{route('cart')}}" class="btn-action my-3">View Cart</a>
        <div class="carts-hidden-items">
            @foreach ($carts as $cart)
                <div class="cart-hidden-item flex-start">
                <a href="{{route('details',[$cart->product->slug])}}" class="product-image">
                    <img src="{{asset('images/products/'.$cart->product->image)}}" alt="{{$cart->product->name}}" />
                </a>
                <div class="cart-hidden-info">
                    <a href="{{route('details',[$cart->product->slug])}}" class="cart-hidden-product">{{$cart->product->name}}</a>
                    <p class="cart-hidden-quanity">
                    @if ($cart->product->quantity<20)
                        <b style="color:red">Only left:</b> {{$cart->product->quantity}}<br>
                        <b>Quantity:</b> {{$cart->quantity}}
                        @else
                        <b>Quantity:</b> {{$cart->quantity}}
                    @endif
                    </p>
                    <p class="cart-hidden-price"><b>SubTotal:</b> {{$cart->subprice}}$</p>
                </div>
                </div>
            @endforeach
        </div>
    @else
        <a href='{{route("login")}}' class="btn-action my-3">Login</a>
    @endif
</div>