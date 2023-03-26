@section("title","Shopping Cart")
<section class="cart-section">
    <div class="wrrapper">
        <div class="row">
            <div class="col-sm-6">
                <a href="/" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                Back To Shopping</a>
            </div>
        </div>
        <div class="row">
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
                                <td><span class="cart-price product-sub-price">{{$cart->product->price}}$</span></td>
                                <td>
                                    <div class="cart-quantity flexing">

                                        {{-- Button minus quantity --}}
                                        <button class ="quantity"  wire:click = "minus({{$cart->product->id}})">-</button>

                                        {{-- Quantity area --}}
                                        <span wire:loading.remove>
                                            <span class="product-quantity">{{$cart->quantity}}</span>
                                        </span>

                                        <span wire:loading>
                                            <span class="product-quantity"><i class="fa-solid fa-spinner fa-spin"></i></span>
                                        </span>

                                        {{-- Button plus quantity --}}
                                        <button class = "quantity" wire:click = "plus({{$cart->product->id}})">+</button>

                                    </div>
                                </td>
                                <td><span class="cart-price product-sub-price">{{$cart->subprice}}$</span></td>
                                <td>
                                    <button type="button" 
                                        class       =   "btn-action bg-danger"
                                        onclick     =   "confirm('Are you sure you want to remove the product from this group?') || event.stopImmediatePropagation()"
                                        wire:click  =   "delete({{$cart->id}})">

                                        <span wire:loading.remove wire:target="delete({{$cart->id}})">
                                            <i class="fa-solid fa-trash"></i> Remove
                                        </span>

                                        <span wire:loading wire:target= "delete({{$cart->id}})">
                                            Removing ... <i class="fa-solid fa-spinner fa-spin"></i>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-lg-4">
                <livewire:frontend.cart-summary-component />
            </div>
        </div>
    </div>
</section>