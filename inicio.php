<? session_start();
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
    <style>
        #fecha {width:100px;text-align:center;}
    </style>
    <script>
	function funcionNuevo(){
		var ini=document.getElementById('desde').value;
		var fin=document.getElementById('hasta').value;
		if(ini==''){
			alert("Fechas Vacias");
			return false;
		}else if(fin==''){
			fin=ini;
		}
		if(confirm("La Busqueda Desde: "+ini+" y Hasta: "+fin+" Sera Enviada")==true)
				return true;
			else
				return false;
    }
    </script>
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
					<p class="navbar-text"><font color="red">Conectado como <? echo $_SESSION["nombre"]; echo " ";
					echo $_SESSION["apellido"]; ?></font> </p>
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
<?
/*conexion a  la BD y query para mostrar disponble hoy y manana*/
require("include/connect_db.php");
$today ="select miembro.idmiembro, nombre, apellido, celular from CAX.miembro, CAX.disponibilidad where miembro.idmiembro = disponibilidad.idmiembro and  curdate()  between fechaInicio and fechaFin;";
$tomorrow="select miembro.idmiembro, nombre, apellido, celular from CAX.miembro,CAX.disponibilidad where miembro.idmiembro = disponibilidad.idmiembro and  curdate()+1  between fechaInicio and fechaFin;";
?>
	<div class="row">
		<div class="col-md-2">
				<form class="form-group" action='inicio.php' method='POST'>
		</div>
		<div class="col-md-2">
				<label  class="col-sm-2 control-label">Desde </label>
			<p><input type='text' name='desde' id='desde'class='fecha'value=''></input></p>
		</div>
		<div class="col-md-2">
			<label  class="col-sm-2 control-label">hasta </label><br>
			<p><input type='text' name='hasta' id='hasta'class='fecha'value=''></input></p>
		</div>
		<div class="col-md-2">
			<p></p><p></p><p></p><!--area para cargar datos de busqueda -->
				<p><button type='submit'class='btn btn-success'name='buscar' value='buscar'onclick='return funcionNuevo()'>Buscar</button></p>
		</div>
		<div class =col-md-2>
			</form>
		</div>
		
				<!--<td><a title='Ver mas' href='include/servicio_disponibilidad.php'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-plus'</span></button></a></td>-->
	</div>
	
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-5">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h1>Disponibles hoy</h1>
				</div>
				<div class="panel-body">
					<p></p><p></p>
					<table class="table table-condensed table-bordered table-striped" style="background-color:#ececec" >
						<!-- cabecera de la tabla de hoy-->
						<tr><th>Apellido</th><th>Nombre</th><th>Celular</th><th></th>
						</tr>
<?
/*codigo para cargar los datos en la tabla de hoy*/
$result=mysql_query($today) or die('Consulta fallida: ' . mysql_error());
while ($row = mysql_fetch_object($result))  {
								if ($row->nombre!="Root"){
								echo "\t<tr class='danger'>\n";//por cada iteracion de busqueda de la fila en la base de datos
    							echo("<tr class='danger'><td><span class='glyphicon glyphicon-user'</span> $row->apellido</td>");
								echo("<td>$row->nombre</td>");
								echo("<td><span class='glyphicon glyphicon-earphone'></span>$row->celular </td>");
								echo("<td><a title='Ver mas' href='formulario_miembro.php?id=$row->idmiembro&ext'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-plus'</span></button></a></td>");
								echo ("\t</tr>\n");
							}
        						}
?>
					</table>
				</div>
			</div>
		</div>
		<!-- Segunda Tabla-->

		<div class="col-md-5">
			<div class="panel panel-success">
				<div class="panel-heading">
					<?if(isset($_POST['buscar'])){
						$desde=$_POST['desde'];
						$hasta=$_POST['hasta'];
						$buscar="select miembro.idmiembro, nombre, apellido, celular from CAX.miembro, CAX.disponibilidad where miembro.idmiembro = disponibilidad.idmiembro and ( ('".$desde."'  between fechaInicio and fechaFin)or('".$hasta."'between fechaInicio and fechaFin));";
						echo"<h2>Disponibles Desde:".$desde."<br>hasta: ".$hasta."</h2>";
					?>
					</div>
					<div class="pannel -body">
					<p></p><p></p>
					<table class="table table-condensed table-bordered table-striped" style="background-color:#ececec" >
						<!-- cabecera de la tabla de manana-->
						<tr><th>Apellido</th><th>Nombre</th><th>Celular</th><th></th></tr>
					<?
					/*codigo para cargar los datos en la tabla de manana*/
							$result=mysql_query($buscar) or die('Consulta fallida: ' . mysql_error());
						while ($row = mysql_fetch_object($result))  {
								if ($row->nombre!="Root"){
								echo "\t<tr class='danger'>\n";//por cada iteracion de busqueda de la fila en la base de datos
    							echo("<tr class='danger'><td><span class='glyphicon glyphicon-user'</span> $row->apellido</td>");
								echo("<td>$row->nombre</td>");
								echo("<td><span class='glyphicon glyphicon-earphone'></span>$row->celular </td>");
								echo("<td><a title='Ver mas' href='formulario_miembro.php?id=$row->idmiembro&ext'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-plus'</span></button></a></td>");
								echo ("\t</tr>\n");
							}
        				}


					}else{
					echo"<h1>Disponibles mañana</h1>";
					?>
					</div>
					<div class="pannel -body">
					<p></p><p></p>
					<table class="table table-condensed table-bordered table-striped" style="background-color:#ececec" >
						<!-- cabecera de la tabla de manana-->
						<tr><th>Apellido</th><th>Nombre</th><th>Celular</th><th></th></tr>
					<?
					/*codigo para cargar los datos en la tabla de manana*/
							$result=mysql_query($tomorrow) or die('Consulta fallida: ' . mysql_error());
						while ($row = mysql_fetch_object($result))  {
								if ($row->nombre!="Root"){
								echo "\t<tr class='danger'>\n";//por cada iteracion de busqueda de la fila en la base de datos
    							echo("<tr class='danger'><td><span class='glyphicon glyphicon-user'</span> $row->apellido</td>");
								echo("<td>$row->nombre</td>");
								echo("<td><span class='glyphicon glyphicon-earphone'></span>$row->celular </td>");
								echo("<td><a title='Ver mas' href='formulario_miembro.php?id=$row->idmiembro&ext'><button type='button' class='btn  btn-info'><span class='glyphicon glyphicon-plus'</span></button></a></td>");
								echo ("\t</tr>\n");
							}
        				}
}?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-1">
		</div>




	</div>
</div>

</body>
</html>
