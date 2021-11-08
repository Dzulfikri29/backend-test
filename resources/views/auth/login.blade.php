<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="SKA GROUP INDONESIA">
    <meta name="keywords" content="Trucking Company">
    <meta name="author" content="SKA GROUP INDONESIA">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="SKA GROUP INDONESIA">
    <meta itemprop="description" content="SKA GROUP INDONESIA">
    <meta itemprop="image" content="">

    <!-- Facebook Meta Tags -->
    <meta property="og:url" content="{{ url('') }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Login">
    <meta property="og:description" content="SKA GROUP INDONESIA">
    <meta property="og:image" content="{{ asset('app-assets/images/logo/logo.png') }}">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="{{ asset('app-assets/images/logo/logo.png') }}">
    <meta name="twitter:title" content="Login">
    <meta name="twitter:description" content="SKA GROUP INDONESIA">
    <meta name="twitter:image" content="{{ asset('app-assets/images/logo/logo.png') }}">

    <title>Login</title>
    <link rel="apple-touch-icon" href="{{ asset('app-assets/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app-assets/images/logo/logo.png') }}">
    <link
        href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
        rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/vendors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/icheck.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/icheck/custom.css') }}">
    <!-- END VENDOR CSS-->
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/app.css') }}">
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/login-register.css') }}">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/global.css') }}">
    <!-- END Custom CSS-->
</head>

<body class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page" data-open="click"
    data-menu="vertical-menu" data-col="1-column" onload="hideLoader()">
    
    <div class="app-content content overflow-hidden">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-md-4 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <div class="p-1">
                                            <img src="{{ asset('app-assets/images/logo/logo-text.png') }}"
                                                alt="branding logo" style="width: 200px">
                                        </div>
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                        <span>Login dengan akun anda</span>
                                    </h6>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group position-relative mb-0">
                                                <input id="email" type="email"
                                                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}" required
                                                    autocomplete="email" autofocus placeholder="Alamat email">
                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group position-relative mt-2">
                                                <div class="input-group">
                                                    <input id="password" type="password"
                                                        class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password"
                                                        placeholder="Masukkan password">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" onclick="showPassword()">
                                                            <i id="icon-eye" class="ft-eye"></i>
                                                        </span>
                                                    </div>
                                                </div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left">
                                                    <div class="skin skin-square">
                                                        <fieldset>
                                                            <input type="checkbox" type="checkbox" name="remember"
                                                                id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                            <label for="remember">Remember Me</label>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-12 text-center text-sm-right"><a
                                                        href="recover-password.html" class="card-link">Forgot
                                                        Password?</a></div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-lg btn-block"><i
                                                    class="ft-unlock"></i>
                                                {{ __('Login') }}</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="">
                                        <p class="float-sm-left text-center m-0"><a href="recover-password.html"
                                                class="card-link">Recover password</a></p>
                                        <p class="float-sm-right text-center m-0">New to Stack? <a
                                                href="register-simple.html" class="card-link">Sign Up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- BEGIN VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('app-assets/vendors/js/forms/icheck/icheck.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/vendors/js/forms/validation/jqBootstrapValidation.js') }}" type="text/javascript">
    </script>
    <script src="{{ asset('app-assets/vendors/js/forms/select/select2.full.min.js') }}" type="text/javascript">
    </script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN STACK JS-->
    <script src="{{ asset('app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/core/app.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/customizer.js') }}" type="text/javascript"></script>
    <!-- END STACK JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('app-assets/js/global.js') }}" type="text/javascript"></script>
    <script src="{{ asset('app-assets/js/scripts/forms/form-login-register.js') }}" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
    <script>
        function showPassword() {
            let state = $('#password').attr('type');
            if (state == 'password') {
                $('#password').attr('type', 'text');
                $('#icon-eye').removeClass('ft-eye').addClass('ft-eye-off');
            } else {
                $('#password').attr('type', 'password');
                $('#icon-eye').removeClass('ft-eye-off').addClass('ft-eye');
            }
        }
    </script>
</body>

</html>
