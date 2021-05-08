<!DOCTYPE html>
<html lang="es">
<head>
	<title>
	@section('titulo')
	Rüsten Crossfit
	@show
	</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/main.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
</head>
<body>
	<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				System Demo <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="{{asset('design/img/icono.jpg')}}" alt="UserIcon">
					<figcaption class="text-center text-titles">{{Session::get('sesionname')}}</figcaption>
					<figcaption class="text-center text-titles">{{Session::get('sesiontipo')}}</figcaption>
				</figure>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="URL::action('admin@home')}}">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Inicio
					</a>
				</li>
				@if(Session::get('sesiontipo')=='Admin')
				<li>
					<a class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-plus-circle"></i> Altas <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="URL::action('admin@clientes')}}"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Clientes</a>
						</li>
						<li>
							<a href="URL::action('admin@productos')}}"><i class="zmdi zmdi-book zmdi-hc-fw"></i>Productos</a>
						</li>
						<li>
							<a href="URL::action('admin@vendedores')}}"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Vendedores</a>
						</li>
						<li>
							<a href="URL::action('admin@membrecias')}}"><i class="zmdi zmdi-file-plus zmdi-hc-fw"></i>Membresias</a>
						</li>
						<li>
							<a href="URL::action('admin@instructores')}}"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>Instructor</a>
						</li>
						<li>
							<a href="URL::action('admin@clase_extra')}}"><i class="zmdi zmdi-font zmdi-hc-fw"></i>Clase Extra</a>
						</li>
						<li>
							<a href="URL::action('admin@marcas')}}"><i class="zmdi zmdi-assignment zmdi-hc-fw"></i>Marcas</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-view-list"></i> Consultas <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="URL::action('admin@consultasAtletas')}}"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Atletas</a>
						</li>
						<li>
							<a href="URL::action('admin@consultasProd')}}"><i class="zmdi zmdi-book zmdi-hc-fw"></i>Productos</a>
						</li>
						<li>
							<a href="URL::action('admin@consultasMembre')}}"><i class="zmdi zmdi-file-plus zmdi-hc-fw"></i>Membresias</a>
						</li>
						<li>
							<a href="URL::action('admin@consultasClas')}}"><i class="zmdi zmdi-font zmdi-hc-fw"></i>Clases</a>
						</li>
						<li>
							<a href="URL::action('admin@consultasInstructor')}}"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Instructores</a>
						</li>
						<li>
							<a href="URL::action('admin@consultaMarca')}}"><i class="zmdi zmdi-assignment zmdi-hc-fw"></i> Marcas</a>
						</li>
						<li>
							<a href="URL::action('admin@consultaVende')}}"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Vendedores</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-card zmdi-hc-fw"></i> Pagos <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<!--<li>
							<a href="URL::action('payvepagos_Membresia"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Pagos Membresias</a>
						</li>-->
						<li>
							<a href="URL::action('payve@reportePago')}}"><i class="zmdi zmdi-money zmdi-hc-fw"></i>Reporte pagos Membrecias</a>
						</li>
						<!--<li>
							<a href="URL::actionpayvepagoClase"><i class="zmdi zmdi-money zmdi-hc-fw"></i>Pago clase extra</a>
						</li>-->
						<li>
							<a href="URL::action('payve@reportePC')}}"><i class="zmdi zmdi-money zmdi-hc-fw"></i>Reporte pago extra</a>
						</li>
					</ul>
				</li>
				<li>
					<a class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-card zmdi-hc-fw"></i> Ventas <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="URL::action('payve@venta')}}"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Venta</a>
						</li>
						<li>
							<a href="URL::action('payve@reporteVentas')}}"><i class="zmdi zmdi-money zmdi-hc-fw"></i>Reporte Ventas</a>
						</li>
					</ul>
				</li>
				@else
								<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Consultas <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="URL::action('admin@consultasProd')}}"><i class="zmdi zmdi-case-play zmdi-hc-fw"></i>Productos</a>
						</li>
						<li>
							<a href="URL::action('admin@consultasMembre')}}"><i class="zmdi zmdi-file-plus zmdi-hc-fw"></i>Membrecias</a>
						</li>
						<li>
							<a href="URL::action('admin@consultasClas')}}"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>Clases</a>
						</li>
						<li>
						</li>
					</ul>
				</li>
				<li>
					<a  class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-card zmdi-hc-fw"></i> Pagos <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="URL::action('payve@pagos_Membresia')}}"><i class="zmdi zmdi-money zmdi-hc-fw"></i> Pagos Membresias</a>
						</li>
					</ul>
				</li>@endif
				<li>
					<a href="URL::action('admin@cerrarsesion')}}" class="btn-sideBar-SubMenu"><i class="zmdi zmdi-close-circle"></i> Cerrar Sesión</a>
				</li>
			</ul>
		</div>
	</section>

	<!-- Content page-->
	<section class="full-box dashboard-contentPage">
		<!-- NavBar -->
		<nav class="full-box dashboard-Navbar">
			<ul class="full-box list-unstyled text-right">
				<li class="pull-left">
					<a class="btn-menu-dashboard"><i class="zmdi zmdi-more-vert"></i></a>
				</li>
				<!--<li>
					<a href="#!" class="btn-search">
						<i class="zmdi zmdi-search"></i>
					</a>
				</li>-->
			</ul>
		</nav>
		<!-- Content page -->
		@yield('content')
		<!-- Notifications area -->


	<!-- Dialog help -->
	<div class="modal fade" tabindex="-1" role="dialog" id="Dialog-Help">
	  	<div class="modal-dialog" role="document">
		    <div class="modal-content">
			    <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			    	<h4 class="modal-title">Help</h4>
			    </div>
		      	<div class="modal-footer">
		        	<button type="button" class="btn btn-primary btn-raised" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> Ok</button>
		      	</div>
		    </div>
	  	</div>
	</div>
	<!--====== Scripts -->
	@if(Session::has('error'))
    <script type="text/javascript">
      alert("{{Session::get('error')}}")
    </script>
    @endif
	<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
	@stack('script')
	<script src="{{asset('js/sweetalert2.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
	<script src="{{asset('js/material.min.js')}}"></script>
	<script src="{{asset('js/ripples.min.js')}}"></script>
	<script src="{{asset('js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
	<script src="{{asset('js/main.js')}}"></script>
	<script>
		$.material.init();
	</script>
</body>
</html>
