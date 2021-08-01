
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @foreach($bgimage as $bgimage)
    <title>RIZIZ Enterprise</title>
    @endforeach
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/fixedHeader.bootstrap4.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="frontend/fontawesome/css/fontawesome-all.css" rel="stylesheet">
    <link href="{{asset('frontend/css/fontello.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/owl.carousel.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/owl.theme.default.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/jquery-ui.css')}}" type="text/css" rel="stylesheet">
    <link href="{{asset('frontend/css/jquery.jConveyorTicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">    
    <link href="{{asset('frontend/css/issl_main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrapValidator.min.css')}}">
    <link href="{{asset('frontend/css/custom_style.css')}}" rel="stylesheet">
    <style>
        .bootstrap-iso .formden_header h2,
        .bootstrap-iso .formden_header p,
        .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}
        .bootstrap-iso form button,
        .bootstrap-iso form button:hover{color: white !important;}
        .asteriskField{color: red;}
        .dropdown-menu{
            font-size: 12px;
        }

        .title{
            background: #334274;
            border-radius: 5px;
            color:#fff;
            padding: 10px;
            text-align:center;
            }
        .img-circle{
            height:200px;
            width: 200px;
            border-radius:50%;
            padding-top:5px;
        }
        
        <!-- mobile view --->
        @media screen and (max-width: 480px)
        .header-logo {
            padding-top: 10px;
            text-align: center;
        }
        <!-- mobile view --->
        <!-- tab view --->
        @media (max-width: 575px)
        .header-logo {
            padding-top: 10px;
            text-align: center;
        }
        <!-- tab view --->
         
		#hero { background: url({{ URL::asset('frontend/images/'.$bgimage->image) }}) no-repeat center; background-size: cover; padding-bottom: 265px; padding-top: 175px; }

    </style>


        <![endif]-->
</head>

<body>



<!-- header-top -->
    <div class="header-top position-relative">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-2 d-xl-block d-lg-block d-md-block p-0 d-none575">
                    <div class="header-text d-flex justify-content-center position-relative">
                    </div>
                </div>
                <!--news_right-->
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-xs-8 col-9">
                    <div class="news_right">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="">
                                    <ul>
                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div><!--news_right-->
                </div>

                <!--header-border-right-->
                <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-xs-2 col-3 p-0">
                    <div class="header-border-right d-flex position-relative">
                        <nav class="navbar navbar-light justify-content-center">
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle welcome-text" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Enlisted <br> <span><i class="fa fa-angle-down"></i></span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($enlists as $enlist)
                                        <a class="dropdown-item" href="{{$enlist->link}}" target="_blank">{{$enlist->name}}</a>
                                    @endforeach
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div> <!--./header-border-right-->
                </div>

            </div>
        </div><!--/.container-->
    </div>
    <!--/.header-top -->

<!-- header -->
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-7 col-sm-6 col-6 tiny12">
                    <!-- header-logo -->
                    <div class="header-logo">
                    @foreach($logo as $logo)
                         <a href=""><img src="{{asset('frontend/images/'.$logo->image)}}" alt="Aircraft solution" style="width:90; height:90"></a>
                    @endforeach
                    </div>
                    <!-- /.header-logo -->
                </div>
                <div class="col-xl-6 col-lg-6 col-md-5 col-sm-6 col-6 tiny12">
                        <!-- navigations -->
                    <div id="navigation" class="float-left">
                        <ul style="">
                            <li class="active"><a href="">Home</a></li>
                            <li class=""><a href="#contact">About Us</a></li>
                            <li class=""><a href="#contact">Contact Us</a></li>

                        </ul>
                    </div>
                    <!-- /.navigations -->
                </div>
            </div>
        </div>
    </div>
    <!-- /.header -->

        

    <!-- hero-section -->
<div id="hero" class="hero-section position-relative fixed center center">
    <div class="container">
        @foreach($circleimages as $circleimage)
        <div class="row">
            <div class="offset-xl-1 col-xl-10 offset-lg-1 col-lg-10 col-md-12 col-sm-12 col-12">
                <!-- search-block -->
                <div class="">
                    <div class="text-center search-head">
                        <h1 class="search-head-title">RIZIZ Enterprise</h1>

                    </div> <!-- /.search-block -->
                    <!-- search-form -->
                    <div class="col-md-12 ">
                       <h3 class="title">{{$circleimage->slogan}}</h3>
                       <div class="row">

                       <div class="col-md-3 text-center">
                            <img alt="100x100" class="img-circle" src="{{asset('frontend/images/'. $circleimage->imageOne)}}" alt="">
                       </div>

                       <div class="col-md-3 text-center">
                             <img alt="100x100" class="img-circle" src="{{asset('frontend/images/'. $circleimage->imageTwo)}}" alt="">
                       </div>

                       <div class="col-md-3 text-center">
                             <img alt="100x100" class="img-circle" src="{{asset('frontend/images/'. $circleimage->imageThree)}}" alt="">
                       </div>

                       <div class="col-md-3 text-center">
                             <img alt="100x100" class="img-circle" src="{{asset('frontend/images/'. $circleimage->imageFour)}}" alt="">
                       </div>
                       
                       </div>
                    </div>

                    <!-- /.search-form -->
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- /.hero-section -->
<!-- footer-section -->
<div class="footer" id="contact">
    <div class="container">
    @foreach($footer as $footer)
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                <!-- footer-widget -->
                <div class="footer-widget">
                    <h3 class="widget-title">
                        We are
                    </h3>
                    <p class="mb10" style="line-height: 1.5;text-align: justify; ">{{$footer->weare}}</p>
                </div>
            </div>
            <!-- /.footer-widget -->

            <!-- footer-widget -->
            <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6 col-12">
                <div class="footer-widget" style="margin-left: 120px;">
                    <h3 class="widget-title">
                        <p>Contact Address</p>
                    </h3>
                    <p style="line-height: 1.5;text-align: justify;">{{$footer->address}}
                    </p>

                </div>
            </div>
            <!-- /.footer-widget -->
            
            <!-- footer-->
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="footer-widget">
                    <h3 class="widget-title">
                    RIZIZ Enterprise
                    </h3>
                    <ul class="listnone" >
                        <li  style="line-height: 1.5;text-align: justify; color:#FFD700">Contact us</li>
                        <li  style="line-height: 1.5;text-align: justify; color:#FFD700">Cell Phone: {{$footer->mobile}}</li>
                        <li  style="line-height: 1.5;text-align: justify; color:#FFD700">Email: {{$footer->email}}</li>
                        <li  style="line-height: 1.5;text-align: justify; color:#FFD700">Website:{{$footer->address}}</li>
                    </ul>
                </div>
            </div>
        <!-- footer ---->
        </div>
        @endforeach
    </div>
</div>

<div class="tiny-footer">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <p>© 2021 RIZIZ Enterprise. All Rights Reserved.</p>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 text-right f_powered">
                <p>Powered By <a href="{{route('index')}}" target="_blank"><strong>NC CONNECTIONS</strong></a></p>
            </div>
        </div>
    </div>
</div>
    


<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>
    <script src="{{asset('frontend/js/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('frontend/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('frontend/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('frontend/js/datatables.min.js')}}"></script>
    <script src="{{asset('frontend/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('frontend/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{asset('frontend/js/menumaker.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery-ui.js')}}"></script>
    <script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/js/fastclick.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.jConveyorTicker.min.js')}}"></script>
    <script src="{{asset('js/jquery.scrollUp.min.js')}}"></script>

    <script src="{{asset('frontend/js/custom-script.js')}}"></script>
    <script src="{{asset('frontend/js/return-to-top.js')}}"></script>

    <script rel="javascript" src="{{asset('frontend/js/bootstrap-datepicker.min.js')}}"></script>



</body>

</html>

