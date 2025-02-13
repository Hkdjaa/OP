@include('templates.admin.doctype')
<head>
	<title>Modifier un utilisateur</title>
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
				<li class="breadcrumb-item"><a href="javascript:;">Accuei</a></li>
				<li class="breadcrumb-item"><a href="javascript:;">Utilisateurs</a></li>
				<li class="breadcrumb-item active">Modifier</li>
			</ol>
			<!-- end breadcrumb -->
            <!-- begin row -->
			<div class="row">
         				<!-- begin col-6 -->
				<div class="col-xl-6">
					<!-- begin panel -->
					<div class="panel panel-inverse" data-sortable-id="form-stuff-10">
						<!-- begin panel-heading -->
						<div class="panel-heading">
							<h4 class="panel-title">Modifier</h4>
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
                        @if(session('success'))
                               <p class="success-message">{{ session('success') }}</p>
                              @endif
                              <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
								<fieldset>
									<legend class="m-b-15">Modifier un utilisateur</legend>
									<div class="form-group">
                                        <label for="name" class="form-label">Nom</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="{{ $user->name }}" required>
									</div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
									</div>
                                    <div class="form-group">
                                        <label for="is_admin" class="form-label">Est admin</label>
                                        <select class="form-control" id="is_admin" name="is_admin">
                                            <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Oui</option>
                                            <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Non</option>
                                        </select>
									</div>
									<button type="submit" class="btn btn-sm btn-primary m-r-5">Ajouter</button>
								</fieldset>
                                <br>
							</form>
						</div>
						<!-- end panel-body -->
					</div>
					<!-- end panel -->
				</div>
				<!-- end col-6 -->
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
