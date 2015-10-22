<html>
<head>
	<title> Listado_de_Miembros</title>
	
	<!-- Estas lineas necesita boostrap para funcionar, necesita incorporar estos archivos -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<!-- Navegador-->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav role="navigation" class="navbar navbar-default navbar-inverse">
				<div class="navbar-header">

					<a class="navbar-brand" href="inicio.html"><img src="img/logoComAux.jpg" id="img" width="50px" class="img-circle"></a>
				</div>
				<ul class="nav navbar-nav">
					<li><a href="inicio.html">Inicio</a></li>
					<li><a href="listado_miembros.html">Listado</a></li>
					<li><a href="formulario_miembros.html">Ingresar Nuevo</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><form class="navbar-form navbar-right" action="listado_miembros.html" role="search">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nombre o apellido">
						</div>
						<button type="submit" class="btn btn-danger">Buscar</button>
					</form></li>
					<li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<!-- Botones y barra de busqueda-->
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-5">
			<form class="form-group" action="listado_miembros.html" role="search">
				<input type="text" class="form-control" placeholder="Nombre o apellido">
		</div>
		<div class="col-md-1">
			<button type="submit" class="btn  btn-primary btn-x">Buscar</button></a>
			</form>
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-2">
			<?
			echo("<a href='formulario_miembro.php'><button type='button' class='btn  btn-success btn-m'>Agregar +</button></a>
		</div>");
		?>
		<div class="col-md-1">
		</div>
	</div>
	<!-- Tabla-->
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<p></p><p></p>
			<table class="table table-condensed table-bordered table-striped" style="background-color:#ececec" >
				<!-- Datos de las tablas de prueba-->
				<tr><th>Apellido</th><th>Nombre</th><th>Celular</th><th>Tipo </th>
					<th>Domicilio</th><th>Tel. Fijo Dia</th><th>Tel.Fijo Noche</th><th></th><th></th><th></th>
				</tr>
				<?
					require("include/connect_db.php");
					$query = 'SELECT * FROM CAX.miembro;';
					$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
				while ($row=mysql_fetch_object($result)){
					echo ("<tr><td><span class='glyphicon glyphicon-user'</span> $row->apellido</td>");
					echo ("<td>    $row->nombre</td>");
					echo("<td><span class='glyphicon glyphicon-earphone'></span> $row->celular </td>");
					echo("<td>Medico </td>");
					echo("<td>$row->domicilio</td>");
					echo("<td>$row->fijoDia</td>");
					echo("<td>$row->fijoNoche</td>");
					echo("<td><a title='Editar' href='formulario_miembro.php?id=$row->idmiembro'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-pencil'</span></button></a></td>");
					echo("<td><a title='Disponibilidad' href='formulario_miembros.html'><button type='button' class='btn  btn-success'><span class='glyphicon glyphicon-ok'</span></button></a></td>");
					echo("<td><a title='Eliminar' href='include/servicio_miembro.php?orden=1&id1=$row->idmiembro'><button type='button' class='btn  btn-danger'><span class='glyphicon glyphicon-remove'</span></button></a></td></tr>");}
				?>
				<div class="col-md-1">
				</div>



			</table>
		</div>
	</div>
</div>
</body>
</html>
