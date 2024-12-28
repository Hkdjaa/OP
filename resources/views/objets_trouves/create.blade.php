@include('templates.vitrine.doctype')
    <head>
        <title>Déclarer un objet trouvé</title>
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

                                    <li class="breadcrumb-item active" aria-current="page">Déclarer un objet trouvé</li>
                                </ol>
                            </nav>

                            <h2 class="text-white">Déclarer un objet trouvé</h2>
                        </div>
                    </div>
                </div>
            </header>

            <section class="section-padding section-bg">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-12 col-12">
                            <h3 class="mb-4 pb-2">Qu'avez-vous trouvé?</h3>
                        </div>

                        <div class="col-lg-6 col-12">
                             @if(session('success'))
                               <p class="success-message">{{ session('success') }}</p>
                              @endif

                             <form action="{{ route('objets_trouves.store') }}" method="POST" enctype="multipart/form-data" class="custom-form contact-form" role="form">
                              @csrf
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="text" name="nom_objet" id="nom_objet" class="form-control" placeholder="Nom" value="{{ old('name') }}" required>
                                        
                                            <label for="name">Nom de l'objet</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <input type="date" id="date_trouvee" name="date_trouvee" value="{{ old('date_lost') }}" max="{{ date('Y-m-d') }}" class="form-control" required>
                                            
                                            <label for="date_lost">Date de la trouvaille</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-12">
                                        <div class="form-floating">
                                            <input type="text" id="lieu_trouve" class="form-control" name="lieu_trouve" value="{{ old('place') }}" placeholder="Lieu" required>
                                            
                                            <label for="place">Lieu de la trouvaille</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12"> 
                                        <div class="form-floating">
                                            <textarea id="description" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Description" name="description" required>{{ old('description') }}</textarea>
                                            
                                            <label for="description">Description de l'objet</label></label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-floating">
                                            <select id="categorie_id" name="categorie_id" class="form-control" required>
                                            <option value="">Choisir une catégorie</option>
                                                @foreach($categories as $category)
                                          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                          </option>
                                          @endforeach
                                         </select>
                                     <label for="category_id">Catégorie</label>
                                     </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                     <div class="form-floating">
                                     <select id="subcategory_id" name="subcategory_id" class="form-control" required>
                                      <option value="">Choisir une sous-catégorie</option>
                                      </select>      
                                      <label for="subcategory_id">Sous-catégorie</label>                               
                                      </div>
                                    </div>

                                        <div class="form-floating">
                                            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="Numéro" required>
                                        
                                            <label for="phone_number">Numéro de téléphone</label>
                                        </div>

                                        <div class="form-floating">
                                            <input type="file" id="photo" name="photo" class="form-control">
                                        
                                            <label for="photo">Photo (optionnel)</label>
                                        </div>

                                        <div class="col-lg-4 col-12 ms-auto">
                                        <button type="submit" class="form-control">Publier</button>
                                        <button type="submit" name="action" value="save_and_show" class="btn btn-secondary">Ajouter et afficher</button>
                                    </div>
                                </div>
                            </form>
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