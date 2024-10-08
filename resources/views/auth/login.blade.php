<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LogIn</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{ asset('colorlib-regform-15/fonts/material-icon/css/material-design-iconic-font.min.css') }}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{ asset('colorlib-regform-15/css/style.css') }}">
</head>
<body>

    <div class="main">
        <div class="container">
            <div class="signup-content">
                <div class="signup-img">
                    <img src="{{ asset('colorlib-regform-15/images/signup-img.jpg') }}" alt="">
                </div>
                <div class="signup-form">
                    <form method="POST" class="register-form" id="register-form" action="{{ route('login') }}">
                        @csrf
                        <h2>Login Form</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="email">Email :</label>
                                <input type="email" name="email" id="email" />
                            </div>
                            <div class="form-group">
                                <label for="password">Password :</label>
                                <input type="password" name="password" id="password" required/>
                            </div>
                        </div>


                        <div class="form-submit">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" style="margin-right: 10px" href="{{ route('register') }}">
                                {{ __("Don't have account?") }}
                            </a>
                            <button class="submit" name="submit" id="submit" >
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="{{ asset('colorlib-regform-15/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('colorlib-regform-15/js/main.js') }}"></script>
</body>
</html>
