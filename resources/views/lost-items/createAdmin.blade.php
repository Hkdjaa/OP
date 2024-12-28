@include('templates.admin.doctype')
<head>
	<title>Déclarer une perte</title>
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
				<li class="breadcrumb-item"><a href="javascript:;">Objets perdus</a></li>
				<li class="breadcrumb-item active">Ajouter</li>
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
							<h4 class="panel-title">Ajouter un objet perdu</h4>
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
							<form action="{{ route('lost-items.store') }}" method="POST">
                            @csrf
								<fieldset>
									<legend class="m-b-15">Nouveau</legend>
									<div class="form-group">
										<label for="name">Nom de la sous-catégorie</label>
										<input type="text" name="name" id="name" class="form-control" placeholder="Nom" value="{{ old('name') }}" required />
									</div>
                                    <div class="form-group">
										<label for="date_lost">Date de la perte</label>
										<input type="date" id="date_lost" name="date_lost" value="{{ old('date_lost') }}" class="form-control" required />
									</div>
                                    <div class="form-group">
										<label for="place">Lieu de la perte</label>
										<input type="text" id="place" class="form-control" name="place" value="{{ old('place') }}" placeholder="Lieu" required />
									</div>
                                    <div class="form-group">
										<label for="description">Description de l'objet</label>
                                        <textarea id="description" pattern="[^ @]*@[^ @]*" class="form-control" placeholder="Description" name="description" required>{{ old('description') }}</textarea>
									</div>
									<div class="form-group">
                                        <label for="category_id">Catégorie</label>
                                        <select id="category_id" name="category_id" class="form-control" required>
                                        <option value="">Choisir une catégorie</option>
                                                @foreach($categories as $category)
                                          <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                          </option>
                                          @endforeach
                                        </select>
									</div>
                                    <div class="form-group">
                                        <label for="subcategory_id">Sous-catégorie</label>      
                                        <select id="subcategory_id" name="subcategory_id" class="form-control" required>
                                            <option value="">Choisir une sous-catégorie</option>
                                        </select>  
									</div>
                                    <div class="form-group">
                                    <label for="phone_number">Numéro de téléphone</label>
                                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" class="form-control" placeholder="Numéro" required>
									</div>
                                    <div class="form-group">
                                    <label for="photo">Photo (optionnel)</label>
                                    <input type="file" id="photo" name="photo" class="form-control">
									</div>
									<button type="submit" class="btn btn-sm btn-primary m-r-5">Publier</button>
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