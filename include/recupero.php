<?
require("connect_db.php");
include("class.phpmailer.php"); 
include("class.smtp.php"); 
$mail = new PHPMailer(); 
$mail->IsSMTP(); 
$mail->SMTPAuth = true; 
$mail->SMTPSecure = "ssl"; 
$mail->Host = "smtp.gmail.com"; 
$mail->Port = 465; 
$mail->Username = "gestioncax@gmail.com"; 
$mail->Password = "clubandino";

$mailmiembro=$_POST['mail'];
$query="SELECT password,nombre FROM CAX.miembro WHERE email='".$mailmiembro."';";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
if (mysql_num_rows($result)==0){
	header('Location: ../index.php?mail');
	exit();}
$row=mysql_fetch_object($result);
$password=$row->password;
$nombre=$row->nombre;





$mail->From = "recuperacion@gestioncax"; 
$mail->FromName = "Gestion CAX"; 
$mail->Subject = "Recuperacion de clave de accesso"; 
$mail->AltBody = ""; 
$mail->MsgHTML("<br>El siguiente es una respestuesta al pedido de recuperacion de clave</br><br>Su clave de accesso es '".$password."'</br>");
$mail->AddAddress($mailmiembro, $nombre); 
$mail->IsHTML(true); 
if(!$mail->Send()) { 
echo "Error: " . $mail->ErrorInfo; 
} else { 
echo "Mensaje enviado correctamente"; 
}
header('Location: ../index.php?msg');
?>