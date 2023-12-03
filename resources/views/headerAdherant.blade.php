<div class="header_section">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="logo" id="logo"><a href="{{ route('home') }}"><img src="../images/logo.png"></a></div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav"aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" id="connecter-button" href="{{ route('reclamation.create') }}">Ajouter un
                            reclamation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="sinscrire-button" href="{{ route('reclamation.index') }}">Mes reclamations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="clubs-button" href="{{ route('home') }}">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>