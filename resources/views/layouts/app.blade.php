<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>@yield('title')</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="icon" href="{{asset('images/icons/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.min.css')}}">
    <link rel='stylesheet' type='text/css' href="{{asset('frontend/assets/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('frontend/assets/css/fontowsome.min.css')}}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    @livewireStyles
  </head>
  <body>
    <div><i class="fa-solid fa-arrow-up" id="toup"></i></div>
    <!-- Start header -->
    <header class="header">
      <div class="header-content">
        <div class="top-header">
          <div class="wrrapper">
            <div class="top-header-content flexing">
              <div class="center-top-header">
                <p class="center-header">Free Shipping on all products</p>
              </div>
              <div class="right-top-header">
                <ul class="top-items flexing">
                  @if (Auth::user())
                    <div class="user-area flexing">
                      <span class="name-area">My account</span><i class="fa-solid fa-chevron-down"></i>
                      <div class="user-items">
                        <p class="welcome-user my-2 px-3">Welcome {{Auth::user()->name}}</p>
                        <ul>
                          <li class="user-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                          <li class="user-item"><a href="#">My profile</a></li>
                          <li class="user-item"><a href="#">My Cart</a></li>
                          <li class="user-item"><a href="#">My Wishlist</a></li>
                          <li class="user-item">
                            <form method="POST" action="{{ route('logout') }}">
                              @csrf
                              <a href="{{route('logout')}}" onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                              </a>
                            </form>
                          </li>
                        </ul>
                      </div>
                    </div>
                    @else
                      <li class="top-item"><a href="{{route('login')}}">Log In</a></li>
                      <li class="top-item"><a href="{{route('register')}}">Register</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="middle-header">
          <div class="wrrapper">
            <div class="middle-header-content flexing">
              <a href="/" class="logo-area">
                <img src="{{asset('images/icons/logo.png')}}">
              </a>
              <div class="search-area">
                <input type="text" class="header-search" placeholder="search here..."/>
                <i class="fa-solid fa-magnifying-glass search-icon"></i>
              </div>
              <div class="middle-header-items">
                <div class="middle-item">
                  <span class="counter">5</span>
                  <img src="{{asset('frontend/assets/imgs/icons/icon-heart.svg')}}"/>
                </div>
                <div class="middle-item" id="shopping-cart">
                  <span class="counter" id="countercart">{{count($carts)}}</span>
                  <img src="{{asset('frontend/assets/imgs/icons/icon-cart.svg')}}"/>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="main-header">
          <div class="wrrapper">
            <div class="main-menus flex-start">
              <span class="categories-icon"><i class="fa-solid fa-bars"></i></span>
              <div class="header-categories">
                <div class="categories-title">
                  <span class="cat-title">All Categories</span> 
                  <span class="down-icon"><i class="fa-solid fa-chevron-down"></i></span>
                </div>
                <div class="categories-menu">
                  @foreach ( $categories as $category )
                    <div class="category-item">
                      <a href="{{route('category',$category->slug)}}" class="flexing">
                        {{$category->category}}
                        <i class="fa-solid fa-chevron-right icon-menu-right"></i>
                      </a>
                      <div class="sub-categories">
                        <h3 class="sub-category-title">{{$category->category}}</h3>
                        @foreach ($category->SubCategory as $SubCategory)
                          <a href="{{route('category',[$category->slug,$SubCategory->slug])}}" class="sub-category-item flexing">{{$SubCategory->subcategory}}</a>
                        @endforeach
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="menus">
                <span class="menus-icon"><i class="fa-solid fa-bars"></i></span>
                <ul class="list-menus">
                  <li class="menu"><a href="/">Home</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="cart-hidden">
      <div class="cart-hidden-header flexing py-3 px-2">
        <div class="cart-hidden-close" id="close-cart"><i class="fa-solid fa-xmark"></i></div>
        <div class="cart-hidden-title">Shopping cart</div>
      </div>
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
                  <b style="color:red">Only left:</b> {{$cart->product->quantity}}
                @else
                  <b>Quantity:</b> {{$cart->product->quantity}}
              @endif
            </p>
            <p class="cart-hidden-price"><b>SubTotal:</b> {{$cart->product->price}}$</p>
          </div>
        </div>
      @endforeach
      </div>
    </div>
    <div class="product-overly">
      <i class="fa-solid fa-square-check"></i>
      <p class="message">Your product has been added successfully</p>
    </div>

    
    {{$slot}}

    <!-- Start footer -->
    <footer class="footer">
      <div class="wrrapper">
        <div class="footer-container">
          <div class="footer-section">
            <a href="/" class="logo-area"><img src="{{asset('images/icons/logo.png')}}"></a>
            <p class="logo-area-text">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati accusamus error quam pariatur amet fuga enim labore quae recusandae tempore.</p>
            <div class="footer-social-media">
              <h2 class="footer-title">Subscribe us</h2>
              <div class="social-media">
                <a href="#"><i class="fa-brands fa-facebook facebook"></i></a>
                <a href="#"><i class="fa-brands fa-twitter twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram instagram"></i></a>
                <a href="#"><i class="fa-brands fa-linkedin linkedin"></i></a>
                <a href="#"><i class="fa-brands fa-pinterest pinterest"></i></a>
              </div>
            </div>
          </div>
          <div class="footer-section">
            <h2 class="footer-title">Links</h2>
            <div class="footer-items">
              <a href="#" class="footer-item">Home</a>
              <a href="#" class="footer-item">Contact</a>
              <a href="#" class="footer-item">About</a>
              <a href="#" class="footer-item">Blog</a>
            </div>
          </div>
          <div class="footer-section">
            <h2 class="footer-title">Links</h2>
            <div class="footer-items">
              <a href="#" class="footer-item">Home</a>
              <a href="#" class="footer-item">Contact</a>
              <a href="#" class="footer-item">About</a>
              <a href="#" class="footer-item">Blog</a>
            </div>
          </div>
          <div class="footer-section">
            <h2 class="footer-title">Links</h2>
            <div class="footer-items">
              <a href="#" class="footer-item">Home</a>
              <a href="#" class="footer-item">Contact</a>
              <a href="#" class="footer-item">About</a>
              <a href="#" class="footer-item">Blog</a>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom">
        <p class="credit text-center">All rights &copy reserved by Mohammed Ameziane &#9829; <span class="credit-date"></span></p>
      </div>
    </footer>
    
    @livewireScripts
    <script src="{{asset('frontend/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/main.js')}}"></script>
    <script src="{{asset('frontend/assets/js/fontowsome.min.js')}}"></script>
  </body>
</html>