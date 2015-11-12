<!-- La pantalla de Ingreso al sistema-->
<html>
<head>
	<title> Sistema de logueo  </title>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<!-- Estas lineas necesita boostrap para funcionar, necesita incorporar estos archivos -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<link type="text/css" href="css/inicio.css" rel="stylesheet" />
	<script src="js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
	<div class="row"> 
		<div class="col-med-12"> 	
			<h1> </h1>
		</div>
	</div>
	<div class="row"> 
		<div class="col-md-4"> 	
			
		</div>
		
		<div class="col-md-4" id="cuerpo"> 
			<? if (isset($_GET['msg'])){
			echo ('<div class="alert alert-warning alert-dismissable">');
  			echo ('<button type="button" class="close" data-dismiss="alert">&times;</button>');
  			echo ('<strong>¡AVISO!</strong> Clave enviada</div>');}
  			if (isset($_GET['mail'])){
			echo ('<div class="alert alert-warning alert-dismissable">');
  			echo ('<button type="button" class="close" data-dismiss="alert">&times;</button>');
  			echo ('<strong>¡AVISO!</strong> Correo incorrecto</div>');}

  			?>
			<form id="form-login" action="include/servicio_ingreso.php" method="post">
                    <p style="font-size:20px"><label >Usuario:</label></p>
                        <input name="usuario" type="text" id="usuario" placeholder="Ingresa Usuario"></p>
 
                    <p style="font-size:20px"><label>Password:</label></p>
                        <input name="contrasenia" type="password" id="contrasenia" placeholder="Ingresa Password"></p>
 						<? if (isset($_GET['error'])){
							echo ('<div class="alert alert-danger alert-dismissable">');
  							echo ('<button type="button" class="close" data-dismiss="alert">&times;</button>');
  							echo ('<strong>¡ERROR!</strong> Usuario/Contraseña incorrecto. </div>');}?>
			
                    <p id="bot"><input type="submit" id="submit" name="submit" value="Ingresar" class="boton"></p>
            </form>	
            <button type="button" data-toggle="collapse" data-target="#recupero">¿Olvidaste tu clave?</button>
            <div id="recupero" class="collapse">
        		<form action="include/recupero.php" method="post">
					<input name ="mail" type="text" placeholder="Ingresa mail">
					<input type="submit" id="submit" name="submit" value="Recuperar" class="boton">
				</form>
			</div>	

        
        
		</div>
		<div class="col-md-4"> 	

		</div>
	</div>	
	

</body>
</html>
