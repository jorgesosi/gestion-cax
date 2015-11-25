<? require("connect_db.php");

$id1=$_GET['id1'];
foreach($_POST as $nombre_campo => $valor){
	$asignacion= "$".$nombre_campo."='". $valor."';";
	echo $asignacion;
	eval($asignacion);
}

	$query="DELETE FROM CAX.miembro_skill WHERE idmiembro='".$id."';";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	$query = 'SELECT idskil,nombre from CAX.skill ;';
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	$total=mysql_num_rows($result);
	for($i=1;$i<=$total;$i++){
		$var=${'hab'.$i};
		echo $var;
		if (isset($var))
		$query="INSERT INTO CAX.miembro_skill (idmiembro,idskill) VALUE ('".$id."','".$var."')";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	}



if (isset($id1)){
	$query="DELETE FROM CAX.miembro WHERE idmiembro='".$id1."';";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	$query="DELETE FROM CAX.miembro_skill WHERE idmiembro='".$id1."';";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	header('Location: ../listadomiembro.php?msg=1');
	exit();
}

if($id=='0'){
	$query="INSERT INTO CAX.miembro (email,celular,nombre,apellido,domicilio,dni,fijoDia,fijoNoche,fechaNacimiento,password,idcategoria) VALUE ('".$email."','".$celular."','".$nombre."','".$apellido."','".$domicilio."','".$dni."','".$fijoDia."','".$fijoNoche."','".$fechaNacimiento."','".$password."','".$idcategoria."');";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	if (empty($nombre)){
		header('Location: nuevo_usuario.php?email='.$email.'');
		exit();}

}

else {
$query="UPDATE CAX.miembro SET email='".$email."',celular='".$celular."',nombre='".$nombre."',apellido='".$apellido."',domicilio='".$domicilio."',dni='".$dni."',fijoDia='".$fijoDia."',fijoNoche='".$fijoNoche."',fechaNacimiento='".$fechaNacimiento."',password='".$password."',idcategoria='".$idcategoria."' WHERE idmiembro='".$id."';";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
}
header('Location: ../listadomiembro.php');

?>
