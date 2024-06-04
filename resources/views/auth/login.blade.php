<x-web-layout>
    @push('styles')
    @endpush
    @push('scripts')
    @endpush
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Login</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Login
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="login-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-5 mx-auto">
                    <div class="login-wrap">
                        <div class="login-header">
                            <h3>Welcome Back</h3>
                            <p>Please Enter your Details</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-set group-img">
                                <div class="group-img">
                                    <i class="feather-mail"></i>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" placeholder="Email Address"
                                        required />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-set">
                                <div class="pass-group group-img">
                                    <i class="feather-lock"></i>
                                    <input type="password" class="form-control pass-input" name="password"
                                        value="{{ old('password') }}" placeholder="Password" required />
                                    <span class="toggle-password feather-eye"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <label class="custom_check">
                                        <input type="checkbox" name="remember" class="remember" />
                                        <span class="checkmark"></span>Remember Me
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-md-6 col-sm-6">
                                        <div class="text-md-end">
                                            <a class="forgot-link" href="{{ route('password.request') }}">Forgot
                                                password?</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <button class="btn btn-primary w-100 login-btn" type="submit">
                                Sign in
                            </button>
                            @if (Route::has('register'))
                                <div class="register-link text-center">
                                    <p>
                                        No account yet?
                                        <a class="forgot-link"
                                            href="{{ route('web.vendor.registration.index') }}">Signup</a>
                                    </p>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-web-layout>
