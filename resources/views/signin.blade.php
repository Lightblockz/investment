<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LightBlocks</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700i&display=swap" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #1c2835;
                color: #fff;
                font-family: 'Fira Sans', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            p.success-p-pay-signup {
                color: #fff !important;
                background: darkcyan !important;
                padding: 20px !important;
            }

            .signup-iblock.text-center {
                margin-top: 15px;
            }

            a.signin-signup {
                color: #fff;
                /* margin-top: 20px !important; */
            }

            img.img-responsive.outer-logo {
                width: 270px;
                margin-bottom: 20px;
            }

            .form-section {
                background: #fff;
                padding: 30px;
                border-radius: 4px;
                color: #37474f;
                box-shadow: 0 10px 30px 0 rgba(0,0,0,.15) !important;
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

            input.form-control {
                border: none !important;
                border-bottom: 1px solid #1c283547 !important;
                border-radius: 0px !important;
                opacity: 0.8;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            label {
                text-align: left !important;
                font-weight: 400;
            }

            a.signup-signin {
                color: #1c2835;
                text-decoration: none;
                font-weight: 600;
                font-size: 13px;
            }

            button.btn.btn-primary.btn-block {
                padding: 13px;
                font-size: 14px;
                font-weight: 600;
                background: #1c2835;
                border: 1px solid #1c2835;
            }

            .alert-danger {
                color: #a94442;
                background-color: #f2dede;
                border-color: #ebccd1;
                padding: 10px 0px;
            }

            .alert-danger ul {
                list-style: decimal;
            }

            small {
                color: red;
                font-size: 11px;
            }

            

            @media (max-width:768px) {
                img.img-responsive.outer-logo.center-block {
                    width: 200px;
                    margin-bottom: 20px;
                }

                .flex-center {
                    align-items: center;
                    display: block !important;
                    justify-content: center;
                    padding: 60px 15px;
                }
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                
                    <div class="container">
                        
                        <div class="row">

                            @if(session('success'))

                                <div class="col-md-offset-4 col-md-4 text-center">
   
                                    <p class="success-p-pay-signup">{{session('success')}}</p>

                                </div>  

                            @endif

                            <div class="col-md-offset-4 col-md-4">
                                <div class="logo-group">
                                    <img src="{{ asset('img/lightblockswhite.png') }}" class="img-responsive outer-logo center-block" alt="">
                                </div>
                            </div>

                        </div>
                        
                        <div class="row">

                            

                            <div class="col-md-offset-4 col-md-4">

                                <div class="form-section">

                                    <div class="form-holder">

                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form action="{{route('login.account')}}" method="post">

                                            @csrf

                                            <div class="form-group">
                                                <label for="">Email Address</label>
                                                <input type="email" name="email" class="form-control" id="">
                                            </div>

                                            
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" name="password" class="form-control" id="">
                                            </div>

                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary btn-block">Log in</button>
                                            </div>

                                            <div class="form-group">
                                                <a href="{{route('forgot.password')}}" class="signup-signin">Forgot password?</a>
                                            </div>

                                        </form>

                                    </div>

                                </div>

                                <div class="signup-iblock text-center">
                                    <a href="{{route('signup')}}" class="signin-signup">New to lightblocks? Sign up</a>
                                </div>

                            </div>

                        </div>

                    </div>

            </div>

        </div>
    </body>

</html>
