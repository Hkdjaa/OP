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
                                    <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Accueil</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Objets trouvés</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Objets trouvés</h2>
                        </div>
                    </div>
                </div>
            </header>

            @extends('layouts.app')

            @section('content')
            <section class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-12 text-center">
                            <h3 class="mb-4">Objets Trouvés Similaires</h3>
                        </div>
                        @if($objets->isEmpty())
                        <div class="alert alert-warning">
                            Aucun objet correspondant.
                        </div>
                    @else
            
                        <div class="col-lg-8 col-12 mt-3 mx-auto">
                            @foreach($objets as $objet)
                                <div class="custom-block custom-block-topics-listing bg-white shadow-lg mb-5">
                                    <div class="d-flex">
                                        @if($objet->photo)
                                        <img src="{{ asset('uploads/objets_trouves/' . $objet->photo) }}" alt="Photo de {{ $objet->nom_objet }}" class="img-thumbnail" width="100">
                                    @else
                                        Aucun
                                    @endif
                                        <div class="custom-block-topics-listing-info d-flex">
                                            <div>
                                                <!-- Titre de l'objet -->
                                                <h5 class="mb-2">{{ $objet->nom_objet }}</h5>
                                                
                                                <!-- Description de l'objet -->
                                                <p class="mb-0">{{ $objet->description }}</p>
            
                                                <!-- Lieu trouvé et date -->
                                                <p class="text-muted mt-2">
                                                    Lieu trouvé : {{ $objet->lieu_trouve }}<br>
                                                    Date trouvée : {{ \Carbon\Carbon::parse($objet->date_trouvee)->format('d/m/Y') }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <!-- Message si aucun objet trouvé -->
                                <p class="text-center">Aucun objet trouvé similaire pour cette catégorie.</p>
                            @endforeach
                            <a href="{{ route('objets_trouves.create') }}" class="btn btn-primary">Retour</a>

                        </div>
                    </div>
                </div>
            </section>
            @endsection
            

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