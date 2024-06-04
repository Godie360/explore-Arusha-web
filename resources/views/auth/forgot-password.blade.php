<x-web-layout>
    @push('styles')
    @endpush
    @push('scripts')
    @endpush
    <div class="breadcrumb-bar">
        <div class="container">
            <div class="row align-items-center text-center">
                <div class="col-md-12 col-12">
                    <h2 class="breadcrumb-title">Forgot Password</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('web.index') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Forgot Password</li>
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
                    <div class="login-wrap password-form">
                        <div class="login-header">
                            <h3>Forgot Password</h3>

                            @if (session('status'))
                                <div class="mb-4 font-medium text-sm text-green-600">
                                    {{ session('status') }}
                                </div>
                            @else
                                <p>Enter your email and we will send you a link to reset your password.</p>
                            @endif
                        </div>

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-set group-img">
                                <div class="group-img">
                                    <i class="feather-mail"></i>
                                    <input type="text" class="form-control  @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary w-100 login-btn" type="submit">Submit</button>
                        </form>
                        <a href="{{ route('login') }}" class="back-home"><i
                                class="fas fa-regular fa-arrow-left me-1"></i>
                            Back to Login</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-web-layout>
