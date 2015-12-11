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
		<!--estas lines incorporan los archivos necesarios para el datepicker -->
	<meta charset="utf-8" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script src="js/jquery-1.9.1.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- funcion para dar formato al text de la fecha -->
    <script>
    $(function() {
        $(".fecha").datepicker(
            {
                dateFormat: "yy/mm/dd",
                dayNames: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
                dayNamesMin: [ "Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa" ],
                firstDay: 1,
                gotoCurrent: true,
                monthNames: [ "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre" ],
                monthNamesShort:["Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep", "Oct","Nov","Dic"],
                minDate: "D",
                maxDate: "+30Y" ,
                prevText: '&#x3c;&#x3c;Ant', 
        		prevStatus: '',
        		prevJumpText: '&#x3c;&#x3c', 
        		prevJumpStatus: '',
        		nextText: 'Sig&#x3e;&#x3e', 
        		nextStatus: '',
        		nextJumpText: '&#x3e;&#x3e', 
        		nextJumpStatus: '',
        		changeMonth: true ,
        		changeYear:true,
        		numberOfMonths:3
            }
        );
    });
    </script>
    <script>
	function funcionNuevo(){
		var ini=document.getElementById('desde').value;
		var fin=document.getElementById('hasta').value;
		if(ini==''|| fin==''){
			alert("Fechas Vacias");
			return false;
		}else if(confirm("Los Datos Desde: "+ini+" y Hasta: "+fin+" Seran Enviados")==true)
				return true;
			else
				return false;

					
    }
	</script>
	<script>
		function funcionEliminar() {
		var ini=document.getElementById('desde').value;
		var fin=document.getElementById('hasta').value;					
    		if (confirm("Desea Eliminar Estas Fechas")==true)
    			return true;
    		else
    			return false;
    	}
	</script>

    <style>
        #fecha {width:100px;text-align:center;}
    </style>


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
					
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text"><font color="red">Conectado como <? echo "$_SESSION[nombre]"; echo " ";
					echo "$_SESSION[apellido]"; ?></font> </p>
					<li><a href='formulario_miembro.php?id=<? echo $_SESSION["id"];?>'>Mis datos</a></li>
					<li><a href="ayuda.php"><span class="glyphicon glyphicon-question-sign"></span></a></li>
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
			 <div class="panel-group">
			    <div class="panel panel-primary">
<?  
	if(isset($_GET['idmiembro'])){
		$id=$_GET['idmiembro'];
		$query="SELECT nombre,apellido,iddispo FROM CAX.miembro where idmiembro ='".$id."';";
		$resultado=mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		$fila = mysql_fetch_object($resultado);
		$iddisp=$fila->iddispo;
}?>
	
			     	<div class="panel-heading"><?echo('<p><h1>Estado</h1><h4>Datos de Usuario:'.$fila->nombre.' '.$fila->apellido.'</h4></p>');?></div>
			     	<div class="panel-body"></div>
			     	<p> <strong>Debe  seleccionar un estado</strong> <br>
			     		Si su estado es disponible puede<strong> seleccionar fechas<br>
			     		 en la que no va estar disponible</strong> carguelas en al cuadro de abajo<br></p>
			     		 <?
						if(isset($_POST['Cambiar'])){
							echo ('<div class="alert alert-success alert-dismissable">');
  							echo ('<button type="button" class="close" data-dismiss="alert">&times;</button>');
  							echo ('<strong>¡AVISO!</strong><strong>');
  						}
			     		 if ($_SESSION["permiso"]==1  || isset($_GET["owner"])){//Se cargan los checkboxs para la disponibilidad
			     			if (isset($_GET["owner"]))
			     				echo('<form class="form-horizontal" action="include/servicio_miembro.php?idmiembro='.$id.'" method="POST" name="diponibilidad">');
			     	 		else //Se cargan los checkboxs para la disponibilidad
			     				echo('<form class="form-horizontal" action="include/servicio_miembro.php?idmiembro='.$id.'" method="POST" name="diponibilidad">');?>
			     	<input type="radio" name="iddisponibilidad" value="1" id="disp"<?if ($iddisp==1)echo ('checked')?>>
		    		Disponible
		    		<input type="radio" name="iddisponibilidad"  value="2" id="nodisp"<?if ($iddisp==2)echo ('checked')?>>
		    		No Disponible
		    		<input type="radio" name="iddisponibilidad"  value="0" id="nodef"<?if ($iddisp==0)echo ('checked')?>>
		    		No definido
		    		<input  type="submit" name="cambiar" class="btn btn-danger" value="Cambiar"> 
		    	<?} else{?>
		    		<form>
		    		<input type="radio" disabled='disabled' name="iddisponibilidad" value="1" <?if ($iddisp==1)echo ('checked')?>>
		    		Disponible
		    		<input type="radio" disabled='disabled' name="iddisponibilidad"  value="2" <?if ($iddisp==2)echo ('checked')?>>
		    		No Disponible
		    		<input type="radio" disabled='disabled' name="iddisponibilidad"  value="0" <?if ($iddisp==0)echo ('checked')?>>
		    		No Definido
		    		<?}?>
			     	
			     </form>
			    </div>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h1>No Disponibilidad</h1>
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
			<?  $query="SELECT nombre,apellido FROM CAX.miembro where idmiembro ='".$id."';";
				$resultado=mysql_query($query) or die('Consulta fallida: ' . mysql_error());
				$fila = mysql_fetch_object($resultado)?>
				<?echo('<tr><th> '.$fila->nombre.' '.$fila->apellido.'</th></tr>')?>
				<?if ($_SESSION["permiso"]==1  || isset($_GET["owner"])){?>
				<tr><th>Desde AA/MM/DD</th><th>hasta AA/MM/DD </th><th></th><th>Nuevo</th></tr>
				<form action='include/servicio_disponibilidad.php' method='POST'>  
				<tr>
    			<td><p><input type='text' name='desde' id='desde'class='fecha'value=''></input></p></td>
				<td><p><input type='text' name='hasta' id='hasta'class='fecha'value=''></input></p></td>
				<td><p><input type='hidden'name='idmiembro'value=<?php echo$id?> size='1px'></input></p></td>
				<td><p><button type='submit'class='btn btn-success'name='Nuevo' value='Nuevo'onclick='return funcionNuevo()'>Nuevo</button></p></td>
				<!--<td><a title='Ver mas' href='include/servicio_disponibilidad.php'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-plus'</span></button></a></td>-->
				</tr>
				</form>
				<?}?>
				</table>

				<table class="table table-condensed table-bordered table-striped" style="background-color:#ececec" >
						<!-- Datos de las tablas de disponibilidad crea los encabezados-->
				<tr><th>Desde</th><th>hasta</th>
					<?if ($_SESSION["permiso"]==1 || isset($_GET["owner"]))
					echo("<th>Eliminar</th></tr>");?>
						<!--el while arma la tabla de disponivilidad de cada miembro-->
<?
				while ($row = mysql_fetch_object($result))  {
						echo"<form action='../disponibilidad.html' method='POST'>\n"; //se crea un form  	
						echo "\t<tr class='danger'>\n";//por cada iteracion de busqueda de la fila en la base de datos
    					echo("<td>$row->fechaInicio</td>");
						echo("<td>$row->fechaFin</td>");
						if ($_SESSION["permiso"]==1  || isset($_GET["owner"])){?>
						<td><a title='Eliminar' href='include/servicio_disponibilidad.php?idmiembro=<?echo($row->idmiembro);?>&ext&iddisp=<?echo($row->iddisponibilidad);?>'><button type='button' class='btn  btn-danger' onclick='return funcionEliminar()' ><span class='glyphicon glyphicon-remove'</span></button></a></td>
						<?}?>
						</tr>	
						</form>												
        				<?}?>
        		
					
						</table>
					</div>
				</div>
			</div>
		</div>
	
</body>
</html>