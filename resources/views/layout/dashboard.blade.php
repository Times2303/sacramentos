<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    
	<!-- Vincular CSS desde public/css -->
    <link rel="stylesheet" href="{{ asset('style.css') }}">

	<title>AdminSite</title>
</head>
<body>
	
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><i class="fa-solid fa-user"></i></a>
		<ul class="side-menu">
			<li><a href="{{ route('principal') }}" class="active"><i class='fa-solid fa-table-columns icon' ></i> Principal</a></li>
             <!-- Etiqueta -->
			<li class="divider" data-text="Vistas">Vistas</li>
            
            <!-- Desplegable -->
			<li><a href="{{route('personas.index')}}"><i class="fa-solid fa-user icon"></i>Personas</a></li>

			<li>
				<a href="#"><i class='bx bxs-inbox icon' ></i> Elements <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="#">Alert</a></li>
					<li><a href="#">Badges</a></li>
					<li><a href="#">Breadcrumbs</a></li>
					<li><a href="#">Button</a></li>
				</ul>
			</li>

            <!-- Uno solo -->
			<li><a href="#"><i class='bx bxs-chart icon' ></i> Charts</a></li>
			<li><a href="#"><i class='bx bxs-widget icon' ></i> Widgets</a></li>

             <!-- Etiqueta -->
			<li class="divider" data-text="reportes">Reportes</li>
			<li><a href="#"><i class='bx bx-table icon' ></i> Tables</a></li>
			<li>
				<a href="#"><i class='bx bxs-notepad icon' ></i> Forms <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="#">Basic</a></li>
					<li><a href="#">Select</a></li>
					<li><a href="#">Checkbox</a></li>
					<li><a href="#">Radio</a></li>
				</ul>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<span class="divider"></span>
			<div class="profile">
				<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
				<ul class="profile-link">
					<li><a href="#"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="#"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li><a href="#"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main class="main-content">
			<h1 class="title center-text">Bienvenido Nombre</h1>
			@include('partials.alertas')
            @yield('contenido')
			<!--<ul class="breadcrumbs"> ESTE ES EL HOME/DASHBOARD
				<li><a href="#">Home</a></li>
				<li class="divider">/</li>
				<li><a href="#" class="active">Dashboard</a></li>
			</ul> -->
			<!--<div class="info-data"> ESTO SON LAS CARDS
				<div class="card">
					<div class="head">
						<div>
							<h2>1500</h2>
							<p>Traffic</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
					<span class="progress" data-value="40%"></span>
					<span class="label">40%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>234</h2>
							<p>Sales</p>
						</div>
						<i class='bx bx-trending-down icon down' ></i>
					</div>
					<span class="progress" data-value="60%"></span>
					<span class="label">60%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>465</h2>
							<p>Pageviews</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
					<span class="progress" data-value="30%"></span>
					<span class="label">30%</span>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>235</h2>
							<p>Visitors</p>
						</div>
						<i class='bx bx-trending-up icon' ></i>
					</div>
					<span class="progress" data-value="80%"></span>
					<span class="label">80%</span>
				</div>
			</div> -->
			<!-- <div class="data"> ESTOS SON LOS GRÁFICOS
				<div class="content-data">
					<div class="head">
						<h3>Sales Report</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<div class="chart">
						<div id="chart"></div>
					</div>
				</div>
				<div class="content-data">
					<div class="head">
						<h3>Chatbox</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<div class="chat-box">
						<p class="day"><span>Today</span></p>
						<div class="msg">
							<img src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixid=MnwxMjA3fDB8MHxzZWFyY2h8NHx8cGVvcGxlfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="">
							<div class="chat">
								<div class="profile">
									<span class="username">Alan</span>
									<span class="time">18:30</span>
								</div>
								<p>Hello</p>
							</div>
						</div>
						<div class="msg me">
							<div class="chat">
								<div class="profile">
									<span class="time">18:30</span>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque voluptatum eos quam dolores eligendi exercitationem animi nobis reprehenderit laborum! Nulla.</p>
							</div>
						</div>
						<div class="msg me">
							<div class="chat">
								<div class="profile">
									<span class="time">18:30</span>
								</div>
								<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, architecto!</p>
							</div>
						</div>
						<div class="msg me">
							<div class="chat">
								<div class="profile">
									<span class="time">18:30</span>
								</div>
								<p>Lorem ipsum, dolor sit amet.</p>
							</div>
						</div>
					</div>
					<form action="#">
						<div class="form-group">
							<input type="text" placeholder="Type...">
							<button type="submit" class="btn-send"><i class='bx bxs-send' ></i></button>
						</div>
					</form>
				</div>
			</div> -->
		</main>
		<!-- MAIN -->
	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

	<!-- Vincular JS desde public/js -->
    <script src="{{ asset('script.js') }}"></script>
    

</body>
</html>