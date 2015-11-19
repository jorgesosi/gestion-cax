<? session_start();
if (empty($_SESSION["id"]))
	header("Location: index.php");
?>
<html>
<head>
	<title> Listado_de_Miembros</title>
<script language="JavaScript"> 
function pregunta(){
	var blnRespuesta=confirm('¿Desea eliminar todos los datos de su perfil?');
	return blnRespuesta;
}
</script> 
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Estas lineas necesita boostrap para funcionar, necesita incorporar estos archivos -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/bootstrap.min.js"></script>
</head>
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
					
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text"><font color="red">Conectado como <? echo $_SESSION["nombre"]; echo " ";
					echo $_SESSION["apellido"]; ?></font> </p>
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
	<!-- Botones y barra de busqueda-->
	<div class="row">
		<div class="col-md-2">
		</div>
		<div class="col-md-5">
			<form  class="form-group" method="post" action="listadomiembro.php?go"> 
	     	 	<input  type="text" name="name" class="form-control" placeholder="Nombre o apellido"> 
		</div>
		<div class="col-md-1">
			<input  type="submit" name="buscar" class="btn btn-primary btn-x" value="Buscar">
			</form>
		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-2">
			<?if ($_SESSION["permiso"]==1)
				echo("<a href='formulario_miembro.php'><button type='button' class='btn  btn-success btn-m'>Agregar +</button></a>");
			?>
		</div>
		<div class="col-md-1">
		</div>
	</div>
	<? if (isset($_GET['msg'])){
		echo ('<div class="alert alert-warning alert-dismissable">');
  		echo ('<button type="button" class="close" data-dismiss="alert">&times;</button>');
  		echo ('<strong>¡AVISO!</strong> Miembro eliminado. </div>');}?>
			<!-- Tabla-->
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<p></p><p></p>
			<table class="table table-condensed table-bordered table-striped" style="background-color:#ececec" >
				<!-- Datos de las tablas de prueba-->
				<tr><th>Apellido</th><th>Nombre</th><th>Celular</th>
					<th>Domicilio</th><th>Tel. Fijo Dia</th><th>Tel.Fijo Noche</th><th></th>
					<? if ($_SESSION["permiso"]==1)
						echo("<th></th><th></th><th></th>");

					?>
				</tr>
				<?
					require("include/connect_db.php");
					if (isset($_POST['buscar'])){
						$nombre=$_POST['name'];
						$query = 'SELECT * FROM CAX.miembro WHERE nombre LIKE "%'.$nombre.'%" OR apellido LIKE "%'.$nombre.'%";';}
					else {$query = 'SELECT * FROM CAX.miembro;';}
					$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 

				while ($row=mysql_fetch_object($result)){
					if ($row->nombre!="Root"){

					echo ("<tr><td><span class='glyphicon glyphicon-user'</span> $row->apellido</td>");
					echo ("<td>    $row->nombre</td>");
					echo("<td><span class='glyphicon glyphicon-earphone'></span> $row->celular </td>");
					echo("<td>$row->domicilio</td>");
					echo("<td>$row->fijoDia</td>");
					echo("<td>$row->fijoNoche</td>");
					echo("<td><a title='Ver disponibilidad' href='disponibilidad.php?idmiembro=$row->idmiembro'><button type='button' class='btn  btn-success'><span class='glyphicon glyphicon-ok'</span></button></a></td>");

					if ($_SESSION["permiso"]==1){
					echo("<td><a title='Editar' href='formulario_miembro.php?id=$row->idmiembro'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-pencil'</span></button></a></td>");
					echo("<td><a title='Eliminar' href='include/servicio_miembro.php?id1=$row->idmiembro'  onclick='return pregunta();>'");
					echo("<span class='glyphicon glyphicon-remove'> </span></a></td></tr>");
					} else echo("<td><a title='Ver mas' href='formulario_miembro.php?id=$row->idmiembro&ext'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-plus'</span></button></a></td>");


				} }?>

				<div class="col-md-1">
				</div>



			</table>
		</div>
	</div>
</div>
</body>
</html>
