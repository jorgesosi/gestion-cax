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
	$query="DELETE FROM CAX.disponibilidad WHERE idmiembro='".$id1."';";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	header('Location: ../listadomiembro.php?msg=1');
	exit();
}

if($id=='0'){

	$query = "SELECT email from CAX.miembro WHERE email='".$email."' ;";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	if(mysql_num_rows($result)==0){
		$query="INSERT INTO CAX.miembro (email,celular,nombre,apellido,domicilio,dni,fijoDia,fijoNoche,fechaNacimiento,password,idcategoria,permiso,apodo,codArea) VALUE ('".$email."','".$celular."','".$nombre."','".$apellido."','".$domicilio."','".$dni."','".$fijoDia."','".$fijoNoche."','".$fechaNacimiento."',AES_ENCRYPT('".$password."','cax'),'".$idcategoria."','".$permiso."','".$apodo."','".$cod."');";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		header('Location: nuevo_usuario.php?email='.$email.'');
		exit();
	}else {header('Location: ../listadomiembro.php?msg2');
		exit();}

}else{
	
	if(isset($_POST['permiso']))
		$permiso=$_POST['permiso'];
	
	if((isset($_POST['cambiar'])) || (isset($_GET['idmiembro']))){
		
		$iddisp=$_POST['iddisponibilidad'];
		$idmiem=$_GET['idmiembro'];
		$query="UPDATE CAX.miembro SET iddispo='".$iddisp."' WHERE idmiembro='".$idmiem."';";
		$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
		if($iddisp==1){//si se cambia al estado diponible se eliminan todo los datos de no disponibles
			$delete="DELETE FROM CAX.disponibilidad where idmiembro='".$idmiem."';";
			mysql_query($delete) or die('Consulta fallida: ' . mysql_error());
			}
		 
		if (isset($_GET['owner']))
			header('Location: ../disponibilidad.php?idmiembro='.$idmiem.'&owner');
		else
			header('Location: ../disponibilidad.php?idmiembro='.$idmiem.'');
		exit();

	}else{
	$query="UPDATE CAX.miembro SET email='".$email."',celular='".$celular."',nombre='".$nombre."',apellido='".$apellido."',domicilio='".$domicilio."',dni='".$dni."',fijoDia='".$fijoDia."',fijoNoche='".$fijoNoche."',fechaNacimiento='".$fechaNacimiento."',password= AES_ENCRYPT('".$password."','cax') ,idcategoria='".$idcategoria."',permiso='".$permiso."',apodo='".$apodo."',codArea='".$cod."' WHERE idmiembro='".$id."';";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
}
}
header('Location: ../listadomiembro.php');

?>
