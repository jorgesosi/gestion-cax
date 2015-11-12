<? session_start();
require("connect_db.php");
$nombre=$_POST['usuario']; 
$password=$_POST['contrasenia'];

$query = "select nombre, password, idmiembro, apellido from CAX.miembro
	  where nombre='".$nombre."' AND password='".$password."';";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
$numero=mysql_num_rows($result);
$row=mysql_fetch_object($result);
$id=$row->idmiembro;
$nombre=$row->nombre;
$apellido=$row->apellido;
if ($numero==1){ 

$_SESSION["id"]=$id;
$_SESSION["nombre"]=$nombre;
$_SESSION["apellido"]=$apellido;
	header("Location: ../inicio.php");
}
else
	header('location: ../index.php?error');

?>
