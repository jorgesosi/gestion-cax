<?php
require("connect_db.php");
if (isset($_POST['idmiembro'])){
	$id=$_POST['idmiembro'];
}
if(isset($_POST['desde'])){
	$desde=$_POST['desde'];
}
if(isset($_POST['hasta'])){
		$hasta=$_POST['hasta'];
}
/*if ($desde < $hasta){
	//$temp=$desde;
	//$desde=$hasta;
	//$hasta=$temp;
	echo "<script type='text/javascript'>";
    echo "alert('fecha desde es posterior \n a la fecha hasta!');";
    echo "location.href='../disponibilidad.php?idmiembro=".$id."'";
    echo "</script>";
}*/
//check_date($str);
function check_date($str){
                trim($str);
                $partes = split ('[./-]', $str);
                $año=$partes[0];
                $mes=$partes[1];
                $dia=$partes[2];     
                if(checkdate ($mes,$dia,$año)){
                	return true;
                }
                else{
                    return false;
                }
} 
function compare_date($str,$str1) {
		trim($str);
 		trim ($str1);
                $partes = split ('[./-]', $str);
                $partes1=split('[./-]',$str1);
                $año=intval($partes[0]);
                $mes=intval($partes[1]);
                $dia=intval($partes[2]);
                $año1=intval($partes1[0]);
                $mes1=intval($partes1[1]);
                $dia1=intval($partes1[2]);
                $ini= new DateTime($año.'-'.$mes.'-'.$dia);
                $fin=new DateTime($año1 .'-'.$mes1.'-'.$dia1) ;   
                if($ini>$fin){
                	return true;
              	}           	
                else{
                    return false;
                }	
}

if (check_date($desde)==true and check_date($hasta)==true){
	$query ="select nombre, apellido, celular from CAX.miembro, CAX.disponibilidad where miembro.idmiembro = disponibilidad.idmiembro and(('".$desde."'between fechaInicio and fechaFin) or ('".$hasta."'between fechaInicio and fechaFin));";
	$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	$numero=mysql_num_rows($result);
	$row=mysql_fetch_object($result);
	
	$query2="select nombre, apellido, celular from CAX.miembro, CAX.disponibilidad where miembro.idmiembro = disponibilidad.idmiembro and((fechaInicio between '".$desde."' and '".$hasta."') or ( fechaFin between '".$desde."' and '".$hasta."'));";
	$result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
	$numero2=mysql_num_rows($result2);
	$row2=mysql_fetch_object($result2);

		if($numero!==0){
			echo "<script type='text/javascript'>";
    		echo "alert('fecha desde o fecha hasta ya existe!');";
    		echo "location.href='../disponibilidad.php?idmiembro=".$id."'";
    		echo "</script>";
    //header("Location:../disponibilidad.php?idmiembro=".$id."");
		}
		elseif($numero2!==0){
			echo "<script type='text/javascript'>";
    		echo "alert('Ya existen fechas entre fecha desde o fecha hasta !');";
    		echo "location.href='../disponibilidad.php?idmiembro=".$id."'";
    		echo "</script>";
    //header("Location:../disponibilidad.php?idmiembro=".$id."");
		}
		elseif(compare_date($desde,$hasta)==true){
			echo "<script type='text/javascript'>";
    		echo "alert('fecha desde es posterior a la fecha hasta !');";
    		echo "location.href='../disponibilidad.php?idmiembro=".$id."'";
    		echo "</script>";
		}else{
			$insert= "INSERT INTO `CAX`.`disponibilidad` (`idmiembro`, `fechaInicio`, `fechaFin`) VALUES('$id','$desde','$hasta')";
			//echo $query;
			//if($_POST['id']!==0){
			if (($id!=='') &&($desde!=='') && ($hasta!=='')){
				mysql_query($insert) or die('Consulta fallida: ' . mysql_error());
				header("Location:../disponibilidad.php?idmiembro=".$id."");
			}
			
		}
//header("Location:../disponibilidad.php?idmiembro=".$id."");	
}
else{
	echo "<script type='text/javascript'>";
    		echo "alert('fechas invalidas!');";
    		echo "location.href='../disponibilidad.php?idmiembro=".$id."'";
    		echo "</script>";
}
//header("Location:../disponibilidad.php?idmiembro=".$id."");

?>
