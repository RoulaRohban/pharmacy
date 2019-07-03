<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Home | Pharmacy++</title>
  <link href="css1/bootstrap.min.css" rel="stylesheet">
  <link href="css1/font-awesome.min.css" rel="stylesheet">
  <link href="css1/prettyPhoto.css" rel="stylesheet">
  <link href="css1/price-range.css" rel="stylesheet">
  <link href="css1/animate.css" rel="stylesheet">
  <link href="css1/main.css" rel="stylesheet">
  <link href="css1/responsive.css" rel="stylesheet">
  <link rel="shortcut icon" href="images/ico/favicon.ico">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
<header id="header"><!--header-->
  <div class="header_top"><!--header_top-->
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="social-icons " class="nav nav-pills">
            <ul class="nav navbar-nav">
              <li><a href="https://www.facebook.com/basema.rrm"><i class="fa fa-facebook"></i></a></li>

            </ul>


            <ul class="nav nav-pills">
              <li><a href="#"><i class="fa fa-phone"></i> 014-2238303</a></li>
              <li><a href="#"><i class="fa fa-envelope"></i> pharmacy++@hotmail.com</a></li>
            </ul>

          </div>

        </div>

      </div>
    </div>
  </div><!--/header_top-->

  <div class="header-middle"><!--header-middle-->
    <div class="container">
      <div class="row">
        <div class="col-sm-9">


          <div class="mainmenu pull-left">

            <div class="logo pull-left">
              <a href="welcomm"><img src="images/logoo.jpg" height="150" width="150"/></a>
            </div>


            <ul class="nav navbar-nav collapse navbar-collapse">
              <li><a href="welcomm" class="active">Home</a></li>
              <li class="dropdown">
                @if(\Illuminate\Support\Facades\Auth::check())
                  <a disabled>{{ auth()->user()->name }}</a>
                @else
                  <a href="Login">login</a>
                @endif

              </li>


              <li><a href="contact_us">Contact us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-3">

        </div>
      </div>
    </div>
  </div><!--/header-bottom-->
  </div><!--/header-middle-->


</header><!--/header-->

<section id="slider"><!--slider-->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div id="slider-carousel" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
            <li data-target="#slider-carousel" data-slide-to="1"></li>
            <li data-target="#slider-carousel" data-slide-to="2"></li>
          </ol>

          <div class="carousel-inner">
            <div class="item active">
              <div class="col-sm-6">
                <h1>Pharmacy++</h1>
                <h2>TRUST & SAFETY</h2>
                <h3>YOUR HEALTH IS OUR PRIORITY</h3>
                <p>SERVICE TO OUR PATIENTS IS OUR NUMBER ONE PRIORITY</p>

              </div>
              <div class="col-sm-6">
                <img src="images/Cold_&_Flu.jpg" class="girl img-responsive" alt=""/>

              </div>
            </div>
            <div class="item">
              <div class="col-sm-6">
                <h1>Pharmacy++</h1>
                <h2>TRUST & SAFETY</h2>
                <h3>YOUR HEALTH IS OUR PRIORITY</h3>
                <p>SERVICE TO OUR PATIENTS IS OUR NUMBER ONE PRIORITY</p>
              </div>
              <div class="col-sm-6">
                <img src="images/panadol.jpg" class="girl img-responsive" alt=""/>

              </div>
            </div>

            <div class="item">
              <div class="col-sm-6">
                <h1>Pharmacy++</h1>
                <h2>TRUST & SAFETY</h2>
                <h3>YOUR HEALTH IS OUR PRIORITY</h3>
                <p>SERVICE TO OUR PATIENTS IS OUR NUMBER ONE PRIORITY</p>
              </div>
              <div class="col-sm-6">
                <img src="images/cold.jpg" class="girl img-responsive" alt=""/>

              </div>
            </div>

          </div>

          <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
            <i class="fa fa-angle-left"></i>
          </a>
          <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
            <i class="fa fa-angle-right"></i>
          </a>
        </div>

      </div>
    </div>
  </div>
</section><!--/slider-->

@yield('content')
<br>
<br>
<br>
<br>

<footer id="footer"><!--Footer-->
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <div class="companyinfo">
            <h2>Pharmacy++</h2>
            <p>Basema Pharmacy++</p>
            <p>Syria </p>
            <p>Mobile: 014-2238303</p>
            <p>Email: Pharmacy++@hotmail.com</p>
          </div>
        </div>

        <div class="col-sm-3">

        </div>
      </div>
    </div>
  </div>


  <div class="footer-bottom">
    <div class="container">
      <div class="col-sm-6">
        <div class="social-icons " class="nav nav-pills">
          <ul class="nav navbar-nav">
            <li><a href="https://www.facebook.com/basema.rrm"><i class="fa fa-facebook"></i></a></li>

          </ul>


          <ul class="nav nav-pills">
            <li><a href="#"><i class="fa fa-phone"></i> 014-2238303</a></li>
            <li><a href="#"><i class="fa fa-envelope"></i> pharmacy++@hotmail.com</a></li>
          </ul>

        </div>
      </div>
    </div>
  </div>

</footer><!--/Footer-->


<script src="js1/jquery.js"></script>
<script src="js1/bootstrap.min.js"></script>
<script src="js1/jquery.scrollUp.min.js"></script>
<script src="js1/price-range.js"></script>
<script src="js1/jquery.prettyPhoto.js"></script>
<script src="js1/main.js"></script>
</body>
</html>
