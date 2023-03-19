<!-- Start checkout -->
<section class="checkout-section">
    <div class="wrrapper">
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
                                <input type="text" id="full_name" placeholder="Enter your full name" class="f-input" >
                            </div>
                
                            <!-- Email -->
                            <div class="form-section">
                                <label for="f_email" class="f-label">Email address</label>
                                <input type="email" id="f_email" placeholder="Email address" class="f-input">
                            </div>
                
                            <!-- phone -->
                            <div class="form-section">
                                <label for="phone" class="f-label">Phone</label>
                                <input type="text" id="phone" placeholder="Enter phone" class="f-input">
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
                        <label for="terms" class="f-label terms"> I have read and agree to the website 
                        <a href="#">
                            <b style="text-decoration: underline;">terms and conditions</b>
                        </a>
                        </label>
                    </div>

                    <input type="submit" value="Place Order" class="btn-action w-100 py-2">
                    </div>
                </div>

                <div class="col-lg-4">

                    <!-- Product informations -->
                    <div class="checkout-details">
                    <p class="checkout-title">Your Orders</p>
                        <table class="table table-borderless table-nowrap table-centered table-bordered">
                        <thead class="table-light text-center">
                            <tr>
                            <td>Product</td>
                            <td>Quantity</td>
                            <td>Sub Total</td>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr class="align-middle">
                            <td>
                                <div class="cart-product">
                                <img src="https://coderthemes.com/hyper/creative/assets/images/products/product-1.jpg" class="img-cart"/>
                                <a href="#" class="cart-product-name">Iphone 14 pro max</a>
                                </div>
                            </td>
                            <td>
                                <div class="cart-quantity">
                                <button class="c-qa minus" id="minus" data-calc = "calc1" data-qte ='qte1'>-</button>
                                <input type="number" name="product-quantity" min="1" value="1" class="product-quantity" id="qte1" disabled/>
                                <button class="c-qa plus" id="plus" data-calc ="calc1" data-qte ='qte1'>+</button>
                                </div>
                            </td>
                            <td><input type="text" value="150$" id="calc1" class="cart-price product-sub-price" disabled/></td>
                            </tr>
                            <tr class="align-middle">
                            <td>
                                <div class="cart-product">
                                <img src="https://coderthemes.com/hyper/creative/assets/images/products/product-1.jpg" class="img-cart"/>
                                <a href="#" class="cart-product-name">Iphone 14 pro max</a>
                                </div>
                            </td>
                            <td>
                                <div class="cart-quantity">
                                <button class="c-qa minus" id="minus" data-calc = "calc2" data-qte ='qte2'>-</button>
                                <input type="number" name="product-quantity" min="1" value="1" class="product-quantity" id="qte2" disabled/>
                                <button class="c-qa plus" id="plus" data-calc ="calc2" data-qte ='qte2'>+</button>
                                </div>
                            </td>
                            <td><input type="text" value="150$" id="calc2" class="cart-price product-sub-price" disabled/></td>
                            </tr>
                            <tr class="align-middle">
                            <td>
                                <div class="cart-product">
                                <img src="https://coderthemes.com/hyper/creative/assets/images/products/product-1.jpg" class="img-cart"/>
                                <a href="#" class="cart-product-name">Iphone 14 pro max</a>
                                </div>
                            </td>
                            <td>
                                <div class="cart-quantity">
                                <button class="c-qa minus" id="minus" data-calc = "calc3" data-qte ='qte3'>-</button>
                                <input type="number" name="product-quantity" min="1" value="1" class="product-quantity" id="qte3" disabled/>
                                <button class="c-qa plus" id="plus" data-calc ="calc3" data-qte ='qte3'>+</button>
                                </div>
                            </td>
                            <td><input type="text" value="150$" id="calc3" class="cart-price product-sub-price" disabled/></td>
                            </tr>
                        </tbody>
                        </table>
                        <div class="checkout-items">
                        <input type="text" value="150$" id="product-price" class="cart-price qte1" hidden/>
                        <input type="text" value="150$" id="product-price" class="cart-price qte2" hidden/>
                        <input type="text" value="150$" id="product-price" class="cart-price qte3" hidden/>
                        <div class="checkout-item flexing">
                            <p class="check-name">Total</p>
                            <p class="check-value"><input type="text" id="total" class="cart-price" disabled/></p>
                        </div>
                        <div class="checkout-item flexing">
                            <p class="check-name">Shipping</p>
                            <p class="check-value">Free shipping</p>
                        </div>
                        <div class="checkout-item flexing">
                            <p class="check-name">Total + Shipping</p>
                            <p class="check-value"><input type="text" id="totalwithshipping" class="cart-price" disabled/></p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>