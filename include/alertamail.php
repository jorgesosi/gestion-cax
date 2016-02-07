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

$body="
<html>
<head>
	<meta charset='utf-8' />
</head>

<body>
<br><h1>Alerta de Salida</h1><br><br>
	Por favor comuniquese con el jefe de Guardia, 
	<br> hay una posible salida<br>Este mensjaje se genero desde la web de la CAX el dia : ";
$body.= date('d-m-y-h:m:s');
$body.="<br><br>
	<h5>Esta comunicación es de carácter confidencial y está amparada por el secreto profesional y se dirige exclusivamente al destinatario indicado. 
	 Todo lector del presente mensaje 
	 quedará debidamente notificado que la divulgación, modificación, reproducción o uso de la información aquí contenida por cualquier otra persona que no sea
	  la indicada como destinataria del mismo, queda terminantemente prohibida. Si Ud. no fuera la persona a la que el presente e-mail está destinado, le agradeceremos 
	  nos lo informe a la brevedad respondiendo este e-mail a la dirección del remitente y elimine de su sistema el mensaje recibido. Muchas gracias
	</h5>
	</body></html>";

$today="select miembro.nombre, miembro.idmiembro, miembro.iddispo,miembro.apellido,miembro.celular, miembro.codArea, miembro.email
from CAX.miembro 
where miembro.iddispo =1
union
select distinctrow   miembro.nombre, miembro.idmiembro, miembro.iddispo, miembro.apellido,miembro.celular, miembro.codArea, miembro.email
from CAX.miembro, CAX.disponibilidad
where  miembro.idmiembro= disponibilidad.idmiembro and  (curdate() not between  fechaInicio  and  fechaFin);";
$result = mysql_query($today) or die('Consulta fallida: ' . mysql_error());
if (mysql_num_rows($result)==0){
	header('Location: ../index.php?mail');
	exit();}
while($row=mysql_fetch_array($result)){
	$mail->setFrom = "alerta@gestioncax"; 
	$mail->FromName = "Gestion CAX"; 
	$mail->IsHTML(true); 
	$mail->Subject = "Alerta de Salidas de CAX"; 
	$mail->AltBody = ""; 
	$mail->MsgHTML($body);
	$mail->AddAddress($row['email'],$row['nombre']); 
	//$mail->Send();
	if(!$mail->Send()) { 
	echo "Error: " . $mail->ErrorInfo; 
	} else { 
	echo "Mensaje enviado correctamente"; 
	}
	 // Borramos el destinatario, de esta forma nuestros clientes no ven los correos de las 
	//otras personas y parece que fuera un único correo para ellos. 
    $mail->ClearAddresses(); 
}
header('Location: ../inicio.php?msg');
ob_end_flush();?>