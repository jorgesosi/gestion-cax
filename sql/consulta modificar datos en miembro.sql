-- consulta para modificar los miembros
-- set [nombre de la columna] = '[dato]' 
-- where [nombre de la columna] ='[dato]'
update CAX.miembro 
set nombre ='alvar',
apellido ='',
domicilio = '',
dni = '',
email='',
celular = '',
fijoDia = '',
fijoNoche ='',
password ='',
fechaNacimiento= '1976-01-13'
 WHERE idmiembro='2';