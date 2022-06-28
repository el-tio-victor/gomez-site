<nav class='container d-flex justify-content-end header-master' >
    @include('template/partials/navLogin')
    {{--<nav class="container d-flex">
        <div>
            <div class="navbar-header">
                <button type="button" class="btn-menu icon-menu collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                                        <span class="sr-only">Toggle Navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                                        {{ config('app.name', 'Laravel') }}
                    </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                                {{ Auth::user()->name }} <span class="caret"></span>
                                            </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                 document.getElementById('logout-form').submit();">
                                                        Logout
                                                    </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
        
        @if(Auth::user())
        <ul class="nav ">
            @if(Auth::user()->admin())
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('users.index')}}">Usuarios</a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href=" {{ route('categories.index')}} ">Categorias</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{route('tags.index')}} ">Tags</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{route('articles.index')}} ">Articulos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" {{route('images.index')}} ">Imagenes</a>
            </li>
        </ul>
        
        
        @endif
    </nav>--}}
   
    
    

</nav>