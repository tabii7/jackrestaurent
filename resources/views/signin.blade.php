@extends('shoplayout')

@section('content')  

    <!-- page head section starts -->
    <section class="page-head-section" style="
    background-color: rgb(43, 43, 43);
">
        <div class="container page-heading">
            <h2 class="h3 mb-3 text-white text-center">Login</h2>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-star">
                    <li class="breadcrumb-item">
                        <a href="index.html"><i class="ri-home-line"></i>Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- page head section end -->

    <!-- signin page start -->
    <section class="login-hero-section section-b-space">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 m-auto">
                <div class="login-data">
                    <form class="auth-form" method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2>Sign in</h2>
                        <h5>
                            or
                            <a href="{{ route('signup') }}"><span class="theme-color">create an account</span></a>
                        </h5>
                        <div class="form-input">
                            <input type="email" name="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                            <i class="ri-mail-line"></i>
                        </div>
                        <div class="form-input">
                            <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                            <i class="ri-lock-password-line"></i>
                        </div>
                        <button type="submit" class="btn theme-btn submit-btn w-100 rounded-2">CONTINUE</button>
                        <p class="fw-normal content-color">
                            By creating an account, I accept the
                            <span class="fw-semibold">Terms & Conditions & Privacy Policy</span>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- signin page end -->
@endsection