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

		<div class="col-md-4">
			<form  class="form-group" method="post" action="listadomiembro.php?go"> 
	     	 	<input  type="text" name="name" class="form-control" placeholder="Nombre o apellido"> 
		</div>
		<div class="col-md-1">
				<!--se crean los downdrop para cargar las habilidades y las categoria
				para realizar una busqueda avanzada por categoria o pro habilidades -->
		  			
		  			<select class="selectpicker" name="categoria">
		    			<option value="categoria">categoria</option>
		    <?
		    			require("include/connect_db.php");
		    			$categoria='SELECT * FROM CAX.categoria;';
		    			$result = mysql_query($categoria) or die('Consulta fallida: ' . mysql_error()); 
		    			while ($row=mysql_fetch_object($result)){
		    				echo("<option value='$row->nombre'>$row->nombre</option>");
		    			}


		    ?>
		  			</select>
		</div>
		<div class="col-md-1">
				
					<select class="selectpicker" name="habilidades" >
		    			<option value="habilidades">habilidades</option>
		    			<?
		    			require("include/connect_db.php");
		    			$categoria='SELECT * FROM CAX.skill;';
		    			$result = mysql_query($categoria) or die('Consulta fallida: ' . mysql_error()); 
		    			while ($row=mysql_fetch_object($result)){
		    				echo("<option value='$row->nombre'>$row->nombre</option>");
		    			}
			?>
		  			</select>
		</div>	
		<div class="col-md-1">
			<input  type="submit" name="buscar" class="btn btn-primary btn-x" value="Buscar">
			</form>

		</div>
		<div class="col-md-1">
		</div>
		<div class="col-md-2">
			<?if ($_SESSION["permiso"]==1){?>
				
				<button type="button" data-toggle="collapse" data-target="#recupero" class='btn  btn-success btn-m'>Agregar miembro</button>
            	<div id="recupero" class="collapse">
        		<form action="include/servicio_miembro.php" method="post">
					<input name ="email" type="text" placeholder="Ingresa mail">
					<input name="password" type="hidden" value="cax1234">
					<input name="id" type="hidden" value="0">
					<input type="submit" name="submit" value="Crear" class='btn  btn-success btn-m 'class="boton">
				</form>
			</div>	
			<?}?>
		</div>
		<div class="col-md-1">
		</div>
	</div>
	<? if (isset($_GET['msg'])){
		echo ('<div class="alert alert-warning alert-dismissable">');
  		echo ('<button type="button" class="close" data-dismiss="alert">&times;</button>');
  		echo ('<strong>¡AVISO!</strong> Miembro eliminado. </div>');}?>
  	<? if (isset($_GET['msg1'])){
		echo ('<div class="alert alert-success alert-dismissable">');
  		echo ('<button type="button" class="close" data-dismiss="alert">&times;</button>');
  		echo ('<strong>¡AVISO!</strong> Nuevo miembro creado. </div>');}?>
  	<? if (isset($_GET['msg2'])){
		echo ('<div class="alert alert-warning alert-dismissable">');
  		echo ('<button type="button" class="close" data-dismiss="alert">&times;</button>');
  		echo ('<strong>¡Error!</strong> Email ya registrado </div>');}?>

			<!-- Tabla-->
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<p></p><p></p>
			<table class="table table-condensed table-bordered table-striped" style="background-color:#ececec" >
				<!-- Datos de las tablas de prueba-->
				<tr><th>Apellido</th><th>Nombre</th><th>Celular</th>
					<th>Domicilio</th><th>Tel. Fijo Dia</th><th>Tel.Fijo Noche</th><th>Email</th><th></th>
					<? if ($_SESSION["permiso"]==1)
						echo("<th></th><th></th>");

					?>
				</tr>
				<?
					/*require("include/connect_db.php"); //este codigo lo reemplace por el que esta debajo
					if (isset($_POST['buscar'])){
						$nombre=$_POST['name'];
						$query = 'SELECT * FROM CAX.miembro WHERE nombre LIKE "%'.$nombre.'%" OR apellido LIKE "%'.$nombre.'%";';}
					else {$query = 'SELECT * FROM CAX.miembro;';}
					$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); */
					require("include/connect_db.php");
					if (isset($_POST['buscar'])){
						$nombre=$_POST['name'];
						$query = 'SELECT * FROM CAX.miembro WHERE miembro.nombre LIKE "%'.$nombre.'%" OR apellido LIKE "%'.$nombre.'%";';
					if(isset($_POST['categoria'])){
						$categoria=$_POST['categoria'];	
						if ($categoria=="categoria"){
							$query = 'SELECT * FROM CAX.miembro WHERE miembro.nombre LIKE "%'.$nombre.'%" OR apellido LIKE "%'.$nombre.'%";';
							if(isset($_POST['habilidades'])){
								$habilidades=$_POST['habilidades'];
								}if($habilidades=="habilidades"){
									$query = 'SELECT * FROM CAX.miembro WHERE miembro.nombre LIKE "%'.$nombre.'%" OR apellido LIKE "%'.$nombre.'%";';
								}else
									$query='SELECT distinctrow miembro.idcategoria, miembro.nombre,miembro.domicilio,miembro.fijoDia,miembro.fijoNoche,miembro.apellido, miembro.celular, miembro.idmiembro, miembro.email from CAX.miembro, CAX.miembro_skill, CAX.skill where (miembro.nombre LIKE "%'.$nombre.'%" OR miembro.apellido LIKE "%'.$nombre.'%") AND miembro.idmiembro = miembro_skill.idmiembro and miembro_skill.idskill = skill.idskil and skill.nombre="'.$habilidades.'";';
						}else{
						$query='SELECT * FROM CAX.categoria, CAX.miembro WHERE (miembro.nombre LIKE "%'.$nombre.'%" OR miembro.apellido LIKE "%'.$nombre.'%") AND (categoria.nombre = "'.$categoria.'" )AND (categoria.idcategoria = miembro.idcategoria);';
						if(isset($_POST['habilidades'])){
							$habilidades=$_POST['habilidades'];
							if($habilidades!=="habilidades")
								$query='SELECT distinctrow miembro.idcategoria, miembro.nombre,miembro.domicilio,miembro.fijoDia,miembro.fijoNoche,miembro.apellido, miembro.celular, miembro.idmiembro, miembro.email from CAX.miembro, CAX.miembro_skill, CAX.skill, CAX.categoria where (miembro.nombre LIKE "%'.$nombre.'%" OR miembro.apellido LIKE "%'.$nombre.'%") AND (miembro.idmiembro = miembro_skill.idmiembro and miembro_skill.idskill = skill.idskil and skill.nombre="'.$habilidades.'") AND (categoria.nombre = "'.$categoria.'" )AND (categoria.idcategoria = miembro.idcategoria) ;';
						}
						}	
					}
					}else {$query = 'SELECT * FROM CAX.miembro;';
					}
					$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error()); 


				while ($row=mysql_fetch_object($result)){
					

					
					if ($_SESSION["permiso"]==1){
					echo ("<tr><td><span class='glyphicon glyphicon-user'</span> $row->apellido</td>");
					echo ("<td>    $row->nombre</td>");
					echo("<td><span class='glyphicon glyphicon-earphone'></span> $row->celular </td>");
					echo("<td>$row->domicilio</td>");
					echo("<td>$row->fijoDia</td>");
					echo("<td>$row->fijoNoche</td>");
					echo("<td>$row->email</td>");
					echo("<td><a title='Editar' href='formulario_miembro.php?id=$row->idmiembro'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-pencil'</span></button></a></td>");
					echo("<td><a title='Ver disponibilidad' href='disponibilidad.php?idmiembro=$row->idmiembro'><button type='button' class='btn  btn-success'><span class='glyphicon glyphicon-ok'</span></button></a></td>");
					echo("<td><a title='Eliminar' href='include/servicio_miembro.php?id1=$row->idmiembro'  onclick='return pregunta()'>");
					echo("<span class='glyphicon glyphicon-remove'> </span></a></td></tr>");


					} else {if ($row->nombre!="Root")
								if ($row->idcategoria!=0){
									echo ("<tr><td><span class='glyphicon glyphicon-user'</span> $row->apellido</td>");
									echo ("<td>    $row->nombre</td>");
									echo("<td><span class='glyphicon glyphicon-earphone'></span> $row->celular </td>");
									echo("<td>$row->domicilio</td>");
									echo("<td>$row->fijoDia</td>");
									echo("<td>$row->fijoNoche</td>");
									echo("<td>$row->email</td>");
									echo("<td><a title='Ver disponibilidad' href='disponibilidad.php?idmiembro=$row->idmiembro'><button type='button' class='btn  btn-success'><span class='glyphicon glyphicon-ok'</span></button></a></td>");
									echo("<td><a title='Ver mas' href='formulario_miembro.php?id=$row->idmiembro&ext'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-plus'</span></button></a></td>");
								}

				} }?>

				<div class="col-md-1">
				</div>



			</table>
		</div>
	</div>
</div>
</body>
</html>
