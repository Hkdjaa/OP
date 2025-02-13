@include('templates.vitrine.doctype')
<head>
        <title>Déclarer une perte</title>

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
                                    <li class="breadcrumb-item"><a href="../welcome.blade.php">Accueil</a></li>

                                    <li class="breadcrumb-item active" aria-current="page">Déclarer une perte</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Détails de l'objet perdu</h2>
                        </div>
                    </div>
                </div>
            </header>

<div class="container">

    <!-- Afficher la photo si elle existe -->
    @if ($lostItem->photo)
        <div>
            <img src="{{ asset('storage/'.$lostItem->photo) }}" alt="Photo de l'objet perdu" class="img-fluid">
        </div>
    @endif

    <div class="card mt-4">
        <div class="card-header">
            <h3>{{ $lostItem->name }}</h3>
        </div>
        <div class="card-body">
            <p><strong>Description:</strong> {{ $lostItem->description }}</p>
            <p><strong>Date de perte:</strong> {{ \Carbon\Carbon::parse($lostItem->date_lost)->format('d/m/Y') }}</p>
            <p><strong>Lieu de perte:</strong> {{ $lostItem->place }}</p>
            
            <!-- Afficher la catégorie -->
            <p><strong>Catégorie:</strong> {{ $lostItem->category->name }}</p>
            
            <!-- Afficher la sous-catégorie -->
            <p><strong>Sous-catégorie:</strong> {{ $lostItem->subcategory->name }}</p>

            <!-- Afficher la catégorie secondaire (si applicable) -->
            @if ($lostItem->secondaryCategory)
                <p><strong>Catégorie secondaire:</strong> {{ $lostItem->secondaryCategory->name }}</p>
            @endif

            <!-- Afficher l'utilisateur (si disponible) -->
            <p><strong>Contact utilisateur:</strong> {{ $lostItem->user->name }} ({{ $lostItem->phone_number }})</p>
        </div>
    </div>

    <!-- Ajouter un bouton pour revenir à la liste des objets perdus -->
    <div class="mt-4">
        <a href="{{ route('home') }}" class="form-control">Retour à la liste des objets perdus</a>
    </div>
</div>

      
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
