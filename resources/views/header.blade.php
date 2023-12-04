 <!--header section start -->
 <div class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo" id="logo"><a href="{{route('home')}}"><img src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    {{-- @guest --}}
                    @if (!(Auth::check()))
                   
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{route('login')}}">Connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sinscrire-button" href="{{route('register')}}">S'inscrire</a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" id="clubs-button" href="gallery.html">Nos clubs</a>
                    </li>
                    @if((Auth::check()))
                    <li class="nav-item">
                            <a class="nav-link" id="connecter-button" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
    
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                    </li>
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
<!--header section end -->