Proyecto Gestión CAX ( Comisión de Auxilio )
====
Instituto Superior Capacitas.
----
**Carrera**: Técnico Superior en Desarrollo de Sistemas.

**Materia**: Práctica Profesional 1 (2do año)

**Año** :  2015
**Autores**
-----
* Alumno: Matias Lavanchi, Jorge G. Sosinowicz.
* Docente: Lucas Passalacqua

Gestión Cax
======
Descripción
-----
La aplicación muestra la información de los miembros que  están disponibles para realizar una **"salida"** de la **Comisión de Auxilio (CAX)** del **Club Andino Bariloche**. Las diferentes pantallas permiten ver disponibilidad , datos personales y habilidades de otros miembros

Guía de usuario
===
Permite visualizar información  detallada de cada miembro de la comisión y modificación de los datos personales como también cargar las fechas o periodos de tiempos en los que se va a estar disponible.

Usuarios/Miembros
---
**Usuarios** son los miembros de la comisión de auxilio, activos , de  apoyo y aspirantes, que hayan sido dados de alta en la base de datos por el **Usuario Administrador\res**.
El mantenimiento, la edición de los datos  y la disponibilidad estará a cargo de cada uno de los usuarios 
se puede consultar la información de otro usuarios en las diferentes pantallas.

Usuario/Administrador
---
***El administrado/es*** cuentan con mayores privilegios. Tendran a cargo la creación o altas y las bajas de los ***Usuarios***. ***El administrador/es*** podrá modificar los datos de todos los usuarios.

Vistas
===
Pantalla Admnistrador
-----
![admin] (img/nuevo.png?raw=true)


Crear usuario nuevo
-----
![nuevo] (img/nuevo1.png?raw=true)


usuario creado
----
![nuevo2] (img/nuevo2.png?raw=true)


Pantalla de Log-in (gestión-cax)
----
![login] (img/login.png?raw=true)
Contiene dos campos para colocar el nombre de *** usuario y la contraseña***, el nombre de ***usuario*** sera el *e-mail registrados* en los listados de la CAX, la contraseña sera colocada por el ***Administrador*** y  podrá ser cambiada por el ***Usuario***.

Botón ingresar 
----
Permite al usuario ***ingresar*** a la aplicación.

Recuperación de contraseña
----
Enviá la contraseña al ***e-mail registrado del usuario***. En caso de que la dirección de correo sea ***incorrecta*** envía un mensaje de ***error***.

Primer Pantalla de Usuario Nuevo
-----
![primer] (img/primerpantalla.png?raw=true)

Pantalla de Inicio.
----
![inicio] (img/inicio.png?raw=true)
Muestra la **disponibilidad** de hoy y mañana en la ventana principal y la barra de menú común a todas las pantallas
Muestra dos tablas con los  miembros disponibles hoy y mañana.
Botón ver mas
---
Este botón lleva a la pantalla donde se visualizan los datos completos de la persona, Datos Personales, Categoría dentro del Grupo de la **CAX**, Habilidades.


Barra de menú
---
* Inicio: vuelve a la pantalla de inicio(disponibilidad)
* Listados(lleva al usuario al listado completo de miembros.
* Usuario Conectado (muestra el nombre y apellido del usuario que inicio la sesión)
* Mis Datos (Abre formulario de los **datos personales** permite la edicion de  datos y disponibilidad)
* Buscar(busca a un miembro por nombre o por apellido)
* Salir (cierra la sesión del usuario actual)

Buscar
---
![buscar] (img/busquedaavanzada.png?raw=true)
Busca por **nombre** o **apellido**.
Muestra la pantalla de **Listado de Miembros**. Donde se muestran todos los datos de la **persona/miembro** buscado

Pantalla Datos Personales (Formulario Miembros)
---
![formulario personal] (img/miembro.png?raw=true)
Muestra **todos** los datos de la persona, si el usuario esta **"logueado"** puede modificar solo sus datos personales, pudiendo cambiar la información de cada campo de **texto checkbox, y optionbox**.
```
Importante

Los datos solo pueden ser editados por el miembro o por el administrador

Para acceder a la edicion de los datos personales se debe ingresar por la opcion Mis Datos en la Barra de menú
```
Los campos de texto se colocaran todo los datos personales del usuario.

Botón disponibilidad
---
![disponibilidad] (img/dispo.png?raw=true)
Muestra la pantalla de disponibilidad total de la persona
![dispo2] (img/dispo2.png?raw=true)

La categoría se carga en el formato de opciones, donde solo se podrá elegir **una sola** categoría

Habilidades
---
Consiste en campos tipo checkbox donde pueden elegir **varias** habilidades

Botón aceptar
---
Envía  los datos cargados o modificados a la **Base de Datos**


Pantalla Listado
---
![listado] (img/listado.png?raw=true)
Muestra el listado de todos los miembros por nombre, apellido, domicilio, categoría, celular, teléfono fijo de día u de noche.
botón disponibilidad: lleva a la pantalla disponibilidad total de la persona seleccionada
botón editar **(en el caso de que este habilitado)** lleva a la pantalla de datos de la persona para poder editarlos o modificarlos.

Pantalla Administrdor (nuevo usuario)
![nuevo] (img/nuevo.png?raw=true)
Desde el boton que se crea a la derecha se genera un nuevo usuario. la caracteristica es que solo crea el email y un password, para que el usuario pueda ingresar por primera vez, cargue todos los datos necesarios.

Guía de Instalación (Programadores)
===
requerimientos
---
```
* php
* my Sql
* Cax.sql( script de creación de base de datos)
	se encuentra en la carpeta sql.
```

Dependencias
---
```
Gestión_cax
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
	|__img
	|		|__cab.jpg
	|		|__logoComAux.jpg
	|__sql
	|		|__Cax.sql
	|__include
			|__connect_db.php
			|__
	``
