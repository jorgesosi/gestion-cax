<?
require("include/connect_db.php");

$id="0";
$nombre="";
$boton="nuevo";
$email="";
$domicilio="";
$apellido="";
$dni="";
$celular="";
$fijoDia="";
$fijoNoche="";
$fechaNacimiento="";
$password="";

if (isset($_GET['id'])){
	$id=$_GET['id'];
	$boton="Modificar";
	$query = 'select * from CAX.miembro where idmiembro="'.$id.'";';
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	$row=mysql_fetch_object($result);
	$nombre=$row->nombre;
	$email=$row->email;
	$domicilio=$row->domicilio;
	$apellido=$row->apellido;
	$dni=$row->dni;
	$celular=$row->celular;
	$fijoDia=$row->fijoDia;
	$fijoNoche=$row->fijoNoche;
	$fechaNacimiento=$row->fechaNacimiento;
	$password=$row->password;
}
?>
<html>
<head>
	<title> Comisión de Auxilio - Sistema de Gestion de Disponibilidad de Miembros de Auxilio  </title>
	
	<!-- Estas lineas necesita boostrap para funcionar, necesita incorporar estos archivos -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="js/bootstrap.min.js"></script>
</head>
<body>
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
					<li><a href="listadomiembro.php">Listado</a></li>
					<li><a href="formulario_miembro.php">Ingresar Nuevo</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li><form  class="navbar-form navbar-right" method="post" action="listadomiembro.php?go"> 
	     	 			<input  type="text" name="name" class="form-control" placeholder="Nombre o apellido"> 
	    	 			<input  type="submit" name="buscar" class="btn btn-danger" value="Buscar"> 
	   	 			</form> </li>
					<li><a href="index.html"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
				</ul>
			</nav>
		</div>
	</div>
		<div class="row"> <!--inicio primera fila-->
			<div class="col-md-12"> 	
				<h1> Pantalla de Formulario de Miembros</h1>
			</div>
		</div><!--fin primera fila-->
		<div class="col-md-2">
		</div>
			<div class="col-md-8"> 	
					<h3>Formulario de ingreso</h3>
			</div>
		<div class="col-md-2">
		</div>				
		<div class="row"> <!--inicio  fila  contenedora formulario-->
			<form class="form-horizontal" action="include/servicio_miembro.php" method="POST" name="miembro">
				<div class = "row">
					<div class="col-md-2">
					</div>
					<div class="col-md-8"> 	
						<div class="form-group">
		    				<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
		    					<div class="col-sm-10">

		      						<? echo("<input type='text' name='nombre' value='$nombre'>");
								echo ("<input type='hidden' name='id' value='$id'>"); ?>
		    					</div>
		  				</div>
		  			</div>	
		  			<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class ="col-md-8">
		  				<div class = "form-group">
		  					<label for="text" class="col-sm-2 control-label">Apellido</label>
			  					<div class="col-sm-10">
			    					<? echo("<input type='text' name='apellido' value='$apellido'>"); ?>
			    				</div>
			    		</div>
			    	</div>	
		    		<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class ="col-md-8">	
		    			<div class = "form-group">	
		    				<label for="text" class="col-sm-2 control-label">email</label>
			    				<div class="col-sm-10">
			    					<? echo("<input type='text' name='email' value='$email'>"); ?>
			    				</div>
		    			</div>
		    		</div>	
		    		<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class ="col-md-8">
						<div class = "form-group">
		    				<label for "text" class="col-sm-2 control-label">Domicilio</label>
		    				<div class="col-sm-10">
		    					<? echo("<input type='text' name='domicilio' value='$domicilio'>"); ?>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
		    		<div class ="col-md-8">
		    			<div class = "form-group">
		    				<label for "text" class="col-sm-2 control-label">D.N.I</label>
		    				<div class="col-sm-10">
		    					<? echo("<input type='text' name='dni' value='$dni'>"); ?>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class = "col-md-8">
		    			<div class = "form-group">
		    				<label for "text" class="col-sm-2 control-label">Celular</label>
		    				<div class="col-sm-10">
		    					<? echo("<input type='text' name='celular' value='$celular'>"); ?>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class = "col-md-8">
		    			<div class = "form-group">
		    				<label for "text" class="col-sm-2 control-label">Tel. Fijo dia</label>
		    				<div class="col-sm-10">
		    					<? echo("<input type='text' name='fijoDia' value='$fijoDia'>"); ?>
		    				</div>
		    			</div>
		    		</div>
		    		<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class = "col-md-8">
		    			<div class = "form-group">
		    				<label for "text" class="col-sm-2 control-label">Tel. Fijo noche</label>
		    				<div class="col-sm-10">
		    					<? echo("<input type='text' name='fijoNoche' value='$fijoNoche'>"); ?>
		    				</div>
		    			</div>
		    		</div>
				<div class="col-md-2">
					</div>
					<div class="col-md-2">
					</div>
					<div class = "col-md-8">
		    			<div class = "form-group">
		    				<label class="col-sm-2 control-label">Password</label>
		    				<div class="col-sm-10">
		    					<? echo("<input type='password' name='password' value='$password'>"); ?>
		    				</div>
		    			</div>
		    		</div><!--fin primera fila--><!--fila carga datos personales-->
				</div>		
	    		<div class = "row"><!--carga fila de categorias radio y checkbox-->
	    			<div class="col-md-12"> 	
						<h3>Categoria</h3>
					</div>
	    			 <div class = "col-md-2">
	    			</div>   			
	    			<div class ="form-group">
		    			<div class="radio-inline">
		  					<label>
		    					<input type="radio" name="inlineoptionsRadios" id="optionsRadios1" value="option1" checked>
		    					Activo	
		  					</label>
						</div>
						<div class="radio-inline">
		  					<label>
		    					<input type="radio" name="inlineoptionsRadios" id="optionsRadios2" value="option2" checked>
		    					Apoyo	
		  					</label>
						</div>
						<div class="radio-inline">
		  					<label>
		    					<input type="radio" name="inlineoptionsRadios" id="optionsRadios3" value="option3" checked>
		    					Aspirante	
		  					</label>
						</div>
					</div>
					
					<div class = "col-md-2">
					</div>
					
					<div>	
						<div class="checkbox-inline">
						 	<label class="checkbox-inline">
							 	<input type="checkbox" id="inlineCheckbox1" value="option1">Guardia
							</label>
							<label class="checkbox-inline">
							 	 <input type="checkbox" id="inlineCheckbox2" value="option2">Medico
							</label>
							<label class="checkbox-inline">
							  	<input type="checkbox" id="inlineCheckbox3" value="option3">Perro
							</label>
						</div>
	    			</div>
	    	</div>
	    	<div class = "row"><!--carga fila de habilidades-->
	    			<div class="col-md-12"> 	
						<h3>Habilidades</h3>
					</div>
					<div class="col-md-2">
					</div>
	    			<div class = "col-md-8">	
						<div class="checkbox-inline">
						 	<label class="checkbox-inline">
							 	<input type="checkbox" id="inlineCheckbox4" value="option1">roca
							</label>
							<label class="checkbox-inline">
							 	 <input type="checkbox" id="inlineCheckbox5" value="option2">hielo
							</label>
							<label class="checkbox-inline">
							  	<input type="checkbox" id="inlineCheckbox6" value="option3">esqui
							</label>
						 	<label class="checkbox-inline">
							 	<input type="checkbox" id="inlineCheckbox4" value="option1">cuerdas
							</label>
							<label class="checkbox-inline">
							 	 <input type="checkbox" id="inlineCheckbox5" value="option2">avalanchas
							</label>
							<label class="checkbox-inline">
							  	<input type="checkbox" id="inlineCheckbox6" value="option3">rios/kayak
							</label>
						</div>
	    			</div>
	    			<div class ="col-md-2">
	    			</div>
	    	</div>
	    	<div class="row">		
	    			<div class="form-group">    
	    				<div class="col-sm-offset-2 col-sm-10">
	      					<button type="submit" class="btn btn-default">Aceptar</button>

	    				</div>
	    				
	  				</div>
			</div>

			</form>	
		</div>	
	</div>
</body>
</html>
