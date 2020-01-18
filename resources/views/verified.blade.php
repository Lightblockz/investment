<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #37474f;
                color: #fff;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .form-section {
                background: #fff;
                padding: 30px;
                border-radius: 4px;
                color: #37474f;
            }
            
            h4 {
                text-align: center;
                margin: 0px 0px 20px 0px;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            label {
                text-align: left !important;
            }

            button.btn.btn-primary {
                padding: 13px 25px;
                font-size: 14px;
                font-weight: 600;
            }

            .alert-danger {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                padding: 10px 0px;
            }


            h4{
                line-height: 25px;
            }

            .alert-danger ul {
                list-style: decimal;
            }

            small {
                color: red;
                font-size: 11px;
            }

            h2.verify-title.text-center {
                margin-bottom: 20px;
                font-weight: 600;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                
                    <div class="container">
                        
                        <div class="row">

                            <div class="col-md-offset-3 col-md-6">

                                <h2 class="verify-title text-center">Email Verification Successful</h2>

                                <div class="form-section">

                                   <h4>Thanks for completing your registration.</h4>

                                    <div class="form-group text-center">
                                        <a href="{{route('dashboard')}}" class="btn btn-primary">Go to dashboard</a>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

            </div>

        </div>
    </body>
</html>