@include('templates.admin.doctype')
<head>
	<title>Liste des catégories</title>
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
				<li class="breadcrumb-item active">Liste des catégories</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Table - <small> Liste des catégories</small></h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-6 -->
				<div class="col-xl-6">

        <!-- Afficher le message de succès -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table des catégories -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <!-- Lien pour voir les sous-catégories -->
                            <a href="{{ route('categories.subcategories', $category->id) }}" class="btn btn-info btn-sm">
                                Voir les sous-catégories
                            </a>

                            <!-- Formulaire pour supprimer une catégorie -->
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette catégorie ?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>

                    
                @empty
                    <tr>
                        <td colspan="3" class="text-center">Aucune catégorie trouvée.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
    </div>
				<!-- end col-6 -->
			</div>
			<!-- end row -->
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