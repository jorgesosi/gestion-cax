<?ob_start();
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
$query="SELECT AES_DECRYPT(password,'cax'), nombre FROM CAX.miembro where email='".$mailmiembro."';";
//$query="SELECT password, nombre FROM CAX.miembro WHERE email='".$mailmiembro."';";
$result = mysql_query($query) or die('Consulta fallida: ' . mysql_error());
if (mysql_num_rows($result)==0){
	header('Location: ../index.php?mail');
	exit();}
$row=mysql_fetch_array($result);
$password=$row["AES_DECRYPT(password,'cax')"];
$nombre=$row['nombre'];





$mail->From = "recuperacion@gestioncax"; 
$mail->FromName = "Gestion CAX"; 
$mail->Subject = "Recuperacion de clave de accesso"; 
$mail->AltBody = ""; 
$mail->MsgHTML("<br>El siguiente es una respuesta al pedido de recuperacion de clave</br><br>Su clave de accesso es '".$password."'</br>
	<h5>Esta comunicación es de carácter confidencial y está amparada por el secreto profesional y se dirige exclusivamente al destinatario indicado. 
	 Todo lector del presente mensaje 
	 quedará debidamente notificado que la divulgación, modificación, reproducción o uso de la información aquí contenida por cualquier otra persona que no sea
	  la indicada como destinataria del mismo, queda terminantemente prohibida. Si Ud. no fuera la persona a la que el presente e-mail está destinado, le agradeceremos 
	  nos lo informe a la brevedad respondiendo este e-mail a la dirección del remitente y elimine de su sistema el mensaje recibido. Muchas gracias
</h5>");
$mail->AddAddress($mailmiembro, $nombre); 
$mail->IsHTML(true); 
if(!$mail->Send()) { 
echo "Error: " . $mail->ErrorInfo; 
} else { 
echo "Mensaje enviado correctamente"; 
}
header('Location: ../index.php?msg');
ob_end_flush();?>