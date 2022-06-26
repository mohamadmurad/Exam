<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="card ">
        <div class="card-header pb-0 text-start">
            <h4 class="font-weight-bolder">Sign In</h4>
            <p class="mb-0">Enter your email and password to sign in</p>
        </div>
        <div class="card-body">
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            <form role="form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <input type="email" class="form-control form-control-lg" placeholder="Email" name="email" value="{{old('email')}}" aria-label="Email" required >
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control form-control-lg" placeholder="Password"  name="password" aria-label="Password" required autocomplete="current-password">
                </div>
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 mt-4 mb-0">Sign in</button>
                </div>
            </form>
        </div>
{{--        <div class="card-footer text-center pt-0 px-lg-2 px-1">--}}
{{--            <p class="mb-4 text-sm mx-auto">--}}
{{--                Don't have an account?--}}
{{--                <a href="{{route('register')}}" class="text-primary text-gradient font-weight-bold">Sign up</a>--}}
{{--            </p>--}}
{{--        </div>--}}
    </div>



</x-guest-layout>
