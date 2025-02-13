@include('templates.vitrine.doctype')
    <head>
        <title>Objets trouvés similaires</title>
    </head>

<body>
<body class="topics-listing-page" id="top">

<main>

        <!-- Navbar -->
        @include('templates.vitrine.navbar')  
        <!-- Navbar -->

            <header class="site-header d-flex flex-column justify-content-center align-items-center">
                <div class="container">
                    <div class="row align-items-center">

                        <div class="col-lg-5 col-12">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Objets trouvés</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Objets trouvés</h2>
                        </div>
                    </div>
                </div>
            </header>

            <section class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h3 class="mb-4">Objets Trouvés</h3>
                        </div>

                        @if($objets->isEmpty())
                            <div class="alert alert-warning">
                                Aucun objet trouvé.
                            </div>
                        @else
                            <div class="col-lg-8 col-12 mt-3 mx-auto">
                                @forelse($objets as $objet)
                                    <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                        <div class="d-flex">
                                            @if($objet->photo)
                                                <img src="{{ asset('uploads/objets_trouves/' . $objet->photo) }}" alt="Photo de {{ $objet->nom_objet }}" class="img-thumbnail" width="100">
                                            @else
                                                Aucune photo
                                            @endif
                                            <div class="custom-block-topics-listing-info d-flex">
                                                <div>
                                                    <h5 class="mb-2">{{ $objet->nom_objet }}</h5>
                                                    <p class="mb-0">{{ $objet->description }}</p>
                                                    <p class="text-muted mt-2">
                                                        Lieu trouvé : {{ $objet->lieu_found }}<br>
                                                        Date trouvée : {{ \Carbon\Carbon::parse($objet->date_found)->format('d/m/Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p class="text-center">Aucun objet trouvé.</p>
                                @endforelse
                                <a href="{{ route('found-items.create') }}" class="btn btn-primary">Retour</a>
                            </div>
                        @endif
                    </div>
                </div>
            </section>

         <!-- Contact Section -->
         @include('templates.vitrine.contact')  
        <!-- Contact Section -->

    <!-- Footer -->
    @include('templates.vitrine.footer1')  
    <!-- Footer -->

    <!-- Script -->
    @include('templates.vitrine.scriptsub')  
    <!-- Script -->
    </body>
</html>