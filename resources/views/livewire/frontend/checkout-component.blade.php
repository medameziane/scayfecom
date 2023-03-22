<!-- Start checkout -->
<section class="checkout-section">
    <div class="wrrapper">
        <div class="row">
            <div class="col-sm-6">
                <a href="{{route('cart')}}" class="btn text-muted d-none d-sm-inline-block btn-link fw-semibold">
                Back To Cart</a>
            </div>
        </div>
        <form action="#" id="checkout-form">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Client informations -->
                    <div class="billing-details">
                        <p class="checkout-title">Billing Details</p>
                        <div class="form-content">
                
                            <!-- Full name -->
                            <div class="form-section">
                                <label for="full_name" class="f-label">Full name</label>
                                <input type="text" id="full_name" value="{{Auth::user()->name}}" placeholder="Enter your full name" class="f-input" >
                            </div>
                
                            <!-- Email -->
                            <div class="form-section">
                                <label for="f_email" class="f-label">Email address</label>
                                <input type="email" id="f_email"value="{{Auth::user()->email}}"  placeholder="Email address" class="f-input">
                            </div>
                
                            <!-- phone -->
                            <div class="form-section">
                                <label for="phone" class="f-label">Phone</label>
                                <input type="text" id="phone" value="{{Auth::user()->phone}}" placeholder="Enter phone" class="f-input">
                            </div>
                
                            <!-- Country -->
                            <div class="form-section">
                                <label for="country" class="f-label">Country</label>
                                <input type="text" id="country" placeholder="Your country" class="f-input" >
                            </div>

                            <!-- City -->
                            <div class="form-section">
                                <label for="City" class="f-label">City</label>
                                <input type="text" id="City" placeholder="Your city" class="f-input" >
                            </div>

                            <!-- Street Address -->
                            <div class="form-section">
                                <label for="street" class="f-label">Street Address</label>
                                <input type="text" id="street" placeholder="Your Street address" class="f-input" >
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <!-- Shopping informations -->
                    <div class="checkout-details">
                        <p class="checkout-title">Shopping Summary</p>
                        <div class="checkout-items">
                            <div class="checkout-item flexing">
                                <p class="check-name">Total</p>
                                <p class="check-value"><input type="text" value="150$" id="total" class="cart-price" disabled/></p>
                            </div>
                            <div class="checkout-item flexing">
                                <p class="check-name">Shipping</p>
                                <p class="check-value">Free shipping</p>
                            </div>
                            <div class="checkout-item flexing">
                                <p class="check-name">Total + Shipping</p>
                                <p class="check-value"><input type="text" value="250$" id="totalwithshipping" class="cart-price" disabled/></p>
                            </div>
                        </div>
                    </div>

                    <!-- Payments methods -->
                    <div class="payment-methods">
                        <p class="checkout-title">Payment methods</p>
                        <p class="payment-error"></p>

                        <div class="form-section">
                            <input type="radio" name="payment-method" id="cards-payment">
                            <label for="cards-payment" class="f-label">
                                <img src="{{asset('frontend/assets/imgs/icons/cards-payment.png')}}" class="paypal">
                            </label>
                        </div>

                        <div class="form-section">
                            <input type="radio" value="paypal" name="payment-method" id="paypal">
                            <label for="paypal" class="f-label">
                                <img src="{{asset('frontend/assets/imgs/icons/paypal.png')}}" class="paypal">
                            </label>
                        </div>

                        <div class="form-section">
                            <input type="radio" value="cod" name="payment-method" id="cod">
                            <label for="cod" class="f-label">Cash on delivery</label>
                            <div class="checkout-method-info cod">Pay with cash upon delivery.</div>
                        </div>

                        <div class="form-section">
                            <input type="checkbox" id="terms">
                            <label for="terms" class="f-label terms d-inline">I have read and agree to the website 
                                <a href="#"><b style="text-decoration: underline;">terms and conditions</b></a>
                            </label>
                        </div>

                        <input type="submit" value="Place Order" class="btn-action w-100 py-2">
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>