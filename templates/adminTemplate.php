<?php 

date_default_timezone_set ( 'America/Mexico_City');

$hoy=getdate();

$meses=['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'];

$dias=['Lunes','Martes','Miercoles','Jueves','Viernes','Sabado','Domingo'];

$days=['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

$dayPosc=array_search($hoy['weekday'],$days);


$cadena=$dias[$dayPosc].",".$hoy['mday']." de ". $meses[$hoy['mon']]." del ".$hoy['year'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Panel de Administracion Olin</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/css/foundation.min.css" integrity="sha256-itWEYdFWzZPBG78bJOOiQIn06QCgN/F0wMDcC4nOhxY=" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="assets/css/admin.css">
</head>
<body>
	<div class="row expanded main-container">
		<aside class="columns medium-2">
			<div class="fecha">
				
				<p><strong>Administrador</strong></p>
				<p><?php echo $cadena ?></p>
				<p>Hora: <strong> <?php echo $hoy['hours'].":".$hoy['minutes']; ?> </strong></p>
			</div>
			<nav>
				<ul>
					<li><a href="#!"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a></li>
					<li><a href="#!"><i class="fa fa-paperclip" aria-hidden="true"></i> Categorias</a></li>
					<li><a href="#!"><i class="fa fa-paperclip" aria-hidden="true"></i> SubCategorias</a></li>
					<li><a href="#!"><i class="fa fa-bar-chart" aria-hidden="true"></i> Graficas</a></li>
					<li><a href="#!"><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesion</a></li>

				</ul>
			</nav>
		</aside>
		<section class="columns medium-8"></section>
	</div>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/foundation.min.js" integrity="sha256-Nd2xznOkrE9HkrAMi4xWy/hXkQraXioBg9iYsBrcFrs=" crossorigin="anonymous"></script>
 <script src="https://use.fontawesome.com/ff12b0c5d1.js"></script>
</body>
</html>