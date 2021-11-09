@extends('landing.template')

@section('isi')
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="{{asset('atlantis/assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['../assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('atlantis/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('atlantis/assets/css/atlantis.css')}}">
</head>

<body class="login justify-content-center">
    <div class="wrapper wrapper-login" style="padding-top: 90px;">
        <div class="justify-content-center container container-login animated fadeIn">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">{{ __('Login') }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row form-sub m-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="rememberme">
                                        <label class="custom-control-label" for="rememberme">Remember Me</label>
                                    </div>


                                    <a href="{{ route('password.request') }}" class="link float-right">Forget Password ?</a>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <div class="form-action mb-3">
                                        <button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
                                    </div>
                                    @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <span class="msg">Don't have an account yet ?</span>
                                    <a href="#" id="show-signup" class="link">Sign Up</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('atlantis/assets/js/core/jquery.3.2.1.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{asset('atlantis/assets/js/atlantis.min.js')}}"></script>
</body>

</html>
@endsection