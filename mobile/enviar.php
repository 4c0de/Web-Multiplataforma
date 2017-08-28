<?php
// Agregamos los requerimientos para mandar email
require ('utilidades\correo\PHPMailer-completo\PHPMailerAutoload.php');

//Recogemos los datos del formulario
echo '

<!DOCTYPE html>
<html lang="es">
<head>		

	<meta charset="utf-8" />	

	<title>Módulo jQuery Mobile</title>


	<!-- Definición de los archivos JS y CSS de forma local en nuestro servidor -->

	<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>

	<script type="text/javascript" src="js/jquery.mobile-1.4.3.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/jquery.mobile-1.4.3.min.css">

	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

</head>
<body>

<section id="enviarFormulario" data-role="page">
	<header data-role="header">
		<h1>CABECERA</h1>
	</header>
	<article data-role="content" >	
			';
			/*   PARA PRUEBAS EN FASE DE DESARROLLO
			echo '------------VARIABLES GET-----------------';
			echo '<pre>';
				print_r($_GET);
			echo '</pre>'; 
			echo '------------VARIABLES POST-----------------';
			echo '<pre>';
				print_r($_POST);
			echo '</pre>'; 
			echo '--------------------------------------';
			*/
			//recojo los datos
			$campoNombre = $_POST['nombreContactar'];
   			$campoApellidos = $_POST['apellidosContactar'];
                        $campoTelefono = $_POST['telefonoContactar'];
                
                $campoGenero = $_POST['menuSeleccion'];
    		$campoMail = $_POST['mailContactar'];
    		$campoComentarios = $_POST['comentariosContactar'];

			
    		/*
				Para mandar email tenemos que dotar al servidor tenemos varias opciones:
					- Usar la función mail, para ello el servidor debe estar configurado correctamente.
					- Usar la función PHPMailer. 

				A continuación vamos a usar la classe PHPMailer para mandar mail 
				sin tener que configurar el servidor PHP.

				
    		*/



			//Mostramos al usuario los datos que hemos recogido
			echo '<h4>Datos enviados:</h4>
			<h5>Nombre : '.$campoNombre.'.</h5>
			<h5>Apellidos: '.$campoApellidos.'.</h5>
                        <h5>Telefono: '.$campoTelefono.'.</h5>
		        <h5>Género: '.$campoGenero.'.</h5>
			<h5>Mail: '.$campoMail.'.</h5>
			<h5>Comentarios: '.$campoComentarios.'.</h5>';

			echo '<p>Vamos a proceder a enviar el email con tu consulta</p>';

			$mail = new PHPMailer;								  			//Creamos un objeto PHPMailer

			$mail->isSMTP();                                      			// Indicamos que vamos a usar SMTP
			$mail->Host = 'smtp.aplicacioneswebmultiplataforma.es';  		// Especificamos el servidor SMTP
			$mail->SMTPAuth = true;                               			// Nuestro servidor SMTP requiere authentication
			$mail->Username = 'pruebas@aplicacioneswebmultiplataforma.es'; 	// Usuario SMTP
			$mail->Password = 'usuariosaula'; 								// Contraseña SMTP 
			//$mail->SMTPSecure = 'tls';                          			// Encriptación tls

			$mail->From = 'pruebas@aplicacioneswebmultiplataforma.es';
			$mail->FromName = 'WEB: Aplicaciones Web Multiplataforma';
			$mail->addAddress('jgv9978@gmail.com', 'Contactar'); //Añadimos destinatario, el nombre es opcional
			$mail->AddReplyTo('pruebas@aplicacioneswebmultiplataforma.es','Usuario Web');//Añadimos correo de respuesta = original (NO SPAM)
			//$mail->addCC('jgv9978@gmail.com');		// Añadimos opcionalmente otro mail, campo CC
			//$mail->addBCC('jgv9978@gmail.com');			 / Añadimos opcionalmente otro mail, campo  BCC
			
			//$mail->SMTPDebug = 1;											//Activamos debug para pruebas, al sacar a producción OMITIRLA
			
			$mail->WordWrap = 50;                                 			// Indicamos el número de caracteres por línea
			$mail->isHTML(true);                                  			// Indicamos que vamos a enviar HTML en el mail

			$mail->Subject = 'Escribe aqui el asunto';
			$mail->Body    = '
							<h4>Tienes un contacto desde la web AplicacionesWebMultiplataforma</h4>
							<h5>Nombre: <i>'.$campoNombre.'</i></h5>
				   			<h5>Apellidos: <i>'.$campoApellidos.'</i></h5>
				    		<h5>Mail del usuario: <i>'.$campoMail.'</i></h5>
						<h5>Genero: <i>'.$campoGenero.'</i></h5>
						<h5>Telefono: <i>'.$campoTelefono.'</i></h5>
				    		<h5>comentarios <i>'.$campoComentarios.'</i></h5>';
				    		


			$mail->AltBody = 'Este es el cuerpo en texto plano para cliente que no soportan email con HTML:

							Tienes un contacto desde la web AplicacionesWebMultiplataforma.\n
							Nombre: '.$campoNombre.'\n
				   			Apellidos: '.$campoApellidos.'\n
							Telefono: '.$campoTelefono.'\n
				    		Mail del usuario: '.$campoMail.'\n
						        Genero: '.$campoGenero.'\n
				    		comentarios: '.$campoComentarios.'\n';
				    		

			if(!$mail->send()) {
			    echo '¡Atención! El mensaje no se ha podido enviar.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Información recibida correctamente. Gracias por contactar con nosotros, le responderemos lo antes posible al email indicado.';
			}


			
echo '
	</article>
	<footer data-role="footer" data-id="menuInferior" data-position="fixed" data-theme="a">
		<nav data-role="navbar">
			<ul>
				<li><a href="#boton"  data-icon="home">Botón</a></li>
				<li><a href="#listas" data-icon="grid">Lista</a></li>
				<li><a href="#tab-bar" data-icon="star">Tab</a></li>
				<li><a href="#form"  data-icon="info">Form</a></li>
				<li><a href="#mail" class="ui-btn-active ui-state-persist" data-icon="mail">Mail</a></li>
			</ul>
		</nav>
	</footer><!-- /footer -->

</section><!-- /page -->



</body>
</html>';



?>
