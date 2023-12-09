<div class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo" id="logo"><a href="{{ route('home') }}"><img src="images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                @if (Auth::user()->isroot)
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{ route('admin.index') }}">Gestions des admins</a>
                    </li>
                  
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{ route('Club.index') }}">Gestions des clubs</a>
                    </li>
                    <li>
                @endif 
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div></li>
                    @if(Auth::user()->isadmin)
                    <li class="nav-item">
                        <a class="nav-link" id="sinscrire-button" href="{{ route('feedback.index') }}">Traiter les reclamations</a>
                    </li>
                    @endif  
                    <li class="nav-item">
                        <a class="nav-link"id="sinscrire-button"  href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Bonjour {{ Auth::user()->name }}
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>