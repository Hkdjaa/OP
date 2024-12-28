@include('templates.admin.doctype')
<head>
	<title>Modification Perte</title>
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
                <form action="{{ route('lost-items.update', $lostItem->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" value="{{ $lostItem->name }}" required><br>

    <label for="description">Description :</label>
    <textarea id="description" name="description" required>{{ $lostItem->description }}</textarea><br>

    <label for="date_lost">Date perdue :</label>
    <input type="date" id="date_lost" name="date_lost" value="{{ $lostItem->date_lost }}" required><br>

    <label for="place">Emplacement :</label>
    <input type="text" id="place" name="place" value="{{ $lostItem->place }}" required><br>

    <label for="category_id">Catégorie :</label>
    <select id="category_id" name="category_id" required>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $lostItem->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br>

    <label for="subcategory_id">Sous-catégorie :</label>
    <select id="subcategory_id" name="subcategory_id">
        <option value="">Aucune</option>
        @foreach($categories as $category)
            @foreach($category->subcategories as $subcategory)
                <option value="{{ $subcategory->id }}" {{ $lostItem->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                    {{ $subcategory->name }}
                </option>
            @endforeach
        @endforeach
    </select><br>

    <label for="phone_number">Numéro de téléphone :</label>
    <input type="text" id="phone_number" name="phone_number" value="{{ $lostItem->phone_number }}" required><br>

    <label for="photo">Photo :</label>
    <input type="file" id="photo" name="photo"><br>
    <img src="{{ asset('storage/' . $lostItem->photo) }}" alt="Photo de l'objet" width="100"><br>

    <button type="submit">Mettre à jour</button>
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