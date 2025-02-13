<div id="header" class="header navbar-default">
			<!-- begin navbar-header -->
			<div class="navbar-header">
				<a href="{{ route('dashboard') }}" class="navbar-brand"><span class="navbar-logo"></span> <b>Pertena </b></a>
				<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
			<!-- end navbar-header --><!-- begin header-nav -->
			<ul class="navbar-nav navbar-right">
				<li class="navbar-form">
					<form action="" method="POST" name="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Rechercher"/>
							<button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
						</div>
					</form>
				</li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" class="dropdown-toggle f-s-14">
						<i class="fa fa-bell"></i>
						<span class="label">5</span>
					</a>
					<div class="dropdown-menu media-list dropdown-menu-right">
						<div class="dropdown-header">NOTIFICATIONS (5)</div>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-bell media-object bg-silver-darker"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Mamadou a ajouté un nouvel objet perdu <i class="fa fa-plus-circle text-success"></i></h6>
								<div class="text-muted f-s-10">3 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="{{ asset('images/user/user-1.jpg' ) }}" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Awa Diallo</h6>
								<p>Je viens de retrouver un objet, merci de me contacter.</p>
								<div class="text-muted f-s-10">25 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<img src="{{ asset('images/user/user-2.jpg' ) }}" class="media-object" alt="" />
								<i class="fab fa-facebook-messenger text-blue media-object-icon"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Ibrahima Ba</h6>
								<p>Un objet que j'ai déclaré perdu a été retrouvé !</p>
								<div class="text-muted f-s-10">35 minutes ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-user-plus media-object bg-silver-darker"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Fatou Sow vient de s'inscrire</h6>
								<div class="text-muted f-s-10">1 hour ago</div>
							</div>
						</a>
						<a href="javascript:;" class="dropdown-item media">
							<div class="media-left">
								<i class="fa fa-sign-in media-object bg-silver-darker"></i>
							</div>
							<div class="media-body">
								<h6 class="media-heading">Aliou Ndiaye vient de se connecter</h6>
								<div class="text-muted f-s-10">2 hours ago</div>
							</div>
						</a>
						<div class="dropdown-footer text-center">
							<a href="javascript:;">Voir plus</a>
						</div>
					</div>
				</li>
				<li class="dropdown navbar-user">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<i class="fa fa-user"></i>
                <span class="d-none d-md-inline">{{ Auth::user()->name }} </span> <b class="caret"></b>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:;" class="dropdown-item"> Profil</a>
                <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span> Inbox</a>
                <a href="javascript:;" class="dropdown-item">Paramètres</a>
                <div class="dropdown-divider"></div>
                
                <!-- Formulaire de déconnexion -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item">Se déconnecter</button>
                </form>
            </div>
        </li>
			</ul>
			<!-- end header-nav -->
		</div>