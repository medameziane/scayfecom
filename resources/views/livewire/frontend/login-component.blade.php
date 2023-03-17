<!-- Start login -->
<div class="wrrapper">
    <section class="login-section">
    <div class="login-form">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-title">Login</div>
            <div class="form-content">

                <!-- Email Address -->
                <div class="form-section">
                <label for="f_email" class="f-label">Email</label>
                <input 
                    type="email" 
                    id="f_email" 
                    placeholder="Email address" 
                    class="f-input" 
                    name="email" 
                    value="{{old('email')}}" 
                    required autofocus autocomplete="email"/>
                </div>

                <!-- Password -->
                <div class="form-section">
                <label for="f_password" class="f-label">Password</label>
                <input 
                    type="password" 
                    id="f_password" 
                    placeholder="Enter password" 
                    class="f-input" 
                    name="password"
                    required autocomplete="current-password"/>
                </div>

                <!-- form items -->
                <div class="form-items flexing mb-3 mt-1">
                <div class="form-remember">
                    <input type="checkbox" id="remember" name="remember"/> 
                    <label for="remember">Remember me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="form-link">Forgot your password?</a>
                @endif
                </div>
                
                <div class="form-actions flexing">
                <button type="submit" class="form-success btn-action mx-0">Login</button>
                <a href="{{ route('register') }}" class="form-link">Don't have account?</a>
                </div>
            </div>
        </form>
    </div>
    <div class="login-image">
        <img src="{{asset('frontend/assets/imgs/icons/login.png')}}"/>
    </div>
    </section>
</div>