<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>OL-ON</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <a href="app.blade.php"></a>
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="{{asset('style.css')}}">
    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body>
<!-- navbar fixed atas -->
<nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href='/'><span class="glyphicon glyphicon glyphicon-shopping-cart"><span>OL-ON</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-left">
                <input type="text" class="form-control" style="width:100%;"placeholder="Search...">
            </form>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="#about">Best Produk</a></li>
            <li><a href="#contact">How to buy</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Member <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            
                        </li>
                    @endif
              </ul>
            </li>
          </ul>
        </div>
      </div>
      </div>
    </nav>
<!-- end off navbar fixed atas -->
    @yield('content')
    <!--footer starts from here-->
<footer class="footer">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
<!--headin5_amrc-->
<p class="mb10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s</p>
<p><i class="fa fa-location-arrow"></i> 9878/25 sec 9 rohini 35 </p>
<p><i class="fa fa-phone"></i>  +91-9999878398  </p>
<p><i class="fa fa fa-envelope"></i> customer@olon.com  </p>


</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="localhost:8000">Image Rectoucing</a></li>
<li><a href="localhost:8000">Clipping Path</a></li>
<li><a href="localhost:8000">Hollow Man Montage</a></li>
<li><a href="localhost:8000">Ebay & Amazon</a></li>
<li><a href="localhost:8000">Hair Masking/Clipping</a></li>
<li><a href="localhost:8000">Image Cropping</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="localhost:8000">Remove Background</a></li>
<li><a href="localhost:8000">Shadows & Mirror Reflection</a></li>
<li><a href="localhost:8000">Logo Design</a></li>
<li><a href="localhost:8000">Vectorization</a></li>
<li><a href="localhost:8000">Hair Masking/Clipping</a></li>
<li><a href="localhost:8000">Image Cropping</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
<!--headin5_amrc ends here-->

<ul class="footer_ul2_amrc">
<li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Lorem Ipsum is simply dummy text of the printing...<a href="#">https://www.lipsum.com/</a></p></li>
<li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Lorem Ipsum is simply dummy text of the printing...<a href="#">https://www.lipsum.com/</a></p></li>
<li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Lorem Ipsum is simply dummy text of the printing...<a href="#">https://www.lipsum.com/</a></p></li>
</ul>
<!--footer_ul2_amrc ends here-->
</div>
</div>
</div>


<div class="container">
<ul class="foote_bottom_ul_amrc">
<li><a href="localhost:8000">Home</a></li>
<li><a href="localhost:8000">About</a></li>
<li><a href="localhost:8000">Services</a></li>
<li><a href="localhost:8000">Pricing</a></li>
<li><a href="localhost:8000">Blog</a></li>
<li><a href="localhost:8000">Contact</a></li>
</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright @2017 | Designed With by <a href="#">OL-ON</a></p>

<ul class="social_footer_ul">
<li><a href="localhost:8000/"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="localhost:8000/"><i class="fab fa-twitter"></i></a></li>
<li><a href="localhost:8000/"><i class="fab fa-linkedin"></i></a></li>
<li><a href="localhost:8000/"><i class="fab fa-instagram"></i></a></li>
</ul>
<!--social_footer_ul ends here-->
</div>

</footer>

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
