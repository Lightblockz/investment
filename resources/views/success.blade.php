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

            .success-header{
                font-size: 20px;
                margin-bottom: 20px !important;
            }

            .btn-primary {
                color: #fff;
                background-color: #1c2835;
                border-color: #1c2835;
                padding: 10px 30px;
                font-size: 16px;
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

            .verify-title.text-center {
                font-size: 25px;
                margin-bottom: 25px;
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
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            <div class="content">
                
                    <div class="container">
                        
                        <div class="row">

                            <div class="col-md-offset-3 col-md-6 success-body">

                                <h2 class="verify-title text-center">Verify your Email Address</h2>

                                <div class="form-section">

                                   <h3 class="success-header"> <strong>Welcome onboard {{$name}} !</strong> </h3>

                                   <h4>Your account has been successfully created</h4>

                                    <p>An email has been sent to {{$email}}, Kindly follow the instructions in the email to complete your registration.</p>

                                    <p> <strong>Didn't receive the email?</strong> </p>

                                    <ul>
                                        <li>Make sure your email address is entered correctly.</li>
                                        <li>Check your Spam or Junk folders</li>
                                    </ul>

                                    <div class="form-group text-center">
                                        <a href="{{route('signin')}}" class="btn btn-primary">Log in</a>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

            </div>

        </div>
    </body>
</html>
