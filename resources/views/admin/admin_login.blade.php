<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Zono admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Zono admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{ asset('admin/assets/images/favicon.png') }}" type="image/x-icon">
    <title>Admin Dashboard</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <!-- CSS Assets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/vendors/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/responsive.css') }}">
</head>
<body>
    <div class="container-fluid p-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="login-card login-dark">
                    <div>
                       <!--  <div class="logo mb-4">
                            <a href="#"><img class="img-fluid for-light" src="{{ asset('assets/images/logo/logo.png') }}" alt="login page"></a>
                        </div> -->
                        <div class="login-main">
                            <form class="theme-form" action="{{ route('admin.login.submit') }}" method="POST">
                                @csrf
                                <h3>Sign in to your account</h3>
                                <p>Enter your email & password to log in</p>

                                <div class="form-group">
                                    <label for="email" class="col-form-label">Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" required placeholder="yourname@example.com">
                                </div>

                                <div class="form-group">
                                    <label for="password" class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input type="password" class="form-control" name="password" id="password" required placeholder="********">
                                    </div>
                                </div>

                                <div class="text-end mt-3">
                                    <button type="submit" class="btn btn-primary btn-block w-100">Sign in</button>
                                </div>

                                @if($errors->any())
                                    <div class="alert alert-danger mt-3">{{ $errors->first() }}</div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS Assets -->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/icons/feather-icon/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/script.js') }}"></script>
</body>
</html>
