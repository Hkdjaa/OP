<nav class="navbar navbar-expand-lg" style="background: linear-gradient(to right, #e8f0fe,rgb(139, 195, 210)); box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/pertena-logo.png') }}" alt="Pertena Logo" style="height: 80px; width: auto; max-width: none;">
                </a>

                <!-- Bouton hamburger pour mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-list" style="font-size: 2rem;"></i>
                </button>

                <!-- Menu principal -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-lg-5 me-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link text-primary fw-medium" style="color: #80d0c7;" href="/">Accueil</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-primary fw-medium" style="color:rgb(77, 97, 95);" href="#" id="navbarLightDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">Déclarer</a>
                            <ul class="dropdown-menu dropdown-menu-light border-0 shadow-sm" aria-labelledby="navbarLightDropdownMenuLink">
                                <li><a class="dropdown-item" style="color:rgb(69, 76, 80);" href="{{ route('lost-items.create') }}">Un objet perdu</a></li>
                                <li><a class="dropdown-item" style="color:rgb(69, 76, 80);" href="{{ route('found-items.create') }}">Un objet trouvé</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary fw-medium" style="color: #80d0c7;" href="{{ route('found-items.liste') }}">Objets trouvés</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary fw-medium" style="color: #80d0c7;" href="/#sec">En savoir plus</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-primary fw-medium" style="color: #80d0c7;" href="#section_5">Contact</a>
                        </li>
                        @if(Auth::check() && Auth::user()->is_admin)
                        <li class="nav-item">
                                <a href="{{ route('dashboard') }}" class="nav-link text-primary fw-medium" style="color: #80d0c7;">
                                    <i class="bi bi-speedometer2"></i> Tableau de bord
                                </a>
                        </li>
                        @endif
                    </ul>

                    <div class="nav-item">
                         @if(Auth::check() && Auth::user())
                            <a href="{{ route('logout') }}" class="btn btn-outline-primary rounded-pill" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right"></i> Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-outline-primary rounded-pill">
                                <i class="bi bi-person"></i> Connexion
                            </a>
                        @endif
                    </div>
                </div>
        </div>
    </nav>

<style>
@media (max-width: 991.98px) {
    .navbar-collapse {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: linear-gradient(to right, #e8f0fe, #f8f9fa);
        padding: 1rem;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        z-index: 1000;
    }
    
    .navbar-nav .nav-item {
        padding: 0.5rem 0;
    }
    
    .dropdown-menu {
        border: none;
        background: transparent;
        padding-left: 1rem;
    }
    
    .dropdown-item {
        padding: 0.5rem 1rem;
    }

    .navbar-brand img {
        height: 60px; /* Légèrement plus petit sur mobile */
    }
}

.navbar {
    padding-top: 0.5rem;
    padding-bottom: 0.5rem;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 1030;
    background-color: #e8f0fe !important; /* Ensure the original background color is applied */
}

.navbar button {
    background-color: #FF5733; /* Same color for all buttons */
    color: white; /* Ensure text is readable */
}

.nav-link {
    position: relative;
    transition: color 0.3s ease;
}

.nav-link:hover::after {
    content: '';
    position: absolute;
    width: 100%;
    height: 2px;
    background: currentColor;
    bottom: 0;
    left: 0;
    transform: scaleX(1);
    transition: transform 0.3s ease;
}

/* S'assurer que le menu déroulant est toujours visible */
.dropdown-menu {
    margin-top: 0;
}

/* Style du bouton hamburger */
.navbar-toggler {
    border: none;
    padding: 0.25rem 0.75rem;
    font-size: 1.25rem;
    background: transparent;
}

.navbar-toggler:focus {
    outline: none;
    box-shadow: none;
}
</style>