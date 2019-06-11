<!doctype html>
<html lang="en">
  <head>
    <title>Colorlib Wordify &mdash; Minimal Blog Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('public/frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('public/frontend/fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/fonts/flaticon/font/flaticon.css')}}">

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('public/frontend/css/style.css')}}">
  </head>
  <body>
    

    <div class="wrap">

      <header role="banner">

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="#">Blogger</a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link" href="#">Post details</a>
                </li>
              </ul>
              
            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->

    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
             <div class="post-meta">
                        <span class="author mr-2">{{$post->title}}</span>&bullet;
                        <span class="mr-2">{{$post->created_at}}</span> &bullet;
                      </div>
            <a class="category mb-5" href="#">{{$post->name}}</a>
           
            <div class="post-content-body">
            <p>
              {{$post->description}}
            </p>
            </div>


          </div>

          <!-- END main-content -->
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <!-- END section -->
  
    <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Colorlib</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
            </div>
          </div>
        </div>
      </footer>
      <!-- END footer -->

    </div>
    
    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>


    <script src="{{asset('public/frontend/js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery-migrate-3.0.0.js')}}"></script>
    <script src="{{asset('public/frontend/js/popper.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.stellar.min.js')}}"></script>


    <script src="{{asset('public/frontend/js/main.js')}}"></script>
  </body>
</html>