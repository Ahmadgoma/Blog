<!doctype html>
<html lang="en">
  <head>
    <title>Blogger</title>
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
              <h1 class="site-logo"><a href="index.html">Blogger</a></h1>
            </div>
          </div>
        </div>

        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">


            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="#">Home</a>
                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                  @forelse($categories as $category)
                      <a class="dropdown-item" href="{{route('categories.posts' , $category->id)}}">{{$category->name}} </a>
                  @empty
                  @endforelse
                  </div>

                </li>
              </ul>

            </div>
          </div>
        </nav>
      </header>
      <!-- END header -->

      <!-- END section -->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                  @forelse($posts as $post)
                <div class="col-md-6">
                  <a href="blog-single.html" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author mr-2"> {{$post->title}}</span>&bullet;
                      </div>
                      <h2> {{ Str::limit( $post->description, 50 ) }}</h2>
                        <span class="mr-2">{{$post->created_at}} </span> &bullet;

                    </div>
                  </a>
                </div>
                      @empty
                  There is no posts, yet.
                      @endforelse
              </div>

              <div class="row mt-5">
                <div class="col-md-12 text-center">
                    {{$posts->links()}}
                </div>
              </div>






            </div>

            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
              <!-- END sidebar-box -->
              <!-- END sidebar-box -->
              <!-- END sidebar-box -->

              <div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                  @forelse($categories as $category)
                  <li><a href="#">{{$category->name}} </a></li>
                    @empty
                  @endforelse
                </ul>
              </div>
              <!-- END sidebar-box -->

            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>

      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-md-12 text-center">
              <p class="small">
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy; <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All Rights Reserved | This template is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" >Ahmad Gomaa</a>
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