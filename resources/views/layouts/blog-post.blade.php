<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{asset('css/libs/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/fontawesome/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <style>
        body{
            overflow-x: hidden;
        }
        main {
            margin-top: 100px;
            min-height: 78vh;
        }
        footer{
            overflow: hidden;
        }
    </style>

</head>

<body>
    <div id="app">

        <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top" id="main-nav">
            <div class="container">
                @if(Auth::guest())
                    <a class="navbar-brand" href="{{route('index')}}">Web Tricks</a>
                @else
                    <a class="navbar-brand" href="{{route('home')}}">Web Tricks</a>
                @endif
                <button class="navbar-toggler" data-toggle="collapse" data-target="#mainNavbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNavbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        @if(Auth::guest())
                            <li class="nav-item mr-4"><a href="{{route('login')}}" class="{{Request::is('login')? 'nav-link active' : 'nav-link'}}">Login</a></li>
                            <li class="nav-item mr-4"><a href="{{route('register')}}" class="{{Request::is('register')? 'nav-link active' : 'nav-link'}}">Register</a></li>
                            <li class="nav-item mr-4"><a href="#" class="{{Request::is('contact')? 'nav-link active' : 'nav-link'}}">Contact</a></li>
                        @else
                            @if(Auth::user()->isAdmin() || Auth::user()->isAuthor())<li class="nav-item mr-4"><a href="{{route('admin.index')}}" class="{{Request::is('admin')? 'nav-link active' : 'nav-link'}}">Admin</a></li>@endif
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"></span>
                                  {{ Auth::user()->name }}<i class="ml-2 fas fa-user fa-sm"></i>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                  <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                  </a>
                                  <div class="dropdown-divider"></div>
                                  <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ __('Logout') }}
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  </a>
                                </div>
                              </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

    <!-- Page Content -->
    <main>
        <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8" style="overflow: auto;">
                @yield('content')
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                @foreach($categories as $category)
                                <li><a href="#">{{$category->name}}</a>
                                </li>    
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Latest Site Updates</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        </div>
        <!-- /.container -->
    </main>
    <!-- Footer -->
    @include('include.footer')
    <!-- Bootstrap Core JavaScript -->

    </div>

    @yield('scripts')

</body>

</html>
