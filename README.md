# gestion-cax
sistema de gestion de la Comision de Auxilio del Club Andino Bariloche

Gestiona la disponibilidad de miembros de restacate

1) ABM de miembros, donde se muestre datos personales, de tipo y especialidad.

2) vista disponibilidad hoy, y algun valor a definir

3) validacion de usuario login

prueba

Gestion Cax
======
Descripcion
-----
La aplicación muestra la informacion de los miembros que  estan disponibles para realizar una **"salida"** de la **Comision de Auxilio (CAX)** del **Club Andino Bariloche**. Las diferentes pantallas permiten ver disponibilidad , datos personales y habilidades de otros miembros

Guia de usuario
===
Permite visualizar informacion  detallada de cada miembro de la comision y modificacion de los datos personales como tambien cargar las fechas o periodos de tempos en los que se va a estar disponible.

Usuarios/Miembros
-------
**Usuarios** son los miembros de la comision de auxilio, activos , de  apoyo y aspirantes, que hayan sido dados de alta en la base de datos por el **Ususario Administrador\res**.
El mantenimiento, la edicion de los datos  y la disponibilidad estara a cargo de cada uno de los usuarios 
se puede consultar la informacion de otro usuarios en las diferentes pantallas.

Usuario/Administrador
----
***El administrado/es*** cuentan con mayores privilegios.Tendran a cargo la creacion o altas y las bajas de los ***Usuarios***. ***El administrador/es*** podra modificar los datos de todos los usuarios.

Vistas
===
Pantalla de Log-in (gestion-cax)
----
Contiene dos campos para colocar el nombre de ***ususario y la contrasena***, el nombre de ***ususario*** sera el *email registrados* en los listados de la CAX, la contrasena sera colocada por el ***Adminitrador*** y podra ser cambiada por el ***Usuario***.

-Boton ingresar 
----
Permite al usuario ***ingresar*** a la aplicación.

-Recuperacion de contraseña
----
Envia la contraseña al ***e-mail registrado del usuario***. En caso de que la direccion de correo sea ***incorrecta*** envia un mensaje de ***error***.

Pantalla de Inicio.
----
Muestra la **disponibilidad** de hoy y manana en la ventana principal y la barra de menu comun a todas las pantallas
Muestra dos tablas con los  miembros disponibles hoy y mañana.
Boton ver mas
---
Este boton lleva a la pantalla donde se visualizan los datos completos de la persona, Datos Personales, Categoria dentro del Grupo de la **CAX**, Habilidades.


Barra de menu
---
* Inicio: vuelve a la pantalla de inicio(disponibilidad)
* Listados(lleva al usuario al listado completo de miembros.
* Usuario Conectado (muestra el nombre y apellido del usuario que inicio la sesion)
* Mis Datos (lleva al formulario de los datos completso del usuario que inicio la sesion)
* Buscar(busca a un miembro por nombre o por apellido)
* Salir (cierra la sesion del usuario actual)

Buscar
---
Busca por **nombre** o **apoellido**.
Muestra la pantalla de **Listado de Miembros**. Donde se muestran todos los datos de la **persona/miembro** buscado

Pantalla Datos Personales (Formulario Miembros)
---
Muestra **todos** los datos de la persona, si el usuario esta **"logueado"** puede modificar solo sus datos personales, pudiendo cambiar la informacion de cada campo de **texto checkbox, y optionbox**.
```
Importante
---
Los datos solo pueden ser editados por el miembro o por el administrador
```
Los campos de texto se colocaran todo los datos personales del usuario.

Boton disponibilidad
---
Muestra la pantalla de disponibilidad total de la persona

La categoria se carga en el formato de opciones, donde solo se podra elegir **una sola** categoria

habilidades
---
Consiste en campos tipo checkbox donde pueden elegie **varias** habilidades

Boton aceptar
---
Envia  los datos cargados o modificados a la **Base de Datos**


Pantalla Listado
---
Muestra el listado de todos los miembros por nombre, apellido, domicilio, categoria, celular, telefono fijo de dia u de noche.
boton disponibilidad: lleva a la pantalla disponibilidad total de la persona seleccionada
boton editar **(en el caso de que este habilitado)** lleva a la pantalla de datos de la pesona para poder editarlos o modificarlos.

Guia de Instalacion (Programadores)
===
requerimientos
---
```
* php
* my Sql
* script de creacion de base de datos.
```

Dependencias
---
```
Gestion_cax
	|__js
	|		|__bootstrap.js
	|		|__bootstrap.min.js
	|		|__jquery-1.9.1.js
	|		|__jquery-ui.js
	|		|__npm.js
	|__css
	|		|__bootstrap.css
	|		|__inicio.css
	|		|__jquery-ui.css
	|		|__style.css
	|		|__images
	|				|__ui-icons_222222_256x240.png
	|__imag
	|		|__cab.jpg
	|		|__logoComAux.jpg
	|__sql
	|		|__
	|__include
			|__connect_db.php
			|__
	``
