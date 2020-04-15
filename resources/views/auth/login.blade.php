<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rocket Laundry | Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->

    <link rel="stylesheet" href="{{ asset('vendor/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <style>

    </style>
</head>

<body>
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="username" placeholder="Username" required autofocus/>

                            @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-input{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="password" placeholder="Password" autocomplete="off"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>

                            @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-submit">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/js/main.js') }}"></script>
</body>

</html>
