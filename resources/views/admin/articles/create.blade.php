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
        <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
        <div class="row my-2">
            <div class="col-9">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @csrf
                <div class="row">
                    <div class="col-11">
                        <div class="input-group">
                            <input type="text" class="form-control" name="title" placeholder="Title">
                        </div>
                    </div>
                    <div class="col-1">
                        <input type="submit" value="Save" class="btn btn-dark float-right mb-3">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <textarea name="body" id="editor" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <nav id="sidebar" class="bg-dark shadow rounded-lg">
                    <!-- Sidebar Links -->
                    <ul class="list-unstyled components p-2">
                        <li>
                            <div class="input-group">
                                <input type="text" class="form-control" name="category" placeholder="Categories">
                                <label for="category">Separate categories with commas</label>
                            </div>
                        </li>
                        <li></li>
                        <li></li>
                    </ul>
                </nav>
            </div>
        </div>
        </form>
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