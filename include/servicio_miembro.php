<? require("connect_db.php");
$nombre=$_POST['nombre'];
$id=$_POST['id'];
$id1=$_GET['id1'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$celular=$_POST['celular'];
$domicilio=$_POST['domicilio'];
$dni=$_POST['dni'];
$fijoDia=$_POST['fijoDia'];
$fijoNoche=$_POST['fijoNoche'];
$fechaNacimiento=$_POST['fechaNacimiento'];
$password=$_POST['password'];
$idcategoria=$_POST['categoria'];
if (isset($id1)){
	$query="DELETE FROM CAX.miembro WHERE idmiembro='".$id1."';";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	header('Location: ../listadomiembro.php?msg=1');
	exit();
}

if($id=='0'){
	$query="INSERT INTO CAX.miembro (email,celular,nombre,apellido,domicilio,dni,fijoDia,fijoNoche,fechaNacimiento,password,idcategoria) VALUE ('".$email."','".$celular."','".$nombre."','".$apellido."','".$domicilio."','".$dni."','".$fijoDia."','".$fijoNoche."','".$fechaNacimiento."','".$password."','".$idcategoria."');";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
}
else {
$query="UPDATE CAX.miembro SET email='".$email."',celular='".$celular."',nombre='".$nombre."',apellido='".$apellido."',domicilio='".$domicilio."',dni='".$dni."',fijoDia='".$fijoDia."',fijoNoche='".$fijoNoche."',fechaNacimiento='".$fechaNacimiento."',password='".$password."',idcategoria='".$idcategoria."' WHERE idmiembro='".$id."';";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
}
header('Location: ../listadomiembro.php');

?>
