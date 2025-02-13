<div id="sidebar" class="sidebar">
			<!-- begin sidebar scrollbar -->
			<div data-scrollbar="true" data-height="100%">
				<!-- begin sidebar user -->
				<ul class="nav">
					<li class="nav-profile">
						<a href="javascript:;" data-toggle="nav-profile">
							<div class="cover with-shadow"></div>
							<div class="image">
								<img src="{{ asset('images/user/user-13.jpg' ) }}" alt="" />
							</div>
							<div class="info">
								<b class="caret pull-right"></b>                    {{ Auth::user()->name }}
								<small>Dev</small>
							</div>
						</a>
					</li>
					<li>
						<ul class="nav nav-profile">
							<li><a href="javascript:;"><i class="fa fa-cog"></i> Paramètres</a></li>
							<li><a href="javascript:;"><i class="fa fa-question-circle"></i> Se déconnecter</a></li>
						</ul>
					</li>
				</ul>
				<!-- end sidebar user -->
				<!-- begin sidebar nav -->
				<ul class="nav"><li class="nav-header">Navigation</li>
                
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-users"></i>
							<span>Utilisateurs</span>
						</a>
						<ul class="sub-menu">
							<li><a href="{{ route('users.index') }}">Liste des utilisateurs</a></li>
							<li><a href="{{ route('users.create') }}">Ajouter un utilisateur</a></li>
							<li><a href="{{ route('users.deleted') }}">Utilisateurs supprimés</a></li>
						</ul>
					</li>
					<li>
						<a href="{{ route('home') }}">
							<i class="fab fa-simplybuilt"></i>
							<span>Site </span> 
						</a>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-question"></i>
							<span>Objets perdus </span> 
						</a>
						<ul class="sub-menu">
							<li><a href="{{ route('lost-items.index') }}"> Liste des objets perdus </a></li>
							<li><a href="{{ route('lost-items.createAdmin') }}"> Déclarer un objet perdu</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-bell"></i>
							<span>Objets trouvés </span> 
						</a>
						<ul class="sub-menu">
							<li><a href="{{ route('found-items.index') }}">Liste des objets trouvés</a></li>
							<li><a href="{{ route('found-items.createAdmin') }}"> Déclarer un objet trouvé</a></li>
						</ul>
					</li>
					<li class="has-sub">
						<a href="javascript:;">
							<b class="caret"></b>
							<i class="fa fa-paint-brush"></i>
							<span>Catégories/Sub</span>
						</a>
						<ul class="sub-menu">
							<li class="has-sub">
                            <a href="javascript:;"><b class="caret"></b>Liste</a>
                                <ul class="sub-menu">
									<li><a href="{{ route('categories.index') }}">Liste des catégories</a></li>
								</ul>
                            </li>
							<li class="has-sub">
								<a href="javascript:;"><b class="caret"></b> Ajouter</a>
								<ul class="sub-menu">
									<li><a href="{{ route('categories.create') }}">Ajouter une catégorie</a></li>
									<li><a href="{{ route('subcategories.create') }}">Ajouter une sous-catégorie</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- begin sidebar minify button -->
					<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
					<!-- end sidebar minify button -->
				</ul>
				<!-- end sidebar nav -->
			</div>
			<!-- end sidebar scrollbar -->
		</div>
		<div class="sidebar-bg"></div>