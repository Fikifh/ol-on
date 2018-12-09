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
            <li><a href="#prod">Our Produk</a></li>
            @if (Auth::guest())
            <li><a href="{{url('/login') }}">Tagihan</a></li>
            @else 
          <li><a href="{{ url('/struk/'.Auth::user()->id) }}">Tagihan</a></li>
            @endif
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
                            <a hidden="true" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a>
                            
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
<footer class="footer bts-foot">
<div class="container bottom_border">
<div class="row">
<div class=" col-sm-4 col-md col-sm-4  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Find us</h5>
<!--headin5_amrc-->
<p class="mb10">PT. OL-ON Indonesia</p>
<p><i class="fa fa-location-arrow"></i> Jl. A. H. Nasution Cibiru Bandung </p>
<p><i class="fa fa-phone"></i> +91-9999878398  </p>
<p><i class="fa fa fa-envelope"></i> customer@olon.com </p>


</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="{{url('/')}}">Best Product</a></li>
<li><a href="{{url('/')}}">Promo</a></li>
<li><a href="{{url('/')}}">Hadiah</a></li>
<li><a href="{{url('/')}}">Cheap Product</a></li>
<li><a href="{{url('/')}}">Best Sale</a></li>
<li><a href="{{url('/')}}">Info Pemesanan</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-6 col">
<h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
<!--headin5_amrc-->
<ul class="footer_ul_amrc">
<li><a href="{{url('/')}}">Achieved Pricing</a></li>
<li><a href="{{url('/')}}">Shadows & Mirror </a></li>
<li><a href="{{url('/')}}">Order Wherever You Want</a></li>
<li><a href="{{url('/')}}">Effective Shopping</a></li>
<li><a href="{{url('/')}}">Delicious Taste</a></li>
<li><a href="{{url('/')}}">Traditional Style of Batik</a></li>
</ul>
<!--footer_ul_amrc ends here-->
</div>


<div class=" col-sm-4 col-md  col-12 col">
<h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
<!--headin5_amrc ends here-->

<ul class="footer_ul2_amrc">
<li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>twitter.com/@ol-on</p></li>
<li><a href="#"><i class="fab fa-facebook fleft padding-right"></i> </a><p>facebook.com/ol-on</p></li>
<li><a href="#"><i class="fab fa-instagram fleft padding-right"></i> </a><p>instagram.com/@ol-on</p></li>
</ul>
<!--footer_ul2_amrc ends here-->
</div>
</div>
</div>


<div class="container">
<ul class="foote_bottom_ul_amrc">
<li><a href="{{url('/')}}">Home</a></li>
<li><a href="{{url('/')}}">About</a></li>
<li><a href="{{url('/')}}">Services</a></li>
<li><a href="{{url('/')}}">Pricing</a></li>
<li><a href="{{url('/')}}">Contact</a></li>
</ul>
<!--foote_bottom_ul_amrc ends here-->
<p class="text-center">Copyright @2018 | Designed With by <a href="#">PT. OL-ON Indonesia</a></p>

<ul class="social_footer_ul">
<li><a href="{{url('/')}}/"><i class="fab fa-facebook-f"></i></a></li>
<li><a href="{{url('/')}}/"><i class="fab fa-twitter"></i></a></li>
<li><a href="{{url('/')}}/"><i class="fab fa-linkedin"></i></a></li>
<li><a href="{{url('/')}}/"><i class="fab fa-instagram"></i></a></li>
</ul>
<!--social_footer_ul ends here-->
</div>

</footer>   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
