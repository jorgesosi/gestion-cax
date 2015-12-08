<? session_start();
if (empty($_SESSION["id"]))
	header("Location: index.php");
?>


<html>

<head>
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
</head>
<body>
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
					<!--<li><a href="listadomiembro.php">Listado</a></li>-->
					
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<p class="navbar-text"><font color="red">Conectado como <? echo $_SESSION["nombre"]; echo " ";
					echo $_SESSION["apellido"]; ?></font> </p>
					<!--<li><a href='formulario_miembro.php?id=<?// echo $_SESSION["id"];?>'>Mis datos</a></li>-->
					<li><a href="ayuda.php"><span class="glyphicon glyphicon-question-sign"></span></a></li>
					<!--<li><form  class="navbar-form navbar-right" method="post" action="listadomiembro.php?go"> 
	     	 			<input  type="text" name="name" class="form-control" placeholder="Nombre o apellido"> 
	    	 			<input  type="submit" name="buscar" class="btn btn-danger" value="Buscar"> 
	   	 			</form> </li>-->
	   	 			
					<li><a href="include/sesion.php" ><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
				</ul>
				</div>
			</nav>
		</div>
	</div>
</div>	
<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h1 id="ayuda">Manual de Usuario</h1>
			<h1 id="gestión-cax">Gestión Cax</h1>
				<h2 id="descripción">Descripción</h2>
					<p>La aplicación muestra la información de los miembros que están disponibles para realizar una <strong>&quot;salida&quot;</strong> de la <strong>Comisión de Auxilio (CAX)</strong> del <strong>Club Andino Bariloche</strong>. Las diferentes pantallas permiten ver disponibilidad , datos personales y habilidades de otros miembros</p>
			<h1 id="guía-de-usuario">Guía de usuario</h1>
					<p>Permite visualizar información detallada de cada miembro de la comisión y modificación de los datos personales como también cargar las fechas o periodos de tiempos en los que se va a estar disponible.</p>
				<h2 id="usuariosmiembros">Usuarios/Miembros</h2>
					<p><strong>Usuarios</strong> son los miembros de la comisión de auxilio, activos , de apoyo y aspirantes, que hayan sido dados de alta en la base de datos por el **Usuario Administrador*. El mantenimiento, la edición de los datos y la disponibilidad estará a cargo de cada uno de los usuarios se puede consultar la información de otro usuarios en las diferentes pantallas.</p>
				<h2 id="usuarioadministrador">Usuario/Administrador</h2>
					<p><strong><em>El administrado/es</em></strong> cuentan con mayores privilegios. Tendrán a cargo la creación o altas y las bajas de los <strong><em>Usuarios</em></strong>. <strong><em>El administrador/es</em></strong> podrá modificar los datos de todos los usuarios.</p>
			<h1 id="vistas">Vistas</h1>
				<h2 id="pantalla-administrador">Pantalla Administrador</h2>
					<img class="img-responsive" src="img/list_admin.png" class="img-rounded" alt="admin" >
				<h2 id="crear-usuario-nuevo">Crear usuario nuevo</h2>
		
					 <img class="img-responsive" src="img/list_nuevo_admin.png" class="img-rounded" alt="nuevo" >
				<h2 id="usuario-creado">usuario creado</h2>
		
					<img class="img-responsive" src="img/list_crea_admin.png" class="img-rounded" alt="nuevo2" >
				<h2 id="pantalla-de-log-in-gestión-cax">Pantalla de Log-in (gestión-cax)</h2>
			
					<img class="img-responsive" src="img/login.png" class="img-rounded" alt="login" >
					<p>Contiene dos campos para colocar el nombre de *** usuario y la contraseña<strong><em>, el nombre de </em></strong>usuario*** sera el <em>e-mail registrados</em> en los listados de la CAX, la contraseña sera colocada por el <strong><em>Administrador</em></strong> y podrá ser cambiada por el <strong><em>Usuario</em></strong>.</p>
				<h2 id="botón-ingresar">Botón ingresar</h2>
					<p>Permite al usuario <strong><em>ingresar</em></strong> a la aplicación.</p>
				<h2 id="recuperación-de-contraseña">Recuperación de contraseña</h2>
					<p>Enviá la contraseña al <strong><em>e-mail registrado del usuario</em></strong>. En caso de que la dirección de correo sea <strong><em>incorrecta</em></strong> envía un mensaje de <strong><em>error</em></strong>.</p>
				<h2 id="primer-pantalla-de-usuario-nuevo">Primer Pantalla de Usuario Nuevo</h2>
		
					<img class="img-responsive" src="img/miem_inicial.png" class="img-rounded" alt="inicial" >
					<p>Se debe cambiar la contraseña primero, después completar todos los campos, si no se cambia la contraseña, los cambios agregados se perderán y se tendrán que llenar nuevamente</p>
				<h2 id="pantalla-de-inicio.">Pantalla de Inicio.</h2>
		
					<img class="img-responsive" src="img/ini.png" class="img-rounded" alt="inicio" >
					<p>Muestra la <strong>disponibilidad</strong> de hoy y mañana en la ventana principal y la barra de menú común a todas las pantallas Muestra dos tablas con los miembros disponibles hoy y mañana.</p>
				<h2 id="botón-ver-mas">Botón ver mas</h2>
					<p>Este botón lleva a la pantalla donde se visualizan los datos completos de la persona, Datos Personales, Categoría dentro del Grupo de la <strong>CAX</strong>, Habilidades.</p>
		
					<img class="img-responsive" src="img/miem_ver.png" class="img-rounded" alt="Ver mas" >
				<h2 id="búsqueda-por-disponibilidad">Búsqueda por disponibilidad</h2>
		
					<img class="img-responsive" src="img/ini_busc_norm.png" class="img-rounded" alt="busqcar dispo" >
					<p>Esta pantalla permita buscar miembros que estén disponibles en una fecha especifica, o en un periodo de fechas determinado por la búsqueda, si se coloca la fecha desde, se busca en un solo día especifico, si se completan las dos fechas muestra la disponibilidad en ese periodo de tiempo, si el usuario tiene aunque sea un día marcado como disponible en el periodo buscado lo va a mostrar en la tabla de la derecha, como muestra la imagen siguiente</p>
					<img class="img-responsive" src="img/ini_conf_busc.png" class="img-rounded" alt="busqueda" >
				<h2 id="resultado-de-búsqueda-por-disponibilidad">Resultado de búsqueda por disponibilidad</h2>
		
					
					<img class="img-responsive" src="img/ini_res_busc.png" class="img-rounded" alt="busqueda" >
				<h2 id="barra-de-menú">Barra de menú</h2>
				<ul>
					<li>Inicio: vuelve a la pantalla de inicio(disponibilidad)</li>
					<li>Listados(lleva al usuario al listado completo de miembros.</li>
					<li>Usuario Conectado (muestra el nombre y apellido del usuario que inicio la sesión)</li>
					<li>Mis Datos (Abre formulario de los <strong>datos personales</strong> permite la edición de datos y disponibilidad)</li>
					<li>Buscar(busca a un miembro por nombre o por apellido)</li>
					<li>Salir (cierra la sesión del usuario actual)</li>
				</ul>
				<h2 id="buscar-pantalla-usuario-administrador">Buscar (Pantalla Usuario Administrador)</h2>
	
				<img class="img-responsive" src="img/list_busc_admin.png" class="img-rounded" alt="buscar" >
				<p>Busca por <strong>nombre</strong> o <strong>apellido</strong>. Por categoría o por habilidades. Muestra la pantalla de <strong>Listado de Miembros</strong>. Donde se muestran todos los datos de la <strong>persona/miembro</strong> buscado Si el campo nombre o apellido esta vació, muestra todos los miembros, si selecciona alguna habilidad y/o categoría, buscara a las personas que cumplan con dicha busqueda. El campo &quot;nombre o apellido&quot; puede estar completo con una palabra o parte de una palabra y brindara un resultado con las palabras que contengan las letras determinadas.</p>

				 <h2>Buscar (Pantalla Usuario Normal)</h2>
			
				  <img class="img-responsive" src="img/list_busc_norm.png" class="img-rounded" alt="buscar" >
				<h2 id="pantalla-datos-personales-formulario-miembros">Pantalla Datos Personales (Formulario Miembros)</h2>
	
				<img class="img-responsive" src="img/miem_ed.png" class="img-rounded" alt="Personal" >
					<p>Muestra <strong>todos</strong> los datos de la persona, si el usuario esta <strong>&quot;logueado&quot;</strong> puede modificar solo sus datos personales, pudiendo cambiar la información de cada campo de <strong>texto checkbox, y optionbox</strong>.</p>
			<pre><code>Importante

			Los datos solo pueden ser editados por el miembro o por el administrador

			Para acceder a la edición de los datos personales se debe ingresar por la opción Mis Datos en la Barra de menú

			El administrador podrá asignar la categoría administrador a cualquier miembro en esta pantalla.

			Como se muestra en la siguiente imagen
			</code></pre>

				<img class="img-responsive" src="img/miem_ed_admin.png" class="img-rounded" alt="personal" >
				<p>Los campos de texto se colocaran todo los datos personales del usuario. Primer Pantalla de Datos Personales ------ [formulario personal] (img/miem_inicial.png?raw=true)</p>
				<h2 id="botón-disponibilidad">Botón disponibilidad</h2>
	
				<img class="img-responsive" src="img/disp_ver.png" class="img-rounded" alt="disponible" >
				<p>Muestra la pantalla de disponibilidad total de la persona Si se accede desde <strong><em>Mis Datos</em></strong> de la barra menú se accede a la posibilidad de editar disponibilidad </p>

					<img class="img-responsive" src="img/disp_edit.png" class="img-rounded" alt="disponible" >
				<p> Haciendo click en el campo de texto se despliega un calendario que comienza en la fecha de &quot;Hoy&quot;. y se podrá cargar el periodo de disponibilidad.</p>
				<img class="img-responsive" src="img/disp_nuevo.png" class="img-rounded" alt="disponible" >	
				<p>La categoría se carga en el formato de opciones, donde solo se podrá elegir <strong>una sola</strong> categoría</p>
				<h2 id="habilidades">Habilidades</h2>
				<p>Consiste en campos tipo checkbox donde pueden elegir <strong>varias</strong> habilidades</p>
				<h2 id="botón-aceptar">Botón aceptar</h2>
				<p>Envía los datos cargados o modificados a la <strong>Base de Datos</strong></p>
				<h2 id="pantalla-listado">Pantalla Listado</h2>
	
				<img class="img-responsive" src="list_norm.png" class="img-rounded" alt="listado" >
				<p>Muestra el listado de todos los miembros por nombre, apellido, domicilio, categoría, celular, teléfono fijo de día u de noche. botón disponibilidad: lleva a la pantalla disponibilidad total de la persona seleccionada botón editar <strong>(en el caso de que este habilitado)</strong> lleva a la pantalla de datos de la persona para poder editarlos o modificarlos.</p>
				<h2 id="pantalla-administrador-nuevo-usuario">Pantalla Administrador (nuevo usuario)</h2>
	
				<img class="img-responsive" src="list_crea_admin.png" class="img-rounded" alt="nuevo" >
				<p>Desde el botón que se crea a la derecha se genera un nuevo usuario. la característica es que solo crea el e-mail y un password, para que el usuario pueda ingresar por primera vez, cargue todos los datos necesarios.</p>	
					</div>
		<div class="col-md-2">
			<img class="img-responsive"src="img/logoComAux.jpg" id="img" width="150px" class="img-circle">
		</div>
	<div class="row">
		
		<div class="col-md-10">
			<h1>Creditos</h1>
			<h1 id="proyecto-gestión-cax-comisión-de-auxilio">Proyecto Gestión CAX ( Comisión de Auxilio )</h1>
			<h2 id="instituto-superior-capacitas.">Instituto Superior Capacitas.</h2>
			<p><strong>Carrera</strong>: Técnico Superior en Desarrollo de Sistemas.</p>
			<p><strong>Materia</strong>: Práctica Profesional 1 (2do año)</p>
			<p><strong>Año</strong> : 2015 <strong>Autores</strong>
			<p> Alumnos:<p>
			<ul>
				<li><p> Matías Lavanchi<p></li>
				<li><p> Jorge G. Sosinowicz.</p></li>
			</ul>
			<p>Docente:</p>
			<ul>	
				<li><p>Lucas Passalacqua</p></li>
			</ul>
		</div>
		<div class="col-md-2">
		</div>
	</div>
</div>	

</body>
</html>