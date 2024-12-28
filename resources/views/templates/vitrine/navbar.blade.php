<nav class="navbar navbar-expand-lg">
        <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/pertena-logo.png') }}" alt="Pertena Logo">
                </a>

                <div class="d-lg-none ms-auto me-4">
                <a href="{{ route('login') }}" class="navbar-icon bi-person smoothscroll"></a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Accueil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Déclarer</a>
                            <ul class="dropdown-menu dropdown-menu-light" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" href="{{ route('lost-items.create') }}" >Un objet perdu</a></li>
                                <li><a class="dropdown-item" href="{{ route('objets_trouves.create') }}">Un objet trouvé</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="">Objets correspondants</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section_3">En savoir plus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#section_5">Contact</a>
                        </li>
                        </ul>
                        <div class="d-none d-lg-block">
    @if(Auth::check())
        <!-- Affiche le nom de l'utilisateur et un bouton de déconnexion -->
        <span class="text-white me-3">Bonjour, {{ Auth::user()->name }}</span>
        <a href="{{ route('logout') }}" class="navbar-icon bi-box-arrow-right smoothscroll" 
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        </a>

        <!-- Formulaire de déconnexion -->
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    @else
        <!-- Bouton pour aller à la page de connexion -->
        <a href="{{ route('login') }}" class="navbar-icon bi-person smoothscroll"></a>
    @endif
</div>

                    </div>
                </div>
            </nav>