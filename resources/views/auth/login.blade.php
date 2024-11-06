<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div class="row">
        <div class="col-lg-12">
            <div class="container-login">
                <main class="form-signin">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img class="mb-4" src="images/logo.png" alt="" width="270" height="80">

                        <div class="form-floating">
                            <input id="email" type="email" class="form-control" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>
                            <label for="email">Email</label>
                        </div>
                        <div class="form-floating">
                            <input id="password" type="password" class="form-control" name="password" required
                                autocomplete="current-password">
                            <label for="password">Contraseña</label>
                        </div>

                        @if ($errors->has('email') || $errors->has('password'))
                            <div class="alert alert-danger">
                                <strong>{{ $errors->first('email') ?: $errors->first('password') }}</strong>
                            </div>
                        @endif

                        <button class="w-100 btn btn-lg btn-base-dv" type="submit">Iniciar Sesion</button>
                        <p class="mt-5 mb-3 text-muted">© 2024</p>
                    </form>
                </main>
            </div>
        </div>
    </div>
</body>

</html>
