<!-- Start Register -->
<div class="wrrapper">
    <section class="login-section">
    <div class="login-form">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="form-title mb-3">Create new account</div>
            <div class="form-content">

                <!-- Full name -->
                <div class="form-section">
                    <label for="full_name" class="f-label">Full name</label>
                    <input type="text" id="full_name" placeholder="Enter Your full name" name="name" value="{{old('name')}}" class="f-input" required autofocus autocomplete="name" />
                </div>

                <!-- Email -->
                <div class="form-section">
                    <label for="f_email" class="f-label">Email address</label>
                    <input type="email" 
                            id="f_email" 
                            placeholder="Email address" 
                            name="email" 
                            value="{{old('email')}}" 
                            required autocomplete="email" 
                            class="f-input"/>
                </div>

                <!-- username -->
                <div class="form-section">
                    <label for="username" class="f-label">Username</label>
                    <input type="text" 
                            id="username" 
                            placeholder="Enter username" 
                            name="username"
                            value="{{old('username')}}"
                            required autocomplete="username"
                            class="f-input"/>
                </div>

                <!-- Password -->
                <div class="form-section">
                    <label for="f_password" class="f-label">Password</label>
                    <input type="password" 
                            id="f_password" 
                            placeholder="Enter password" 
                            name="password" 
                            required autocomplete="new-password"
                            class="f-input"/>
                </div>

                <!-- Confirm Password -->
                <div class="form-section">
                    <label for="password_confirmation" class="f-label">Confirm Password</label>
                    <input type="password" 
                            id="password_confirmation" 
                            placeholder="Confirm password" 
                            name="password_confirmation" 
                            required autocomplete="new-password"
                            class="f-input"/>
                </div>

                <!-- form items -->
                <div class="form-actions flexing">
                    <button type="submit" class="form-success btn-action mx-0">Sign up</div>
                    <a href="{{route('login')}}" class="form-link">Already registered?</a>
                </div>
            </div>
        </form>

    </div>
    <div class="login-image">
        <img src="{{asset('frontend/assets/imgs/icons/login.png')}}"/>
    </div>
    </section>
</div>
