<?php
require("include/connect_db.php");
session_start();
if (empty($_SESSION["id"]))
	header("Location: index.php");

?>
<!-- La pantalla de inicio lo que va haber apenas se loguea -->
<html>
<head>
	<title> Comisión de Auxilio - Sistema de Gestion de Disponibilidad de Miembros de Auxilio  </title>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Estas lineas necesita boostrap para funcionar, necesita incorporar estos archivos -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
<!-- Navegador-->
<div class="container-full">
	<div class="row">
		<div class="col-md-12">
			<nav role="navigation" class="navbar navbar-default navbar-inverse">
				<div class="navbar-header">
					<!-- Todo se desplegara menos el logotipo-->
					<button type="button" class="navbar-toggle" data-toggle="collapse"
       			     data-target=".navbar-ex1-collapse">
      					<span class="sr-only">Desplegar navegación</span>
      					<span class="icon-bar"></span>
      					<span class="icon-bar"></span>
      					<span class="icon-bar"></span>
    				</button>
    				<!-- Logotipo-->
					<a class="navbar-brand" href="inicio.php"><img src="img/logoComAux.jpg" id="img" width="50px" class="img-circle"></a>
				</div>
				<!-- Elementos desplegables-->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav">
					<li><a href="inicio.php">Inicio</a></li>
					<li><a href="listadomiembro.php">Listado</a></li>
					<li><a href="formulario_miembro.php">Ingresar Nuevo</a></li>
					
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text"><font color="red">Conectado como <? echo "$_SESSION[nombre]"; echo " ";
					echo "$_SESSION[apellido]"; ?></font> </p>
					<li><a href='formulario_miembro.php?id=<? echo $_SESSION["id"];?>'>Mis datos</a></li>
					<li><form  class="navbar-form navbar-right" method="post" action="listadomiembro.php?go"> 
	     	 			<input  type="text" name="name" class="form-control" placeholder="Nombre o apellido"> 
	    	 			<input  type="submit" name="buscar" class="btn btn-danger" value="Buscar"> 
	   	 			</form> </li>
					<li><a href="include/sesion.php" ><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
				</ul>
				</div>
			</nav>
		</div>
	</div>
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Disponibilidad</h1>
				</div>
				<div class="panel-body">
					<p></p><p></p>
<?php
					/*recibe por post el id para cargar los datos */
					/*de disponibilidad*/
					if(isset($_GET['idmiembro'])){
						$id=$_GET['idmiembro'];
						$consulta="SELECT * FROM CAX.disponibilidad where idmiembro ='".$id."' order by fechaInicio;";
						$result=mysql_query($consulta) or die('Consulta fallida: ' . mysql_error());
						//echo$consulta;
						}
?>
				<table class'table table-condensed table-bordered table-striped' style='background-color:#ececec' >
						<!-- Datos de las tablas de disponibilidad crea los encabezados-->

						<tr><th>Desde</th><th>hasta</th><th>Nuevo</th><th></th></tr>

				<form action='include/servicio_disponibilidad.php' method='POST'>  	
				<tr class='danger'>
    			<td><input type='text' name='desde' size='18px'></input></td>
				<td><input type='text' name='hasta' size='18px'></input></td>
				<td><input type='hidden'name='idmiembro'value=<?php echo$id?> size='1px'></input></td>
				<td><input type='submit'name='Nuevo' value='Nuevo'></input></td>
				<!--<td><a title='Ver mas' href='include/servicio_disponibilidad.php'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-plus'</span></button></a></td>-->
				</tr>
				</form>
				</table>


						<table class="table table-condensed table-bordered table-striped" style="background-color:#ececec" >
						<!-- Datos de las tablas de disponibilidad crea los encabezados-->
						<tr><th>Desde</th><th>hasta</th><th>Eliminar</th><th></th></tr>
						<!--el while arma la tabla de disponivilidad de cada miembro-->
<?
						while ($row = mysql_fetch_object($result))  {
								echo"<form action='../disponibilidad.html' method='POST'>\n"; //se crea un form  	
								echo "\t<tr class='danger'>\n";//por cada iteracion de busqueda de la fila en la base de datos
    							echo("<td>$row->fechaInicio</td>");
								echo("<td>$row->fechaFin</td>");
								echo("<td><a title='Eliminar' href='include/servicio_disponibilidad'><button type='button' class='btn  btn-danger'><span class='glyphicon glyphicon-remove'</span></button></a></td>");
								echo ("\t</tr>\n");	
								echo"</form>\n";												//utiliza los valores de value
        						}
?>
					
					</table>
				</div>
			</div>
		</div>
