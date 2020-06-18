<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Neo Ighodaro">
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
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar bg-light shadow-sm">
        <div class="container">
            <a class="navbar-brand waves-effect" href="{{ route('index') }}">
                <strong class="blue-text">Laravel CMS</strong>
            </a>

            <!-- Collapse -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <!-- Left -->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link waves-effect" href="{{ route('index') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link waves-effect" href="https://mdbootstrap.com/docs/jquery/">Category</a>
                    </li>
                </ul>

                <!-- Right -->
                <ul class="navbar-nav nav-flex-icons">
                  @if (Route::has('login'))
                    @auth
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}">Home</a>
                      </li>
                      @if(Auth::user()->roles[0]->id == 2)
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                      @endif
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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

    <div id="app">
        @yield('content')
    </div>

    <footer class="py-3 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Athharkautsar 2020</p>
      </div>
    </footer>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      $(".right").toggleClass('rounded float-right');
      $(".left").toggleClass('rounded float-left');
    </script>
  </body>
</html>