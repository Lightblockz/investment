<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>TITLE</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<title>Lightblocks</title>
	
	<!-- Font -->
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700%7CPoppins:400,500" rel="stylesheet">
	
	
	{{-- <link href="common-css/ionicons.css" rel="stylesheet">
	
	
	<link rel="stylesheet" href="common-css/jquery.classycountdown.css" />
		
	<link href="04-comming-soon/css/styles.css" rel="stylesheet">
	
    <link href="04-comming-soon/css/responsive.css" rel="stylesheet"> --}}
    
    <style>
        
        /*
        ====================================================

        * 	[Master Stylesheet]
            
            Theme Name :  
            Version    :  
            Author     :  
            Author URI :  

        ====================================================

            TOC
            
            1. PRIMARY STYLES
            2. COMMONS FOR PAGE DESIGN
                JQUERY LIGHT BOX
            3. LEFT SECTION
            4. RIGHT SECTION
            
        ====================================================

        /* ---------------------------------
        1. PRIMARY STYLES
        --------------------------------- */

        html{ font-size: 100%; height: 100%; width: 100%; overflow-x: hidden; margin: 0px;  padding: 0px; touch-action: manipulation; }


        body{ font-size: 16px; font-family: 'Open Sans', sans-serif; width: 100%; height: 100%; margin: 0; font-weight: 400;
            -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; word-wrap: break-word; overflow-x: hidden; 
            color: #333; }

        h1, h2, h3, h4, h5, h6, p, a, ul, span, li, img, inpot, button{ margin: 0; padding: 0; }

        h1,h2,h3,h4,h5,h6{ line-height: 1.5; font-weight: inherit; }

        h1,h2,h3{ font-family: 'Poppins', sans-serif; }

        p{ line-height: 1.6; font-size: 1.05em; font-weight: 400; color: #555; }

        h1{ font-size: 3.5em; line-height: 1; }
        h2{ font-size: 3em; line-height: 1.1; }
        h3{ font-size: 2.5em; }
        h4{ font-size: 1.5em; }
        h5{ font-size: 1.2em; }
        h6{ font-size: .9em; letter-spacing: 1px; }

        a, button{ display: inline-block; text-decoration: none; color: inherit; transition: all .3s; line-height: 1; }

        a:focus, a:active, a:hover,
        button:focus, button:active, button:hover,
        a b.light-color:hover{ text-decoration: none; color: #E45F74; }

        b{ font-weight: 500; }

        img{ width: 100%; }

        li{ list-style: none; display: inline-block; }

        span{ display: inline-block; }

        button{ outline: 0; border: 0; background: none; cursor: pointer; }

        b.light-color{ color: #444; }

        .icon{ font-size: 1.1em; display: inline-block; line-height: inherit; }

        [class^="icon-"]:before, [class*=" icon-"]:before{ line-height: inherit; }

        html {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        *,
        *::before,
        *::after {
            -webkit-box-sizing: inherit;
            box-sizing: inherit;
        }



        /* ---------------------------------
        2. COMMONS FOR PAGE DESIGN
        --------------------------------- */

        .center-text{ text-align: center; } 

        .display-table{ display: table; height: 100%; width: 100%; }

        .display-table-cell{ display: table-cell; vertical-align: middle; }


        ::-webkit-input-placeholder { font-size: .9em; letter-spacing: 1px; }

        ::-moz-placeholder { font-size: .9em; letter-spacing: 1px; }

        :-ms-input-placeholder { font-size: .9em; letter-spacing: 1px; }

        :-moz-placeholder { font-size: .9em; letter-spacing: 1px; }


        .full-height{ height: 100%; }

        .position-static{ position: static; }

        .font-white{ color: #fff; }

        .main-area{ position: relative; height: 100vh; background: #0C0D0F; color: #fff; }


        /* ---------------------------------
        3. LEFT SECTION
        --------------------------------- */

        .left-section{ position: absolute; top: 0; bottom: 0; left: 0; width: 50%; background-size: cover; padding: 200px 30px 200px 60px; }


        #normal-countdown{ text-align: center; }

        #normal-countdown .time-sec{ position: relative; display: inline-block; margin: 2.5%; height: 120px; width: 120px; 
            border-radius: 100px; background: #fff; box-shadow: 0px 0px 0px 5px rgba(255,255,255,.4); color: #F84982; }

        #normal-countdown .time-sec .main-time{ font-weight: 500; line-height: 100px; }

        #normal-countdown .time-sec span{ position: absolute; bottom: 25px; left: 50%; transform: translateX(-50%); }



        /* ---------------------------------
        4. RIGHT SECTION
        --------------------------------- */

        .right-section{ float: right; width: 50%; position: relative; padding: 0 60px; }

        .right-section .logo{ position: absolute; top: 40px; height: 30px; }

        .right-section .logo img{ height: 100%; width: auto; } 


        .right-section .main-content{ padding: 40px 40px 40px 0; }

        .main-content .title{ margin-bottom: 15px; color: #ff8e00;}

        .main-content .desc{ color: #eee; }

        .main-content .email-input-area{ margin: 40px 0 20px; position: relative; width: 400px; height: 47px; }

        .main-content .email-input-area .email-input{ width: 100%; position: absolute; top: 0; bottom: 0; left: 0; 
            border-radius: 2px; border: 0; outline: 0; padding: 0 140px 0 25px; transition: all .2s; background: #F1F2F3; 
            box-shadow: inset 0 0 1px rgba(0,0,0,.1); border: 1px solid transparent; }

        .main-content .email-input-area .email-input:focus{ border-color: #f89fbc; }


        .main-content .email-input-area .submit-btn{ width: 120px; text-align: center; position: absolute; top: 0; bottom: 0; 
            right: 0; font-size: .9em; outline: 0; border-radius: 0 2px 2px 0; transition: all .3s; background: #ff8e00; color: #fff; }

        .main-content .email-input-area .submit-btn:hover{ background: #e40b52; }


        .main-content .post-desc{ color: #999; }


        .right-section .footer-icons{ position: absolute; bottom: 30px;}

        .right-section .footer-icons > li > a{ display: inline-block; font-size: 1.07em; padding: 0 0px; }

        .right-section .footer-icons > li:first-child{ margin-right: 10px; }

        .right-section .footer-icons > li > a > i{ display: inline-block; height: 35px; line-height: 33px; 
            transition: all .2s; border-radius: 40px; text-align: center; width: 35px; }

        .right-section .footer-icons > li > a:hover > i{ border: 1px solid; }

        .right-section .footer-icons > li > a > i[class*="facebook"]{ color: #2A61D6; border-color: #2A61D6; }
        .right-section .footer-icons > li > a > i[class*="twitter"]{ color: #3AA4F8; border-color: #3AA4F8; }
        .right-section .footer-icons > li > a > i[class*="google"]{ color: #F43846; border-color: #F43846; }
        .right-section .footer-icons > li > a > i[class*="instagram"]{ color: #8F614A; border-color: #8F614A; }
        .right-section .footer-icons > li > a > i[class*="pinterest"]{ color: #E1C013; border-color: #E1C013; }


    </style>
    
    <style>
        

        /* Screens Resolution : 992px
        -------------------------------------------------------------------------- */
        @media only screen and (max-width: 1200px) {
            
            /* ---------------------------------
            4. RIGHT SECTION
            --------------------------------- */

            .date-countdown{ width: 100%; }
            
        }

        /* Screens Resolution : 992px
        -------------------------------------------------------------------------- */
        @media only screen and (max-width: 992px) {
            
            /* ---------------------------------
            1. PRIMARY STYLES
            --------------------------------- */
            
            .main-area{ position: relative; height: 200vh; }


            /* ---------------------------------
            3. RIGHT SECTION
            --------------------------------- */

            .right-section{ float: none; width: 100%; height: 50%; }
            
            .right-section .main-content{ padding: 40px 0; }
            
            .main-content .email-input-area{ width: 100%; }
            
            .main-content .email-input-area .email-input{ padding: 0 115px 0 20px; }
            
            .main-content .email-input-area .submit-btn{ width: 80px; } 
            
            .right-section .footer-icons > li > a > i{ height: 30px; line-height: 28px; width: 30px; }
            
            
            /* ---------------------------------
            4. LEFT SECTION
            --------------------------------- */

                .left-section {
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    left: 0;
                    width: 50%;
                    background-size: cover;
                    padding: 40px;

                }

                img.img-responsive.outer-logo.center-block {
                    width: 150px;
                }


            .date-countdown{ width: 100%; }
            
            .date-countdown .time_circles > div > h4{ font-size: .7em!important; }

        }


        /* Screens Resolution : 767px
        -------------------------------------------------------------------------- */
        @media only screen and (max-width: 767px) {
            
            /* ---------------------------------
            1. PRIMARY STYLES
            --------------------------------- */

            p{ line-height: 1.4; }

            h1{ font-size: 2.8em; line-height: 1; }
            h2{ font-size: 2.2em; line-height: 1.1; }
            h3{ font-size: 1.8em; }
                
            
            
        }

        /* Screens Resolution : 479px
        -------------------------------------------------------------------------- */
        @media only screen and (max-width: 479px) {

            /* ---------------------------------
            1. PRIMARY STYLES
            --------------------------------- */

            body{ font-size: 13px; }
            

            /* ---------------------------------
            4. REMAINING TIME
            --------------------------------- */

            #normal-countdown .time-sec{ height: 100px; width: 100px; margin: 5%; }
            
            #normal-countdown .time-sec .main-time{ line-height: 80px; }
            
            
            /* ---------------------------------
            4. RIGHT SECTION
            --------------------------------- */

            .right-section{ padding: 0 30px; }

        }

        /* Screens Resolution : 359px
        -------------------------------------------------------------------------- */
        @media only screen and (max-width: 359px) {
            
            
        }

        /* Screens Resolution : 290px
        -------------------------------------------------------------------------- */
        @media only screen and (max-width: 290px) {
            
            
        }
    </style>

</head>
<body>
	
	<div class="main-area">
		
		<section class="left-section">
		
            <img src="{{ asset('img/lightblockswhite.png') }}" class="img-responsive outer-logo center-block" alt="">
            
		</section><!-- left-section -->
		
		
		<section class="right-section full-height">
			
			<div class="display-table">
				<div class="display-table-cell">
					<div class="main-content">

                        @if (!($errors->any()) && !(session('success')))

                        <h1 class="title"><b>Something is cooking!</b></h1>
						<p class="desc">We are getting lightblocks dashboard ready for you to start earning your profits.</p>

                        @endif
						



                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if(session('success'))
                            <h4>{{session('success')}}</h4>
                        @endif

						<div class="email-input-area">
                            <form action={{route('coming')}} method="post">
                                @csrf
								<input class="email-input" name="email" type="text" placeholder="Enter your email"/>
								<button class="submit-btn" name="submit" type="submit"><b>NOTIFY ME</b></button>
							</form>
						</div><!-- email-input-area -->
						
						<p class="post-desc">Provide your email address to be notified when we go live.</p>
					</div><!-- main-content -->
				</div><!-- display-table-cell -->
			</div><!-- display-table -->
			
		
		</section><!-- right-section -->
		
	</div><!-- main-area -->
	
    <!-- SCIPTS -->
    
    <script>
        
    </script>
	
	{{-- <script src="common-js/jquery-3.1.1.min.js"></script>
	
	<script src="common-js/jquery.countdown.min.js"></script>
	
	<script src="common-js/scripts.js"></script> --}}
	
</body>
</html>