<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Directory | Bootstrap 4 listing template</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,700&amp;display=swap">
    <!-- Owl carousel2-->
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel2/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/owl.carousel2/assets/owl.theme.default.min.css')}}">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{asset('vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- Lightbox-->
    <link rel="stylesheet" href="{{asset('vendor/lightbox2/css/lightbox.min.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Fontdiner+Swanky&family=Roboto:wght@500&display=swap");

$lime: #c5dc50;
$rasp: #f36a6f;
$seed: #383838;
$sm: 1rem;
$md: 2.5rem;
$lg: 4rem;

* {
  box-sizing: 0;
  margin: 0;
  padding: 0;
  cursor: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/4424790/cursors-edge.png"),
    auto;
}

body {
  background: linear-gradient(to right, white 50%, $seed 50%);
  font-family: "Roboto", sans-serif;
  font-size: 18px;
  font-weight: 500;
  line-height: 1.5;
  color: white;
}

div {
  display: flex;
  align-items: center;
  height: 100vh;
  max-width: 1000px;
  width: calc(100% - #{$lg});
  margin: 0 auto;
  > * {
    display: flex;
    flex-flow: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
    max-width: 500px;
    width: 100%;
    padding: $md;
  }
}

aside {
  background-image: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/4424790/right-edges.png");
  background-position: top right;
  background-repeat: no-repeat;
  background-size: 25px 100%;
  img {
    display: block;
    height: auto;
    width: 100%;
  }
}

main {
  text-align: center;
  h1 {
    font-family: "Fontdiner Swanky", cursive;
    font-size: $lg;
    color: $lime;
    margin-bottom: $sm;
  }
  p {
    margin-bottom: $md;
    em {
      font-style: italic;
      color: $lime;
    }
  }
  button {
    font-family: "Fontdiner Swanky", cursive;
    font-size: $sm;
    color: $seed;
    border: none;
    background-color: $rasp;
    padding: $sm $md;
    transform: skew(-5deg);
    transition: all 0.1s ease;
    cursor: url("https://s3-us-west-2.amazonaws.com/s.cdpn.io/4424790/cursors-eye.png"),
      auto;
    &:hover {
      background-color: $lime;
      transform: scale(1.15);
    }
  }
}

@media (max-width: 700px) {
  body {
    background: $seed;
    font-size: 16px;
  }
  div {
    flex-flow: column;
    > * {
      max-width: 700px;
      height: 100%;
    }
  }
  aside {
    background-image: none;
    background-color: white;
    img {
      max-width: 300px;
    }
  }
}

        </style>
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <nav class="navbar navbar-expand-lg  fixed-top navbar-light bg-white py-3 py-lg-2">
        <div class="container"><a class="navbar-brand py-3 d-flex align-items-center" href="index.html"><img src="img/logo.svg" alt="" width="30"><span class="text-uppercase text-small font-weight-bold text-dark ml-2 mb-0">Listings</span></a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">

              @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <!--  Modal -->
    <div>
    <aside><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4424790/Mirror.png" alt="404 Image" />
    </aside>
    <main>
        <h1>Sorry!</h1>
        <p>
        Either you aren't cool enough to visit this page or it doesn't exist <em>. . . like your social life.</em>
        </p>
        <button>You can go now!</button>
    </main>
    </div>

    <footer style="background: #111;">
      <div class="container py-4">
        <div class="row py-5">
          <div class="col-md-4 col-sm-12 mb-3 mb-md-0">
            <div class="d-flex align-items-center mb-3"><img src="img/logo-footer.svg" alt="" width="30"><span class="text-uppercase text-small font-weight-bold text-white ml-2">Listings</span></div>
            <p class="text-muted text-small font-weight-light mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
            <ul class="list-inline mb-0 text-white">
              <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-pinterest"></i></a></li>
              <li class="list-inline-item"><a class="reset-anchor text-small" href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
          <div class="col-md-4 col-sm-6 mb-3 mb-md-0">
            <h6 class="pt-2 text-white">Useful links</h6>
            <div class="d-flex flex-wrap">
              <ul class="list-unstyled text-muted mb-0 mb-3 mr-4">
                <li><a class="reset-anchor text-small" href="#">Tools</a></li>
                <li><a class="reset-anchor text-small" href="#">Resources</a></li>
                <li><a class="reset-anchor text-small" href="#">About us</a></li>
                <li><a class="reset-anchor text-small" href="#">Write to us</a></li>
              </ul>
              <ul class="list-unstyled text-muted mb-0">
                <li><a class="reset-anchor text-small" href="#">Privacy Policy </a></li>
                <li><a class="reset-anchor text-small" href="#">Cookie Policy</a></li>
                <li><a class="reset-anchor text-small" href="#">Terms of Service</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 col-sm-6 mb-3 mb-md-0">
            <h6 class="pt-2 text-white">Newsletter</h6>
            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
            <form action="">
              <div class="input-group">
                <input class="form-control bg-none border-dark text-white" type="email" placeholder="Type your email address">
                <div class="input-group-append">
                  <button class="btn btn-light" type="submit"><i class="fas fa-paper-plane"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="copyrights py-4" style="background: #0e0e0e">
        <div class="container">
          <div class="row text-center">
            <div class="col-md-6 text-lg-left mb-2 mb-md-0">
              <p class="mb-0 text-muted mb-0 text-small">&copy; 2020 All rights reserved.</p>
            </div>
            <div class="col-md-6 col-sm-6 text-md-right">
              <p class="mb-0 text-muted mb-0 text-small">Template designed by <a class="reset-anchor text-primary" href="https://bootstraptemple.com/p/listings">Bootstrap Temple</a>.</p>
              <!-- If you want to remove the backlink, please purchase the Attribution-Free License.-->
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- JavaScript files-->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <script src="{{asset('js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
    <script>
      // ------------------------------------------------------- //
      //   Inject SVG Sprite -
      //   see more here
      //   https://css-tricks.com/ajaxing-svg-sprite/
      // ------------------------------------------------------ //
      function injectSvgSprite(path) {

          var ajax = new XMLHttpRequest();
          ajax.open("GET", path, true);
          ajax.send();
          ajax.onload = function(e) {
          var div = document.createElement("div");
          div.className = 'd-none';
          div.innerHTML = ajax.responseText;
          document.body.insertBefore(div, document.body.childNodes[0]);
          }
      }
      // this is set to BootstrapTemple website as you cannot
      // inject local SVG sprite (using only 'icons/orion-svg-sprite.svg' path)
      // while using file:// protocol
      // pls don't forget to change to your domain :)
      injectSvgSprite('https://bootstraptemple.com/files/icons/orion-svg-sprite.svg');

    </script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>
