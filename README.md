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
La aplicación que permite ver la informacion de los miembros que  estan disponibles para realizar una salida de la comision de auxilio del Club Andino Bariloche. Las diferentes pantallas permiten ver disponibilidad , datos personales y habilidades de otros miembros

Guia de usuario
-------
es posible visualizar informacion mas detallada de cada miembro de la comision y modificacion de los datos personales como tambien cargar las fechas o periodos de tempos en los que se va a estar disponible.

Usuarios/Miembros
-------
los usuarios seran los miembros de la comision de auxilio, activos , de  apoyo y aspirantes.
El mantenimiento, la edicion de los daros  y la disponibilidad estara a cargo de cada uno de los usuarios 
se puede consultar la informacion de otro usuarios en las diferentes pantallas.

Usuario/Administrador
el administrador o los administradores  cuentan con mayores privilegios .tendran a cargo las altas o creacion de usuarios y las bajas de los mismos. El administrador /administradores podra modificar los datos de todos los usuarios, como tambien dar de baja de datos.

Vistas
pantalla de inicio
contiene dos campos para colocar el nombre de ususario y la contrasena, el nombre de ususario sera el email registrados en los listados de la CAX, la contrasena sera colocada por el adminitrador y podra ser cambiada por el usuario.

Boton ingresar, 
permite al usuario ingresar a la aplicación.

Recuperacion de contrasena
envia la contrasena al mail registrado del usuario. En caso de que la direccion de correo sea incorrecta envia un mensaje de error.

Pantalla de inicio.
Muestra la disponibilidad de hoy y manana en la ventana principal y la barra de menu comun a todas las pantallas

Barra de menu
inicio: vuelve a la pantalla de inicio(disponibilidad)
listados(lleva al usuario al listado completo de miembros.
usuario conectado (muestra el nombre y apellido del usuario que inicio la sesion)
mis datos (lleva al formulario de los datos completso del usuario que inicio la sesion)
buscar(busca a un miembro por nombre o por apellido)
salir (cierra la sesion del usuario actual)

buscar 
busca por nombre y apoellido 
muestra la pantalla datos. Donde se muestran todos los datos de la persona/miembro buscado


pantalla inicio (parte dos)
muestra dos tablas con los  miembros disponibles hoy y manana.
Boton ver mas
este boton lleva a la pantalla datos completos de la persona.



pantalla datos 
muestra todos los datos de la persona, si el usuario esta logueado puede modificar sus datos , cambiando la informacion de cada campo o agregando datos de ser necesario.
Los datos solo pueden ser editados por el miembro o por el administrador
los campos de esta pantalla son texto donde se colocaran todo los datos alli pedidos.

Boton disponibilidad, lleva a la pantalla de disponibilidad total de la persona

La categoria se carga en el formato de opciones, donde solo se podra elegir una categoria

habilidades
consiste en campos tipo checkbox dende se pueden elegie varia habilidades

boton aceptar, envia los datos cargados o modificados a la base de datos


pantalla Listado
muestra el listado de todos los miembros por nombre apellido, categoria, celular, telefono fijo de dia u de noche
boton disponibilid, lleva a la pantalla disponibilidad de la persona seleccionada
boton editar ( en el caso de que este habilitado) lleva a la pantalla de datos de la pesona para poder editarlos o modificarlos.

guia de instalacion programadores
requerimiento
php
my Sql


script de creacion de base de datos.

