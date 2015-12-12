<?php
require("connect_db.php");

if (isset($_POST['idmiembro'])){
	$id=$_POST['idmiembro'];
}
if((isset($_POST['desde']))&&(isset($_POST['hasta']))){
	$desde=$_POST['desde'];
	$hasta=$_POST['hasta'];

    function check_date($str){
                trim($str);
                if($str=="")
                    return false; 
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
	   $query ="select * from  CAX.disponibilidad where  disponibilidad.idmiembro='".$id."' and(('".$desde."'between fechaInicio and fechaFin) or ('".$hasta."'between fechaInicio and fechaFin));";
	   $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
	   $numero=mysql_num_rows($result);
	   $row=mysql_fetch_object($result);
	
	   $query2="select * from CAX.disponibilidad where disponibilidad.idmiembro='".$id."'and((fechaInicio between '".$desde."' and '".$hasta."') or ( fechaFin between '".$desde."' and '".$hasta."'));";
	   $result2 = mysql_query($query2) or die('Consulta fallida: ' . mysql_error());
	   $numero2=mysql_num_rows($result2);
	   $row2=mysql_fetch_object($result2);

	   if($numero!==0){
			echo "<script type='text/javascript'>";
    		echo "alert('Alguna de las Fechas ya Existe!');";
    		echo "location.href='../disponibilidad.php?owner&idmiembro=".$id."'";
    		echo "</script>";
        }
	   elseif($numero2!==0){
			echo "<script type='text/javascript'>";
    		echo "alert('Ya Existen Fechas dentro de Desde Y Hasta !');";
    		echo "location.href='../disponibilidad.php?owner&idmiembro=".$id."'";
    		echo "</script>";
		}
		elseif(compare_date($desde,$hasta)==true){
			echo "<script type='text/javascript'>";
    		echo "alert('Fecha Desde es Posterior a Fecha Hasta !');";
    		echo "location.href='../disponibilidad.php?owner&idmiembro=".$id."'";
    		echo "</script>";
		}else{
            $insert= "INSERT INTO `CAX`.`disponibilidad` (`idmiembro`, `fechaInicio`, `fechaFin`, `iddispo`) VALUES('$id','$desde','$hasta', 2)";
			if (($id!=='') &&($desde!=='') && ($hasta!=='')){
				mysql_query($insert) or die('Consulta fallida: ' . mysql_error());
                $query="UPDATE CAX.miembro SET iddispo=2 WHERE idmiembro='".$id."';";
                mysql_query($query) or die('Consulta fallida: ' . mysql_error());
				header("Location:../disponibilidad.php?owner&idmiembro=".$id."");
			}
			
		}
    }
    else{
	echo "<script type='text/javascript'>";
    		echo "alert('Fechas No Validas!');";
    		echo "location.href='../disponibilidad.php?owner&idmiembro=".$id."'";
    		echo "</script>";
    }
}elseif ((isset($_GET['iddisp']))and isset($_GET['idmiembro'])){
    $iddisp=$_GET['iddisp'];
    $id1=$_GET['idmiembro'];
    $delete=" DELETE FROM `CAX`.`disponibilidad` WHERE `iddisponibilidad`='".$iddisp."';";
    mysql_query($delete) or die('Consulta fallida: ' . mysql_error());
    $query=" SELECT * FROM `CAX`.`disponibilidad` WHERE `iddisponibilidad`='".$iddisp."';";
    $result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    $numero=mysql_num_rows($result);
    if($numero==0){
        $query="UPDATE CAX.miembro SET iddispo= 1 WHERE idmiembro='".$id1."';";
        mysql_query($query) or die('Consulta fallida: ' . mysql_error());
    }

    header("Location:../disponibilidad.php?owner&idmiembro=".$id1."");
}
else{
    header("Location:../disponibilidad.php?owner&idmiembro=".$id."");
}

?>
