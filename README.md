Proyecto Gestión CAX ( Comisión de Auxilio )
====
Instituto Superior Capacitas.
----
**Carrera**: Técnico Superior en Desarrollo de Sistemas.

**Materia**: Práctica Profesional 1 (2do año)

**Año** :  2015
**Autores**
-----
* Alumno: Matías Lavanchi, Jorge G. Sosinowicz.
* Docente: Lucas Passalacqua

Gestión Cax
======
Descripción
-----
La aplicación muestra la información de los miembros que  están disponibles para realizar una ***"salida"*** de la ***Comisión de Auxilio (CAX)*** ***Club Andino Bariloche***. Las diferentes pantallas permiten ver disponibilidad , datos personales y habilidades de otros miembros

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
***El administrado/es*** cuentan con mayores privilegios. Tendrán a cargo la creación o altas y las bajas de los ***Usuarios***. ***El administrador/es*** podrá modificar los datos de todos los usuarios.

Vistas
===
Pantalla de Log-in (gestión-cax)
----
![login] (img/login.png?raw=true)
Contiene dos campos para colocar el nombre de *** usuario y la contraseña***, el nombre de ***usuario*** sera el ***e-mail registrado*** en los listados de la CAX, la contraseña sera colocada por el ***Administrador*** y  podrá ser cambiada por el ***Usuario***.

Botón ingresar 
----
Permite al usuario ***ingresar*** a la aplicación.

Recuperación de contraseña
----
Enviá la contraseña al ***e-mail registrado del usuario***. En caso de que la dirección de correo sea ***incorrecta*** envía un mensaje de ***error***.

Pantalla de Usuario Nuevo
-----
![primer] (img/miem_inicial.png?raw=true)

Es la primer pantalla que encuentra un usuario nuevo, donde debe cargar sus datos personales, ***Se debe cambiar la contraseña primero***,para luego completar todos los campos.
Si no se cambia la contraseña, los datos agregados se perderán y se tendrán que llenar nuevamente. El alta como usuario del sistema Gestión Cax, se realiza después de haber completado los datos  de este formulario, que posteriormente se accederá desde el menu  ***Mis Datos.***

Pantalla de Inicio.
----
![inicio] (img/ini.png?raw=true)

Es la pantalla que recibe al usuario cada ves que ingrese al sistema luego de haber confirmado el alta.
Muestra la ***disponibilidad*** de hoy y mañana en la ventana principal y la barra de menú común a todas las pantallas
Muestra dos tablas con los  miembros disponibles hoy y mañana.
Se pueden ver dos campos   Desde y Hasta y dos botones, Buscar y Alerta Mail. 

##Búsqueda (Botón Buscar)

Búsqueda por disponibilidad

![inicio búsqueda] (img/ini_busc_norm.png?raw=true)

Existen dos campos para realizar búsquedas, el primer campo DESDE, permite la búsqueda en un día especifico.

Campo Hasta, este campo puede estar en blanco, pero si se completa, se hace una combinación de las dos fechas y se buscara a todos los miembros que estén disponibles en ese periodo de tiempo, este tipo de búsqueda no es exacta, como buscar por un solo día,  si el periodo es muy largo puede generar resultados inexactos.

Resultado de búsqueda por disponibilidad
-----
![inicio] (img/ini_conf_busc.png?raw=true)
![inicio] (img/ini_res_busc.png?raw=true)

 
## Alerta Mail (Botón)
Al hacer clic en este botón se envía un mensaje a los usuarios que figuran en el listado de disponibles hoy,  con los teléfonos SMART se puede tener acceso a cualquier cuenta de mail, solo con configurarla y mantenerla sincronizada. 

##Botón ver mas
---
Este botón lleva a la pantalla donde se visualizan los datos completos de la persona, Datos Personales, Categoría dentro del Grupo de la **CAX**, Habilidades.

![ver mas] (img/miem_ver.png?raw=true)


Pantalla Administrador
-----
Los usuarios administradores son los responsables de dar de alta a nuevos miembros, esto se realiza a través de un mail proporcionado por cada uno a dicho administrador. Se resuelve este método para tener el control de los miembros que accederán al sistema.

![admin] (img/list_admin.png?raw=true)


Crear usuario nuevo
-----
![nuevo] (img/list_nuevo_admin.png?raw=true)


usuario creado
----
![nuevo2] (img/list_crea_admin.png?raw=true)





Barra de menú
---
![menu] (img/menu.png?raw=true)

* Inicio: vuelve a la pantalla de inicio(disponibilidad)
* Listados(lleva al usuario al listado completo de miembros.
* Guardia, abre el formulario de los miembros de guardia, mensuales y anuales
* Usuario Conectado (muestra el nombre y apellido del usuario que inicio la sesión)
* Mis Datos (Abre formulario de los **datos personales** permite la edición de  datos y disponibilidad)
* icono ? de ayuda, abre la pantalla de manual de usuario
* Buscar(busca a un miembro por nombre o por apellido)
* Salir (cierra la sesión del usuario actual)

Buscar (Pantalla Usuario Administrador)
---
![buscar] (img/list_busc_admin.png?raw=true)

Busca por **nombre** o **apellido**. Por categoría o por habilidades.
Muestra la pantalla de **Listado de Miembros**. Donde se muestran todos los datos de la **persona/miembro** buscado
Si el campo nombre o apellido esta vació, muestra todos los miembros, si selecciona alguna habilidad y/o categoría, buscara a las personas que cumplan con dicha búsqueda. El campo "nombre o apellido" puede estar completo con una palabra o parte de una palabra y brindara un resultado con las palabras que contengan las letras determinadas.
Buscar (Pantalla Usuario Normal)
----
![buscar] (img/list_busc_norm.png?raw=true)

Pantalla Datos Personales (Formulario Miembros)
---
![formulario personal] (img/miem_ed.png?raw=true)

Muestra **todos** los datos de la persona, si el usuario esta **"logueado"** puede modificar solo sus datos personales, pudiendo cambiar la información de cada campo de **texto y  menúes desplegables**.
se puede cargar y editar los menúes de: 
###menu habilidades

![formulario personal] (img/miem_ed_hab.png?raw=true)

###menu categoría

![formulario personal] (img/miem_ed_cat.png?raw=true)

###menu de guardia ( en caso de ser miembro de ***Guarida***

![formulario personal] (img/miem_ed_guardia.png?raw=true)

```
Importante

Los datos solo pueden ser editados por el miembro o por el administrador

Para acceder a la edición de los datos personales se debe 

ingresar por la opción Mis Datos en la Barra de menú

El administrador podrá asignar la categoría administrador a cualquier miembro en esta pantalla.

Como se muestra en la siguiente imagen
```



Botón disponibilidad
---
Abre la pantalla de disponibilidad


Botón aceptar
---
Envía  los datos cargados o modificados a la **Base de Datos**


##Pantalla Disponibilidad

![disponibilidad] (img/disp_ver.png?raw=true)

Muestra la pantalla de disponibilidad de la persona
Si se accede desde ***Mis Datos*** de la barra menú se accede a la posibilidad de editar disponibilidad
En esta pantalla se puede seleccionar el tipo de disponibilidad acorde a cada necesidad.
dentro de las posibilidades esta la opción de disponible, no disponible, o no definido (por defecto).
dentro de disponibilidad si se seleccionan fechas de no disponibilidad, se cambia de full-time a part-time.
En el caso de que la disponibilidad esta seteada en part-time, y se la cambia a full-time, se borran los datos de no disponibilidad.
El propósito de este método es que cada usuario decida si va a marcarse como disponible o no disponible o que cargue los periodos en los que sabe que no va a estar.
en el caso de marcar la opción de no disponible, este estado se mantiene hasta que el usuario cambie su estado a disponible.
en caso de búsqueda por disponibilidad, no aparecerá su nombre.

![dispo2] (img/disp_edit.png?raw=true)

Haciendo click en el campo de texto se despliega un calendario que comienza en la fecha de "Hoy". y se podrá cargar el periodo de ***No disponibilidad.***

#Pantalla Guardia
Esta pantalla muestra dos listas donde se pueden ver los miembros que están de guardia en el mes en curso y otra lista que muestra los miembros que están de guardia durante todo el año, estos datos se cambien desde le formulario de ***Mis Datos***,
el alta o baja de este listado estará a cargo del usuario o de algún administrador del sistema

![guardia] (img/guardia.png?raw=true)


Pantalla Listado
---
![listado] (img/list_norm.png?raw=true)

Muestra el listado de todos los miembros por nombre, apellido, domicilio, categoría, celular, teléfono fijo de día u de noche.
botón disponibilidad: lleva a la pantalla disponibilidad total de la persona seleccionada
botón editar **(en el caso de que este habilitado)** lleva a la pantalla de datos de la persona para poder editarlos o modificarlos.


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
	|			|__ui-icons_222222_256x240.png
	|__img
	|		|__cab.jpg
	|		|__logoComAux.jpg
	|__sql
	|		|__Cax.sql
	|__include
			|__connect_db.php
			|__
	```
