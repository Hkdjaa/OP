@include('templates.admin.doctype')
<head>
	<title> Liste des objets perdus</title>
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
			<h1 class="page-header">Table - <small> Liste des objets perdus</small></h1>
			<!-- end page-header -->
			<!-- begin row -->
			<div class="row">
				<!-- begin col-6 -->
				<div class="col-xl-6">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="table-basic-4">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<h4 class="panel-title">Liste des objets perdus</h4>
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
							    <!-- Affichage d'un message de succès s'il y en a un -->
								@if(session('success'))
								<div style="color: green;">
									{{ session('success') }}
								</div>
								@endif
							<!-- begin table-responsive -->
							<div class="table-responsive">
								<table class="table">
									<thead>
										<tr>
											<th nowrap>Nom</th>
											<th nowrap>Description</th>
											<th nowrap>Date de la perte</th>
											<th nowrap>Lieu de la perte</th>
											<th nowrap>Catégorie</th>
											<th nowrap>Sous-catégorie</th>
											<th nowrap>Numéro de téléphone</th>
											<th>Actions</th> <!-- Nouvelle colonne pour les actions -->
										</tr>
									</thead>
									<tbody>
										@foreach($lostItems as $item)
										<tr>
											<td>{{ $item->name }}</td>
											<td>{{ $item->description }}</td>
											<td>{{ $item->date_lost }}</td>
											<td>{{ $item->place }}</td>
											<td>{{ $item->category->name }}</td>
											<td>{{ $item->subcategory->name }}</td>
											<td>{{ $item->phone_number }}</td>
											<td>
                <!-- Bouton Modifier -->
                <a href="{{ route('lost-items.edit', $item->id) }}">Modifier</a>

                <!-- Formulaire de suppression -->
                <form action="{{ route('lost-items.destroy', $item->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet objet ?')">Supprimer</button>
                </form>
            </td>
										</tr>
									@endforeach
									</tbody>
								</table>
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