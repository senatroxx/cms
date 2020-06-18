<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>LaravelCMS</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
    <style> 
    @media (min-width: 992px) {
      body {
          padding-top: 56px;
      }
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="/">LaravelCMS</a>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              @if (Route::has('login'))
                @auth
                <li class="nav-item">
                      <a class="nav-link" href="{{ route('index') }}">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                      document.getElementById('logout-form').submit();">
                    Log out
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                  </li>
                  @else
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">Register</a>
                  </li>
                  @endauth
              @endif
          </ul>
        </div>
      </div>
    </nav>

    <div id="app" class="container">
        <div class="row my-2">
            <div class="col-3">
                <nav id="sidebar" class="bg-dark shadow rounded-lg">
                    <!-- Sidebar Links -->
                        <ul class="list-unstyled components">
                            <li class="active"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('post.index') }}">Articles</a></li>
                            <li><a href="{{ route('comments.index') }}">Comments</a></li>
                            <!-- <li>
                                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
                                <ul class="collapse list-unstyled" id="homeSubmenu">
                                    <li>
                                        <a href="#">Home 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Home 3</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#">Portfolio</a></li>
                            <li><a href="#">Contact</a></li> -->
                        </ul>
                </nav>
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>
    </div>

    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Athharkautsar 2020</p>
      </div>
    </footer>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
        CKEDITOR.replace('editor', options);
    </script>
  </body>
</html>