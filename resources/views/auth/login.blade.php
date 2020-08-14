<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin panel</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/signin.css')}}" rel="stylesheet">

</head>

<body class="text-center">

<form class="form-signin" method="POST" action="{{ route('login') }}">
    @csrf
    <h1 class="h3 mb-3 font-weight-normal">Login</h1>
    <label for="email" class="sr-only">{{ __('E-Mail Address') }}</label>
    <input type="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

    @error('email')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <label for="password" class="sr-only">Password</label>
    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

    @error('password')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
    <div class="checkbox mb-3">
        <label class="form-check-label" for="remember">
            {{ __('Remember Me') }}
        </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">{{ __('Login') }}</button>
    @if (Route::has('password.request'))
        <a class="btn btn-link" href="{{ route('password.request') }}">
            {{ __('Forgot Your Password?') }}
        </a>
    @endif
</form>
</body>
</html>
