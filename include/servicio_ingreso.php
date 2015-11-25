<? session_start();
require("connect_db.php");
$email=$_POST['usuario']; 
$password=$_POST['contrasenia'];

$query = "select nombre, password, idmiembro, apellido, permiso from CAX.miembro
	  where email='".$email."' AND password='".$password."';";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
$numero=mysql_num_rows($result);
$row=mysql_fetch_object($result);
if ($numero==1){ 
$_SESSION["id"]=$row->idmiembro;
$_SESSION["nombre"]=$row->nombre;
$_SESSION["apellido"]=$row->apellido;
$_SESSION["permiso"]=$row->permiso;
header("Location: ../inicio.php");
}
else
	header('location: ../index.php?error');

?>
