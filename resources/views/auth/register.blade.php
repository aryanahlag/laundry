<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rocket Laundry | Daftar</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('vendor/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('vendor/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"></head>

<body>
    <div class="main">

        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="row">
                        <div class="col-md-12" style="text-align:center;">
                            <blockquote class="blockquote text-center">
                                <img src="{{ asset('img/rocket.png') }}" width="60px" height="60px" alt="rocketicon">
                                <p class="h2">Rocket Laundry</p>
                              </blockquote>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-md-12">
                        <form method="POST" action="{{ route('postRegister') }}">
                            @csrf
                            <h2 class="form-title">Daftar Akun</h2>
                            <div class="form-group">
                                <input id="name" type="text" class="form-input{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" placeholder="Nama" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" id="username" placeholder="Username" required/>

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
                                <button type="submit" class="form-submit">Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/js/main.js') }}"></script>
</body>
</html>
