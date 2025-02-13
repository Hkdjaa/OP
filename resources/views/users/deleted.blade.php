@include('templates.admin.doctype')
<head>
	<title> Utilisateurs supprimés</title>
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
				<li class="breadcrumb-item"><a href="javascript:;">Utilisateurs</a></li>
				<li class="breadcrumb-item active">Supprimés</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Table - <small> Utilisateurs supprimés</small></h1>
			<!-- end page-header -->

			@if ($deletedUsers->isEmpty())
				<p>Aucun utilisateur supprimé.</p>
			@else
				<table border="1">
					<thead>
						<tr>
							<th>Nom</th>
							<th>Email</th>
							<th>Supprimé le</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($deletedUsers as $user)
							<tr>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->deleted_at }}</td>
								<td>
									<!-- Option pour restaurer l'utilisateur -->
									<form action="{{ route('users.restore', $user->id) }}" method="POST">
										@csrf
										@method('PUT')
										<button type="submit">Restaurer</button>
									</form>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			@endif

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