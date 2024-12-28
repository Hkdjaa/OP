@include('templates.admin.doctype')
<head>
	<title> Liste des catégories et sous-catégories</title>
</head>
<body>

	<!-- begin #page-container -->
	<div id="page-container" class="fade page-sidebar-fixed page-header-fixed">
		<!-- begin #header -->
		@include('templates.admin.header')
		<!-- end #header -->
		
		<!-- begin #sidebar -->
		@include('templates.admin.sidebar')
		<!-- end #sidebar -->
		
		<!-- begin #content -->
		<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="javascript:;">Accueil</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Tables</a></li>
				<li class="breadcrumb-item active">Liste des objets perdus</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Table - <small> Liste des catégories</small></h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-6 -->
				<div class="col-xl-6">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="table-basic-4">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<h4 class="panel-title">Liste des catégories</h4>
							<div class="panel-heading-btn">
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
								<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
							</div>
						</div>
						<!-- end panel-heading -->
						<!-- begin panel-body -->
						<div class="panel-body">
                            <div class="container mt-5">
                                <h1 class="mb-4">Sous-catégories de "{{ $category->name }}"</h1>
                                <!-- Afficher le message de succès -->
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <!-- begin table-responsive -->
                                <div class="table-responsive">
                                    <!-- Liste des sous-catégories -->
                                    @if($category->subcategories->isNotEmpty())
                                        <ul class="list-group">
                                            @foreach($category->subcategories as $subcategory)
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    {{ $subcategory->name }}
                                                    <!-- Supprimer une sous-catégorie -->
                                                    <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sous-catégorie ?')">
                                                            Supprimer
                                                        </button>
                                                    </form>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>Aucune sous-catégorie trouvée pour cette catégorie.</p>
                                    @endif
                                </div>
							</div>
							<!-- end table-responsive -->
						</div>
						<!-- end panel-body -->
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-6 -->
			</div>
			<!-- end row -->

         
<div class="container mt-5">
        <h1 class="mb-4">Sous-catégories de "{{ $category->name }}"</h1>

        <!-- Afficher le message de succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Liste des sous-catégories -->
        @if($category->subcategories->isNotEmpty())
            <ul class="list-group">
                @foreach($category->subcategories as $subcategory)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $subcategory->name }}
                        <!-- Supprimer une sous-catégorie -->
                        <form action="{{ route('subcategories.destroy', $subcategory->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette sous-catégorie ?')">
                                Supprimer
                            </button>
                        </form>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Aucune sous-catégorie trouvée pour cette catégorie.</p>
        @endif

        <!-- Bouton pour retourner à la liste des catégories -->
        <a href="{{ route('categories.index') }}" class="btn btn-secondary mt-4">Retour à la liste des catégories</a>
        <a href="{{ route('subcategories.create') }}" class="btn btn-primary">Ajouter une sous-catégorie</a>
        <a href="{{ route('admin') }}" class="btn btn-primary">Administration</a>
    </div>
    </div>
    <!-- end #content -->
		
		<!-- begin theme-panel -->
		@include('templates.admin.panel')
		<!-- end theme-panel -->
		
		<!-- begin scroll to top btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
		<!-- end scroll to top btn -->
	</div>
	<!-- end page container -->
	
		<!-- ================== BEGIN BASE JS ================== -->
		@include('templates.admin.scripts')
	<!-- ================== END PAGE LEVEL JS ================== -->
</body>
</html>
