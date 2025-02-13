@extends('layouts.app')
@include('templates.vitrine.doctype')
<head>
<title>Pertena - Accueil</title>
</head>
<body>

    <main>
        <!-- Navbar -->
        @include('templates.vitrine.navbar')  
        <!-- Navbar -->
        
    <section class="hero-section" id="section_1" style="background-image: url('{{ asset('images/accueil2.jpg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; padding-top: 120px; position: relative;">
    <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.5);"></div>
    <div class="container position-relative">
        <div class="row">
            <div class="col-lg-8 col-12 text-start">
                <h1 class="text-white display-4 fw-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.5);">Bienvenue sur Pertena</h1>
                <h5 class="text-white mb-4" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.5);">
                    Une plateforme simple et efficace dédiée à<br>
                    la déclaration et la recherche d'objets perdus et trouvés
                </h5>
                <div class="hero-buttons">
                    <a href="{{ route('lost-items.create') }}" class="btn custom-btn rounded-pill me-3 px-4">
                        <i class="bi bi-search me-2"></i>Déclarer une perte
                    </a>
                    <a href="{{ route('found-items.create') }}" class="btn btn-outline-light btn-lg rounded-pill px-4">
                        <i class="bi bi-plus-circle me-2"></i>Déclarer un objet trouvé
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


        <section class="featured-section">
                <div class="container">
                    <div class="row justify-content-center">

                        <div class="col-lg-4 col-12 mb-4 mb-lg-0">
                            <div class="custom-block bg-white shadow-lg">
                                <a href="#section_5">
                                    <div class="d-flex">
                                        <div>
                                            <h5 class="mb-2">Notre enreprise</h5>

                                            <p class="mb-0"> Plongez dans l'histoire de Pertena, explorez nos valeurs fondamentales, notre mission, et notre engagement à s'assurer de la bonne place des biens de notre société.</p>
                                        </div>

                                        <span class="badge bg-design rounded-pill ms-auto">01</span>
                                    </div>

                                    <img src="{{ asset('images/pertena-removebg-preview.png') }}" class="custom-block-image img-fluid" alt="">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-12">
                            <div class="custom-block custom-block-overlay">
                                <div class="d-flex flex-column h-100">
                                    <img src="images/businesswoman-using-tablet-analysis.jpg" class="custom-block-image img-fluid" alt="">

                                    <div class="custom-block-overlay-text d-flex">
                                        <div>
                                            <h5 class="text-white mb-2">Votre sécurité</h5>

                                            <p class="text-white"> Soyez serein, la sécurité de vos biens est une priorité. Grâce à notre plateforme, vous pouvez facilement déclarer vos objets perdus ou signaler ceux que vous avez retrouvés. Ensemble, facilitons le rapprochement entre propriétaires et objets, pour que chaque bien retrouve son chemin. </p>

                                            <a href="#sec" class="btn custom-btn mt-2 mt-lg-3">En savoir plus</a>
                                        </div>

                                        <span class="badge bg-finance rounded-pill ms-auto">02</span>
                                    </div>

                                    <div class="social-share d-flex">
                                        <p class="text-white me-4">Share:</p>

                                        <ul class="social-icon">
                                            <li class="social-icon-item">
                                                <a href="https://x.com/" class="social-icon-link bi-twitter"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="https://www.facebook.com/" class="social-icon-link bi-facebook"></a>
                                            </li>

                                            <li class="social-icon-item">
                                                <a href="https://www.pinterest.com/" class="social-icon-link bi-pinterest"></a>
                                            </li>
                                        </ul>

                                        <a href="#" class="custom-icon bi-bookmark ms-auto"></a>
                                    </div>

                                    <div class="section-overlay"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
        </section>

<section class="explore-section section-padding" id="section_2">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h2 class="mb-4">Objets perdus</h2>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                @foreach($itemsByCategory as $categoryName => $items)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link @if($loop->first) active @endif" id="{{ $categoryName }}-tab" data-bs-toggle="tab" data-bs-target="#{{ $categoryName }}-tab-pane" type="button" role="tab" aria-controls="{{ $categoryName }}-tab-pane" aria-selected="true">{{ ucfirst($categoryName) }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tab-content" id="myTabContent">
                    @foreach($itemsByCategory as $categoryName => $items)
                        <div class="tab-pane fade @if($loop->first) show active @endif" id="{{ $categoryName }}-tab-pane" role="tabpanel" aria-labelledby="{{ $categoryName }}-tab" tabindex="0">
                            <div class="row">
                                @foreach($items as $item)
                                    <div class="col-lg-4 col-md-6 col-12 mb-4 mb-lg-0">
                                        <div class="custom-block bg-white shadow-lg">
                                            <a href="{{ route('lost-items.show', $item->id) }}">
                                                <div class="d-flex">
                                                    <div>
                                                        <h5 class="mb-2">{{ $item->name }}</h5>
                                                        <p class="mb-0"> {{ $item->subcategory->name }}</p>
                                                        <p class="mb-0">{{ $item->description }}</p>
                                                        <p class="mb-0">Perdu le : {{ $item->date_lost }} | A : {{ $item->place }}</p>
                                                    </div>
                                                </div>
                                                <img src="{{ asset('images/topics/lost-item-image.png') }}" class="custom-block-image img-fluid" alt="">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- Comment ça marche -->
    <section class="timeline-section section-padding" id="section_2">
        <div class="section-overlay"></div>

        <div class="container">
            <div class="row">

                <div class="col-12 text-center">
                    <h2 class="text-white mb-4">Comment ça marche ?</h2>
                </div>

                <div class="col-lg-10 col-12 mx-auto">
                    <div class="timeline-container">
                        <ul class="vertical-scrollable-timeline" id="vertical-scrollable-timeline">
                            <div class="list-progress">
                                <div class="inner"></div>
                            </div>

                            <li>
                                <h4 class="text-white mb-3">Déclarez un objet perdu</h4>
                                <p class="text-white">Remplissez un formulaire simple et intuitif en décrivant l’objet perdu et en précisant des détails tels que la date et le lieu de perte.</p>
                                <div class="icon-holder">
                                    <i class="bi-pencil-square"></i> <!-- Icône de formulaire -->
                                </div>
                            </li>
                            
                            <li>
                                <h4 class="text-white mb-3">Consultez les objets trouvés</h4>
                                <p class="text-white">Accédez à une base de données d’objets trouvés signalés par d’autres utilisateurs. Un système de correspondance vous aide à repérer les objets similaires.</p>
                                <div class="icon-holder">
                                    <i class="bi-archive"></i> <!-- Icône pour la base de données -->
                                </div>
                            </li>

                            <li>
                                <h4 class="text-white mb-3">Récupérez votre bien</h4>
                                <p class="text-white">Si un objet correspondant à votre déclaration est trouvé, vous serez guidé pour entrer en contact avec le déposant et organiser la récupération en toute sécurité.</p>
                                <div class="icon-holder">
                                    <i class="bi-hand-thumbs-up"></i> <!-- Icône pour une récupération ou accord -->
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 text-center mt-5">
                    <p class="text-white">
                        Compris?
                        <a href="#section_4" class="btn custom-btn custom-border-btn ms-3">Déclarez un objet perdu</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="topics-detail-section section-padding" id="section_3">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-8 col-12 m-auto">
                            <h3 class="mb-4">Notre histoire</h3>

                            <p> Tout a commencé avec une simple question, comment simplifier la recherche et la restitution d'objets perdus?</p>

                            <p><strong> Inspirés par les nombreux défis que nous avons rencontrés en perdant ou en retrouvant des objets </strong>, nous avons décidé de créer une plateforme accessible à tous.</p>
                            <p> Ce site est le fruit de nombreuses heures de travail, de réflexion et de passion. Notre objectif est de créer une communauté solidaire, où chaque utilisateur joue un rôle actif pour aider les autres. Que ce soit pour déclarer un objet perdu ou retrouvé, notre plateforme est là pour vous accompagner à chaque étape.
                            Nous sommes fiers de ce que nous avons accompli jusqu’à présent et restons engagés à améliorer continuellement notre service pour répondre à vos besoins."
                            </p>
                            <blockquote>
                            L’Évolution du Projet
                            </blockquote>

                            <p> Au départ, l’idée était simplement de créer un espace où les objets perdus pourraient être facilement retrouvés. Cependant, au fil du temps, le projet a pris de l’ampleur grâce à la participation active de la communauté et à l'engagement des fondateurs. Ce site a ainsi évolué pour devenir une véritable solution de gestion des objets trouvés, avec des fonctionnalités qui répondent aux attentes des utilisateurs. L'accent a été mis sur l’amélioration continue de l’expérience, en intégrant des outils modernes et en assurant une interface intuitive. Aujourd’hui, le site continue d'évoluer, enrichi par les retours des utilisateurs et par la volonté constante d'améliorer le service rendu. </p>

                            <blockquote id="sec">
                                La protection de vos données et de vos biens
                            </blockquote>

                            <div class="row my-4">
                                <div class="col-lg-6 col-md-6 col-12">
                                    <img src="{{ asset('images/secur1.jpg') }}" class="topics-detail-block-image img-fluid">
                                    <p>Nous mettons un point d'honneur à protéger vos données personnelles.</p>
                                </div>

                                <div class="col-lg-6 col-md-6 col-12 mt-4 mt-lg-0 mt-md-0">
                                    <img src="{{ asset('images/secur2.jpg') }}" class="topics-detail-block-image img-fluid">
                                    <p>Chaque déclaration d'objet perdu ou retrouvé est soigneusement enregistrée pour assurer une gestion transparente et fiable.</p>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </section>

<section class="faq-section section-padding" id="section_4">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-12">
                <h2 class="mb-4">Questions Fréquentes</h2>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-5 col-12">
                <img src="images/faq_graphic.jpg" class="img-fluid" alt="FAQs">
            </div>

            <div class="col-lg-6 col-12 m-auto">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Comment fonctionne Pertena ?
                            </button>
                        </h2>

                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Pertena est une plateforme dédiée à la déclaration des objets perdus et trouvés. Si vous avez perdu un objet, vous pouvez le déclarer ici, et nous vous aiderons à retrouver des objets correspondants parmi ceux trouvés par d'autres utilisateurs. Si vous trouvez un objet, vous pouvez aussi le signaler sur notre site pour aider à le restituer à son propriétaire.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            Comment déclarer un objet perdu ?
                            </button>
                        </h2>

                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Pour déclarer un objet perdu, il vous suffit de remplir un formulaire simple avec une description détaillée de l'objet et de l'endroit où vous l'avez perdu. Nous utiliserons ces informations pour vous aider à trouver des objets correspondants parmi ceux déclarés trouvés par d'autres utilisateurs.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Comment déclarer un objet trouvé ?
                            </button>
                        </h2>

                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Si vous trouvez un objet, vous pouvez le déclarer en remplissant un formulaire avec une description de l'objet et l'endroit où vous l'avez trouvé. Nous mettrons ces informations à disposition des utilisateurs ayant déclaré une perte d'objet similaire.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            Est-ce que mes informations sont sécurisées ?
                            </button>
                        </h2>

                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                Oui, Pertena prend très au sérieux la sécurité de vos données. Toutes les informations que vous soumettez sont protégées par des mesures de sécurité robustes pour garantir votre confidentialité.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
        <!-- Contact Section -->
        @include('templates.vitrine.contact')  
        <!-- Contact Section -->
    </main>

    <!-- Footer -->
    @include('templates.vitrine.footer1')  
    <!-- Footer -->
     
</body>
</html>
