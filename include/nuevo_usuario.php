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

$mailmiembro=$_GET['email'];
$nombre="Nuevo Miembro";





$mail->From = "Alta-usuario@gestioncax"; 
$mail->FromName = "Gestion CAX"; 
$mail->Subject = "Alta de miembro de CAX"; 
$mail->AltBody = ""; 
$mail->MsgHTML("<br>Su mail se ha dado de alta para ser miembro de gestion CAX</br><br>Su clave de accesso provisoria es cax1234</br>
	<br>Por favor, ingrese al sistema utilizando su mail y clave provisoria para personalizar su clave de accesso e ingresar sus datos</br>");
$mail->AddAddress($mailmiembro,$nombre);
$mail->IsHTML(true); 
if(!$mail->Send()) { 
echo "Error: " . $mail->ErrorInfo; 
} else { 
echo "Mensaje enviado correctamente"; 
}

header('Location: ../listadomiembro.php?msg1');
?>