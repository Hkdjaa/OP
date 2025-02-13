@include('templates.admin.doctype')
<head>
	<title>Liste des utilisateurs</title>
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
				<li class="breadcrumb-item active">Liste des utilisateurs</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Table - <small> Liste des utilisateurs</small></h1>
			<!-- end page-header -->

			<!-- begin row -->
			<div class="row">
				<div class="col-xl-6">

					<!-- Afficher le message de succès -->
					@if(session('success'))
						<div class="alert alert-success">
							{{ session('success') }}
						</div>
					@endif

					<!-- Table des utilisateurs -->
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>Nom</th>
								<th>Email</th>
								<th>Est admin</th>
								@if (auth()->check() && auth()->user()->is_admin)
									<th>Actions</th>
								@endif
							</tr>
						</thead>
						<tbody>
							@forelse ($users as $user)
								<tr>
									<td>{{ $user->id }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>{{ $user->is_admin ? 'Oui' : 'Non' }}</td>
									@if (auth()->check() && auth()->user()->is_admin)
										<td>
											<a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">Détails</a>
											<a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">Modifier</a>
											<form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline-block;">
												@csrf
												@method('DELETE')
												<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">Supprimer</button>
											</form>
										</td>
									@endif
								</tr>
							@empty
								<tr>
									<td colspan="5" class="text-center">Aucun utilisateur trouvé.</td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
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

