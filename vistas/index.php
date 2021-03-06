<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
	<title>Inicio</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="bustras/css/bootstrap.css">
	<link rel="stylesheet" href="bustras/css/bootstrap-theme.css">
	<link rel="stylesheet" href="bustras/css/estilos.css">
	<link rel=icon href='img/logo-icon.png' sizes="32x32" type="image/png">
    <!-- Compiled and minified Bootstrap CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Compiled and minified Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>

<body>
	<div class="container contenedor_principal">
		<br>
		<header>
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
				<!-- navbar-fixed-top o bottom ocupa el 100$ independientemente de si lo encierras en un container -->
				<!-- Si se utiliza el fixed top entonces tienes que agregar padding al body para que se muestre el texto debajo del nav -->
				<div class="container-fluid">
					<div class="navbar-header">
						<a href="#" class="navbar-brand">Health Center Management</a>
					</div>
					<div class="collapse navbar-collapse" id="navbar1">
						<!-- id tiene que ser igual que el que pusiste en el data-target, solo que en este se le añade # -->
						<ul class="nav navbar-nav">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pacientes<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="index.html">Inicio</a></li>
									<li><a href="MostrarDatos.html">Pacientes</a></li>
									<li><a href="form_visitas.html">Agregar visita</a></li>
									<li><a href="form_pacientes.html">Agregar paciente</a></li>
									<li><a href="buscarPaciente.html">Buscar paciente</a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menus<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="inicio_menus.php">Inicio</a></li>
									<li><a href="m_dietas.php">Dietas</a></li>
									<li><a href="m_menu.php">Menus</a></li>

									<li><a href="m_platillos.php">Alimentos</a></li>
								</ul>
							</li>

							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Ventas<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="inicio_ventas.php">Inicio</a></li>
									<li><a href="v_inventario.php">Inventario</a></li>
									<li><a href="v_comercial.php">Comercial</a></li>
								</ul>
							</li>
						</ul>

					</div>
				</div>
			</nav>
		</header>
		<div class="container">

			<h1 class="page-header" style="font-size: 60px"><center><b>Pacientes</b></center> </h1>
			<br>

			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
					<li data-target="#myCarousel" data-slide-to="5"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
					<div class="item active">
						<img src="images/doctores.jpg" class="center-block"  alt="" width="600px">
					</div>

					<div class="item">
						<img src="images/pacientes_1.jpg" class="center-block" alt="" width="600px">
					</div>
					<div class="item">
						<img src="images/pacientes_2.jpg" class="center-block" alt="" width="600px">
					</div>
					<div class="item">
						<img src="images/pacientes_3.jpg" class="center-block" alt="" width="600px">
					</div>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#myCarousel" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

			<br>
		</div>
		
		
		<br>

		<h1 class="page-header" ><center><b>¿Qué se puede hacer en Pacientes?</b></center> </h1>
		<p align="center">Aquí, los médicos pueden agregar y consultar información relevante de los pacientes, información que los ayudará a conocer mejor las necesidades del cliente y tener un orden adecuado para la consulta de la información.</p>


		<h2 class="page-header" ><center><i>Secciones del módulo </i></center> </h2>

		<ul>
			<li><p><b><i>Pacientes:</i></b><br>Aquí podemos observar primero una serie de datos relevantes para los médicos, información con la cual podrán identificar a sus pacientes, observar las visitas que han hecho a la clínica, modificar la información o eliminar la información de la base de datos en caso de ser necesario.<br>
			También se habilita un portal en el cual el médico puede buscar información de un paciente para encontrar al mismo más rápido, funciona con nombre, apellidos y dirección.
			</p></li>
			<li><p><b><i>Visitas:</i></b><br>Aquí los médicos pueden registrar las visitas que los pacientes hacen a la clínica, pueden obtener información relevante y añadir notas para analizar el progreso de sus pacientes.</p></li>
		</ul>
		<br>
	</div>
	
</body>
</html>
