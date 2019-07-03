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
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
            </div>

            <div class="mainmenu pull-left">

              <div class="logo pull-left">
                <a href="welcomm"><img src="images/logoo.jpg" height="150" width="150"/></a>
              </div>


              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="welcomm">Home</a></li>
                <li><a href="Login" class="active">Login</a></li>
                <li><a href="contact_us">Contact_us</a></li>
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


  <section id="form"><!--form-->
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-sm-offset-1">
          <div class="login-form"><!--login form-->
            <h2>Login to your account</h2>
            <form method="POST" action="{{ route('login') }}">
              @csrf

              <input id="email" placeholder="Email Address" type="email"
                     class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                     name="email" value="{{ old('email') }}" required autofocus>

              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
              @endif

              <input id="password" type="password" placeholder="Password"
                     class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                     required>

              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
              @endif

              <div class="form-group row mb-0">
                <div class="col-md-8 offset-md-4">
                  <button type="submit" class="btn btn-default">
                    {{ __('Login') }}
                  </button>
                </div>
              </div>
            </form>
          </div><!--/login form-->
        </div>
        <div class="col-sm-1">
          <h2 class="or">OR</h2>
        </div>
        <div class="col-sm-4">
          <div class="signup-form"><!--sign up form-->
            <h2>New User Signup!</h2>
            <form method="POST" action="{{ route('register') }}">
              @csrf

              <input id="name" placeholder="Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                     name="name" value="{{ old('name') }}" required autofocus>

              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
              @endif

              <input id="email" placeholder="Email Address" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                     name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
              @endif

              <input id="password" placeholder="Password" type="password"
                     class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password"
                     required>

              @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
              @endif

              <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation"
                     required>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-default">
                    {{ __('Register') }}
                  </button>
                </div>
              </div>
            </form>
            {{--            <form action="#">--}}
            {{--              <input type="text" placeholder="Name"/>--}}
            {{--              <input type="email" placeholder="Email Address"/>--}}
            {{--              <input type="password" placeholder="Password"/>--}}
            {{--              <button type="submit" class="btn btn-default">Signup</button>--}}
            {{--            </form>--}}
          </div><!--/sign up form-->
        </div>
      </div>
    </div>
  </section><!--/form-->

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
