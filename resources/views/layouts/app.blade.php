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
                        <a class="nav-link waves-effect" href="#">Category</a>
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="dropdownLogin">Login</a>
                            <div class="dropdown-menu dropdown-menu-right shdaow" aria-labelledby="dropdownLogin">
                              <div class="login-item">
                                <form class="" action="{{ route('login') }}" method="post">
                                  @csrf
                                  <p class="hint-text">Sign in with your social media account</p>
                                  <div class="form-group social-btn clearfix text-center">
                                    <a href="#" class="btn btn-primary pull-left"><i class="fab fa-google"></i> Google</a>
                                  </div>
                                  <div class="or-seperator"><b>or</b></div>
                                  <div class="form-group">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                      @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                  </div>
                                  <div class="form-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                  </div>
                                  <input type="submit" class="btn btn-primary btn-block" value="Login">
                                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                </form>
                              </div>
                            </div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="dropdownRegister" href="#">Register</a>
                          <div class="dropdown-menu dropdown-menu-right shadow" aria-labelledby="dropdownRegister">
                            <div class="login-item">
                              <form class="" action="{{ route('login') }}" method="post">
                                @csrf
                                <p class="hint-text">Sign up with your social media account</p>
                                <div class="form-group social-btn clearfix text-center">
                                  <a href="#" class="btn btn-primary pull-left"><i class="fab fa-google"></i> Google</a>
                                </div>
                                <div class="or-seperator"><b>or</b></div>
                                <div class="form-group">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                                <div class="form-group">
                                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
                                </div>
                                <input type="submit" class="btn btn-primary btn-block" value="Register">
                              </form>
                            </div>
                          </div>
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

    <footer class="py-3 bg-light shadow-lg">
      <div class="container">
        <p class="m-0 text-center">Copyright &copy; Athharkautsar 2020</p>
      </div>
    </footer>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
      $(".right").toggleClass('rounded float-right');
      $(".left").toggleClass('rounded float-left');
      $(document).on("click", ".dropdown-menu", function(e){
        e.stopPropagation();
      });
    </script>
  </body>
</html>