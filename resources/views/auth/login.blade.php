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
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
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
                                <footer class="blockquote-footer">AryaCreations <cite title="Source Title">2020</cite></footer>
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
    {{-- <script src="{{asset('assets/bootstrap/js/bootstrap.bundle.min.js')}}"></script> --}}
    {{-- <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
     --}}
     <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
