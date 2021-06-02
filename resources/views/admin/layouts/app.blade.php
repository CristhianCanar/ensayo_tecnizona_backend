<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Tecnizona</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="" type=""/>
	<!-- Core JS Files -->
	<script src="{{ asset('atlantis/assets/js/core/jquery.3.2.1.min.js') }}"></script>
	<script src="{{ asset('atlantis/assets/js/core/popper.min.js') }}"></script>
	<script src="{{ asset('atlantis/assets/js/core/bootstrap.min.js') }}"></script>
	<!-- jQuery UI -->
	<script src="{{ asset('atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
	<!-- jQuery Scrollbar -->
	<script src="{{ asset('atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
	<!-- Atlantis JS -->
	<script src="{{ asset('atlantis/assets/js/atlantis.min.js') }}"></script>
    <!-- Chart Circle -->
	<script src="{{asset('atlantis/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<script src="{{ asset('js/admin.js') }}"></script>
	<!-- Fonts and icons -->
	<script src="{{ asset('atlantis/assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["{{ asset('atlantis/assets/css/fonts.css') }}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('atlantis/assets/css/atlantis.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">


</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="dark2">

				<a href="" class="logo">
                    <div class="avatar-sm float-left mr-2">
					    <img src="{{ asset('img/icono_stac.png') }}" class="navbar-brand" width="30" height="30">
                    </div>
                    <span style="color: white;">Tecnizona</span>
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark">
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Buscar ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fa fa-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
								<li>
									<div class="dropdown-title">Tienes 3 notificaciones</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">
													New user registered
												</span>
												<span class="time">5 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="fa fa-comment"></i> </div>
											<div class="notif-content">
												<span class="block">
													Rahmad commented on Admin
												</span>
												<span class="time">12 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="fa fa-heart"></i> </div>
											<div class="notif-content">
												<span class="block">
													Farrah liked Admin
												</span>
												<span class="time">17 minutes ago</span>
											</div>
										</a>
									</div>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-user"></i>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="u-text">
												<h4>{{Auth::user()->nombre}}</h4>
											</div>
										</div>
									</li>
									<li>
                                        <!--
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Mi Perfil</a>
                                        -->
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>
		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2" data-background-color="dark2">
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
                    <!--
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="../../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Hizrian
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
                    -->
					<ul class="nav nav-primary">
						<li class="nav-item @if(request()->routeIs('home')) active @endif"  >
							<a href="{{ route('home') }}" >
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Modulos</h4>
						</li>
						<li class="nav-item @if(request()->routeIs('user.index') || request()->routeIs('user.create')) active submenu @endif">
							<a data-toggle="collapse" href="#usuarios">
								<i class="la flaticon-user-5"></i>
								<p>Usuarios</p>
								<span class="caret"></span>
							</a>
							<div class="collapse @if(request()->routeIs('user.index') || request()->routeIs('user.create')) show @endif" id="usuarios">
								<ul class="nav nav-collapse">
									<li class="@if(request()->routeIs('user.create')) active @endif">
										<a href="{{ route('user.create') }}">
											<span class="sub-item">Registrar Usuario</span>
										</a>
									</li>
									<li class="@if(request()->routeIs('user.index')) active @endif">
										<a href="{{ route('user.index') }}">
											<span class="sub-item">Gestionar Usuarios</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

                        <li class="nav-item @if(request()->routeIs('producto.index') || request()->routeIs('producto.create')) active submenu @endif">
							<a data-toggle="collapse" href="#productos">
								<i class="la flaticon-box-1"></i>
								<p>Productos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse @if(request()->routeIs('producto.index') || request()->routeIs('producto.create')) show @endif" id="productos">
								<ul class="nav nav-collapse">
									<li class="@if(request()->routeIs('producto.create')) active @endif">
										<a href="{{ route('producto.create') }}">
											<span class="sub-item">Registrar Producto</span>
										</a>
									</li>
									<li class="@if(request()->routeIs('producto.index')) active @endif">
										<a href="{{ route('producto.index') }}">
											<span class="sub-item">Gestionar Productos</span>
										</a>
									</li>
								</ul>
							</div>
						</li>

                        <li class="nav-item @if(request()->routeIs('pedido.index') || request()->routeIs('pedido.create')) active submenu @endif">
							<a data-toggle="collapse" href="#pedidos">
								<i class="la flaticon-cart"></i>
								<p>Pedidos</p>
								<span class="caret"></span>
							</a>
							<div class="collapse @if(request()->routeIs('pedido.index') || request()->routeIs('pedido.create')) show @endif" id="pedidos">
								<ul class="nav nav-collapse">
									<li class="@if(request()->routeIs('pedido.create')) active @endif">
										<a href="{{ route('pedido.create') }}">
											<span class="sub-item">Registrar Pedido</span>
										</a>
									</li>
									<li class="@if(request()->routeIs('pedido.index')) active @endif">
										<a href="{{ route('pedido.index') }}">
											<span class="sub-item">Gestionar Pedidos</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="main-panel">
			<div class="content">
				<div class="content">
                    @include('sweetalert::alert')
                    @yield('content')
                </div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
                        <!--
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
									ThemeKita
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Help
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									Licenses
								</a>
							</li>
						</ul>
                        -->
					</nav>
					<div class="copyright ml-auto">
						2021 © power by <a href="https://www.stac.com.co" style="text-decoration: none">STAC</a>
					</div>
				</div>
			</footer>
		</div>
	</div>
</body>
</html>
