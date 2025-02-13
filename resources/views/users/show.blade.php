@include('templates.admin.doctype')
<head>
	<title> Détails de l'utilisateur</title>
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
				<li class="breadcrumb-item active">Détails</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Table - <small> Détails de l'utilisateur</small></h1>
			<!-- end page-header -->

            <div class="container mt-4">
                <h1>Détails de l'utilisateur</h1>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    <tr>
                        <th>Nom</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Est admin</th>
                        <td>{{ $user->is_admin ? 'Oui' : 'Non' }}</td>
                    </tr>
                    <tr>
                        <th>Créé par</th>
                        <p>Créé par : {{ $user->created_by ? $user->creator->name : 'Inconnu' }}</p>
                        </tr>
                    <tr>
                        <th>Date de création</th>
                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Dernière modification</th>
                        <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                    </tr>
                </table>

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