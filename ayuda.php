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
					<li><a href="guardia.php">Guardia</a></li>
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
			<h1>Manual de Usuario</h1>
			<h1 id="gestión-cax">Gestión Cax</h1>
	<h2 id="descripción">Descripción</h2>
		<p>La aplicación muestra la información de los miembros que están disponibles para realizar una <strong><em>&quot;salida&quot;</em></strong> de la <strong><em>Comisión de Auxilio (CAX)</em></strong> <strong><em>Club Andino Bariloche</em></strong>. Las diferentes pantallas permiten ver disponibilidad , datos personales y habilidades de otros miembros</p>
<h1 id="guía-de-usuario">Guía de usuario</h1>
		<p>Permite visualizar información detallada de cada miembro de la comisión y modificación de los datos personales como también cargar las fechas o periodos de tiempos en los que se va a estar disponible.</p>
	<h2 id="usuariosmiembros">Usuarios/Miembros</h2>
		<p><strong>Usuarios</strong> son los miembros de la comisión de auxilio, activos , de apoyo y aspirantes, que hayan sido dados de alta en la base de datos por el Usuario Administrador. El mantenimiento, la edición de los datos y la disponibilidad estará a cargo de cada uno de los usuarios se puede consultar la información de otro usuarios en las diferentes pantallas.</p>
	<h2 id="usuarioadministrador">Usuario/Administrador</h2>
	<p><strong><em>El administrado/es</em></strong> cuentan con mayores privilegios. Tendrán a cargo la creación o altas y las bajas de los <strong><em>Usuarios</em></strong>. <strong><em>El administrador/es</em></strong> podrá modificar los datos de todos los usuarios.</p>
<h1 id="vistas">Vistas</h1>
	<h2 id="pantalla-de-log-in-gestión-cax">Pantalla de Log-in (gestión-cax)</h2>
<p></p>
<p></p>
	<img class="img-responsive" src="img/login.png" class="img-rounded" alt="login" >
		<p>Contiene dos campos para colocar el nombre de  <strong><em>usuario y la contraseña</em></strong>, el nombre de <strong><em>usuario</em></strong> sera el <strong><em>e-mail registrado</em></strong> en los listados de la CAX, la contraseña sera colocada por el <strong><em>Administrador</em></strong> y podrá ser cambiada por el <strong><em>Usuario</em></strong>.</p>
	<h2 id="botón-ingresar">Botón ingresar</h2>
		<p>Permite al usuario <strong><em>ingresar</em></strong> a la aplicación.</p>
	<h2 id="recuperación-de-contraseña">Recuperación de contraseña</h2>
		<p>Enviá la contraseña al <strong><em>e-mail registrado del usuario</em></strong>. En caso de que la dirección de correo sea <strong><em>incorrecta</em></strong> envía un mensaje de <strong><em>error</em></strong>.</p>
	<h2 id="pantalla-de-usuario-nuevo">Pantalla de Usuario Nuevo</h2>
	<p></p>
	<p></p>
	<img class="img-responsive" src="img/miem_inicial.png" class="img-rounded" alt="inicial" >
	
		<p>Es la primer pantalla que encuentra un usuario nuevo, donde debe cargar sus datos personales, <strong><em>Se debe cambiar la contraseña primero</em></strong>,para luego completar todos los campos. Si no se cambia la contraseña, los datos agregados se perderán y se tendrán que llenar nuevamente. El alta como usuario del sistema Gestión Cax, se realiza después de haber completado los datos de este formulario, que posteriormente se accederá desde el menu <strong><em>Mis Datos.</em></strong></p>
	<h2 id="pantalla-de-inicio.">Pantalla de Inicio.</h2>
	<p></p>
	<p></p>
	<img class="img-responsive" src="img/ini.png" class="img-rounded" alt="incio">

		<p>Es la pantalla que recibe al usuario cada ves que ingrese al sistema luego de haber confirmado el alta. Muestra la <strong><em>disponibilidad</em></strong> de hoy y mañana en la ventana principal y la barra de menú común a todas las pantallas Muestra dos tablas con los miembros disponibles hoy y mañana. Se pueden ver dos campos Desde y Hasta y dos botones, Buscar y Alerta Mail.</p>
	<h2 id="búsqueda-botón-buscar">Búsqueda (Botón Buscar)</h2>
		<p>Búsqueda por disponibilidad</p>
	<p></p>
	<p></p>
	<img class="img-responsive" src="img/ini_busqc_norm.png" class="img-rounded" alt="busqueda">
		<p>Existen dos campos para realizar búsquedas, el primer campo DESDE, permite la búsqueda en un día especifico.</p>
		<p>Campo Hasta, este campo puede estar en blanco, pero si se completa, se hace una combinación de las dos fechas y se buscara a todos los miembros que estén disponibles en ese periodo de tiempo, este tipo de búsqueda no es exacta, como buscar por un solo día, si el periodo es muy largo puede generar resultados inexactos.</p>
	<h2 id="resultado-de-búsqueda-por-disponibilidad">Resultado de búsqueda por disponibilidad</h2>
	<p></p>
	<p></p>
	<img class="img-responsive" src="img/ini_conf_busc.png" class="img-rounded" alt="">
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/ini_res busc.png" class="img-rounded" alt="">

	<h2 id="alerta-mail-botón">Alerta Mail (Botón)</h2>
		<p>Al hacer clic en este botón se envía un mensaje a los usuarios que figuran en el listado de disponibles hoy, con los teléfonos SMART se puede tener acceso a cualquier cuenta de mail, solo con configurarla y mantenerla sincronizada.</p>
	<h2 id="botón-ver-mas">Botón ver mas</h2>
		<p>Este botón lleva a la pantalla donde se visualizan los datos completos de la persona, Datos Personales, Categoría dentro del Grupo de la <strong>CAX</strong>, Habilidades.</p>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/miem_ver.png" class="img-rounded" alt="">	

	<h2 id="pantalla-administrador">Pantalla Administrador</h2>
		<p>Los usuarios administradores son los responsables de dar de alta a nuevos miembros, esto se realiza a través de un mail proporcionado por cada uno a dicho administrador. Se resuelve este método para tener el control de los miembros que accederán al sistema.</p>
			<p></p>
	<p></p>
	<img class="img-responsive" src="img/List_admin.png" class="img-rounded" alt="">

	<h2 id="crear-usuario-nuevo">Crear usuario nuevo</h2>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/list_nuevo_admin.png" class="img-rounded" alt="">

	<h2 id="usuario-creado">usuario creado</h2>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/list_crea_admin.png" class="img-rounded" alt="">
	<h2 id="barra-de-menú">Barra de menú</h2>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/menu.png" class="img-rounded" alt="">

	<ul>
		<li>Inicio: vuelve a la pantalla de inicio(disponibilidad)</li>
		<li>Listados(lleva al usuario al listado completo de miembros.</li>
		<li>Guardia, abre el formulario de los miembros de guardia, mensuales y anuales</li>
		<li>Usuario Conectado (muestra el nombre y apellido del usuario que inicio la sesión)</li>
		<li>Mis Datos (Abre formulario de los <strong>datos personales</strong> permite la edición de datos y disponibilidad)</li>
		<li>icono ? de ayuda, abre la pantalla de manual de usuario</li>
		<li>Buscar(busca a un miembro por nombre o por apellido)</li>
		<li>Salir (cierra la sesión del usuario actual)</li>
	</ul>
	<h2 id="buscar-pantalla-usuario-administrador">Buscar (Pantalla Usuario Administrador)</h2>
		<p></p>
	<p></p>
	<img class="img-responsive" src="imglist_busc_admin/.png" class="img-rounded" alt="">

	<p>Busca por <strong>nombre</strong> o <strong>apellido</strong>. Por categoría o por habilidades. Muestra la pantalla de <strong>Listado de Miembros</strong>. Donde se muestran todos los datos de la <strong>persona/miembro</strong> buscado Si el campo nombre o apellido esta vació, muestra todos los miembros, si selecciona alguna habilidad y/o categoría, buscara a las personas que cumplan con dicha búsqueda. El campo &quot;nombre o apellido&quot; puede estar completo con una palabra o parte de una palabra y brindara un resultado con las palabras que contengan las letras determinadas.</p>
	<h2> Buscar (Pantalla Usuario Normal)</h2>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/list_busc_norm.png" class="img-rounded" alt="">
	
	<h2 id="pantalla-datos-personales-formulario-miembros">Pantalla Datos Personales (Formulario Miembros)</h2>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/miem_ed.png" class="img-rounded" alt="">
	
		<p>Muestra <strong>todos</strong> los datos de la persona, si el usuario esta <strong>&quot;logueado&quot;</strong> puede modificar solo sus datos personales, pudiendo cambiar la información de cada campo de <strong>texto y menúes desplegables</strong>. se puede cargar y editar los menúes de: menu habilidades</p>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/miem_ed_Hab.png" class="img-rounded" alt="">
	
		<h3 id="menu-categoría">menu categoría</h3>
	<p></p>
	<p></p>
	<img class="img-responsive" src="img/miem_ed_cat.png" class="img-rounded" alt="">
	
		<h3 id="menu-de-guardia-en-caso-de-ser-miembro-de-guarida">menu de guardia ( en caso de ser miembro de <strong><em>Guarida</em></strong></h3>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/miem_ed_guardia.png" class="img-rounded" alt="">
	
		<pre><code>Importante

		Los datos solo pueden ser editados por el miembro o por el administrador

		Para acceder a la edición de los datos personales se debe 

		ingresar por la opción Mis Datos en la Barra de menú

		El administrador podrá asignar la categoría administrador a cualquier miembro en esta pantalla.

		Como se muestra en la siguiente imagen</code></pre>
	<h2 id="botón-disponibilidad">Botón disponibilidad</h2>
		<p>Abre la pantalla de disponibilidad</p>
	<h2 id="botón-aceptar">Botón aceptar</h2>
		<p>Envía los datos cargados o modificados a la <strong>Base de Datos</strong></p>
	<h2 id="pantalla-disponibilidad">Pantalla Disponibilidad</h2>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/disp_ver.png" class="img-rounded" alt="">

		<p>Muestra la pantalla de disponibilidad de la persona Si se accede desde <strong><em>Mis Datos</em></strong> de la barra menú se accede a la posibilidad de editar disponibilidad En esta pantalla se puede seleccionar el tipo de disponibilidad acorde a cada necesidad. dentro de las posibilidades esta la opción de disponible, no disponible, o no definido (por defecto). dentro de disponibilidad si se seleccionan fechas de no disponibilidad, se cambia de full-time a part-time. En el caso de que la disponibilidad esta seteada en part-time, y se la cambia a full-time, se borran los datos de no disponibilidad. El propósito de este método es que cada usuario decida si va a marcarse como disponible o no disponible o que cargue los periodos en los que sabe que no va a estar. en el caso de marcar la opción de no disponible, este estado se mantiene hasta que el usuario cambie su estado a disponible. en caso de búsqueda por disponibilidad, no aparecerá su nombre.</p>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/disp_edit.png" class="img-rounded" alt="">
		
		<p>Haciendo click en el campo de texto se despliega un calendario que comienza en la fecha de &quot;Hoy&quot;. y se podrá cargar el periodo de <strong><em>No disponibilidad.</em></strong></p>
<h1 id="pantalla-guardia">Pantalla Guardia</h1>
		<p>Esta pantalla muestra dos listas donde se pueden ver los miembros que están de guardia en el mes en curso y otra lista que muestra los miembros que están de guardia durante todo el año, estos datos se cambien desde le formulario de <strong><em>Mis Datos</em></strong>, el alta o baja de este listado estará a cargo del usuario o de algún administrador del sistema</p>
			<p></p>
	<p></p>
	<img class="img-responsive" src="img/guardia.png" class="img-rounded" alt="">

	<h2 id="pantalla-listado">Pantalla Listado</h2>
		<p></p>
	<p></p>
	<img class="img-responsive" src="img/list_norm.png" class="img-rounded" alt="">

		<p>Muestra el listado de todos los miembros por nombre, apellido, domicilio, categoría, celular, teléfono fijo de día u de noche. botón disponibilidad: lleva a la pantalla disponibilidad total de la persona seleccionada botón editar <strong>(en el caso de que este habilitado)</strong> lleva a la pantalla de datos de la persona para poder editarlos o modificarlos.</p>
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