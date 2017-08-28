<?php

function enviarFormulario($varNombre, $varEmail, $varComentarios){


//creamos el mensaje
$para = "migue2c@gmail.com";
$asunto = "Contacto desde la web macontreras/mobile";
$mensaje = '

<html>
<head>
	<title>Contacto desde la web macontreras/mobile</title>
</head>
<body>
	<p>El usuario '.$varNombre.' con el email '.$varEmail.' nos ha mandado los siguientes datos:</p>
	<p>'.$varComentarios.'<p>
</body>
</html>

';

//Fijamos el formato del correo en la cabecera
$cabeceras  = 'MIME-Version: 1.0 '. "\r\n";
$cabeceras .=  'Content-type: text/html; charset=iso-8859-1'. "\r\n";


//Cabeceras adicionales
$cabeceras .=  	'To: Miguel Ángel Contreras <info@macontreras.es>'. "\r\n";
$cabeceras .= 	'From: Web Móvil de Miguel Ángel <info@macontreras.es>'. "\r\n";

//Mandamos email
mail($para, $asunto, $mensaje, $cabeceras);


}



?>