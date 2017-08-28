<?php

//Recogemos el valor de la variable HTTP_USER_AGENT donde está almacenado el valor del navegador & SO
$infoAgent=$_SERVER['HTTP_USER_AGENT'];	
	

/* Función que busca dentro del fichero XML y devuelve el modo de vista.
	Valores posibles: normal, multiplataforma o desconocido
	Nombre del fichero: navegador.xml en la misma carpeta que este fichero
*/
function dame_vista_dispositivo($variableNavegador){


	//Valor por defecto en caso de no encontrar el valor en el fichero
	$vistaDevuelta = array('vista' => 'desconocido', 'encontrado' => false);

	/* Se puede cargar el fichero de varias formas usando:
		- new SimpleXMLElement
		- simplexml_load_file(fichero)

	*/
	//$navegadores = new SimpleXMLElement('navegador.xml', NULL, TRUE);

	$navegadoresXML = simplexml_load_file('navegadores.xml'); 
	$encontrado=false;
	
	// Recorremos el arbol del fichero XML
	foreach($navegadoresXML->children() as $nodo){
		/*
		$nodo->useragent: Valor del navegador
		$nodo->vista: Valor de la vista
		*/
		if($variableNavegador == $nodo->useragent){

				$vistaDevuelta['vista'] = $nodo->vista;
				$vistaDevuelta['encontrado'] = true;
				
		}
	  	
	}

	//echo "Valor devuelto: VISTA-> ".$vistaDevuelta['vista']." ENCONTRADO-> ".$vistaDevuelta['encontrado'];

	//Creamos una variable de sesion por defecto almacenaremos si es versión móvil o normal.
	//lo haremos a nivel de sesión con sessionStorage
	//Puedes ver que se ha creado debes entrar en modo desarrollo en el navegador

	echo '
		<script>
			sessionStorage.setItem("modoNavegador","'.$vistaDevuelta['vista'].'");
		</script>';
	

	return $vistaDevuelta;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>		

	<meta charset="utf-8" />	

	<title>Estable</title>

	<!-- Definición de los archivos JS de forma local en nuestro servidor -->

	<script type="text/javascript" src="js/jquery-1.11.1.js"></script>

	<!-- Fichero que se refiere a jQuery UI para poder usar sus diseños -->

	<script type="text/javascript" src="js/jquery-ui.js"></script>

	<!-- Añadimos la hoja de estilo de jQuery UI para poder usar sus diseños-->

	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	

	<!--Fichero donde tendremos nuestro script de jQuery-->
	
	<script type="text/javascript" src="js/miarchivojquery.js"></script>

</head>
<body>

<section>

	<article>
		 

		
			<?php 
			/*
			#####################################################################################################
				Este código es el que va a conmutar dependiendo del navegador del usuario
				Se digirá al archivo pc.html o al archivo mobile/index.html dependiendo del valor que encuentre
				Si haces botón derecho sobre ésta página mientras está en el navegador no verás todo éste código,
				ya que éstas acciones se realizan del lado del servidor, no del cliente.

			*/
					$valorDevuelto = dame_vista_dispositivo($infoAgent); 

					if($valorDevuelto['encontrado'] == true){

						echo "<h3>Hemos encontrado tu dispositivo en nuestra base de datos, la navegación será <b>".strtoupper($valorDevuelto['vista'])."</b></h3>";

						if($valorDevuelto['vista'] == 'normal'){
							//Es un PC, lo redirigimos a la versión normal pasados 10 segundos
							echo '<meta http-equiv="refresh" content="10;URL=index.html" />';
						}else{
							//Es un dispositivo móvil o desconocido, lo redirigimos a la versión mobile pasados 10 segundos
							echo '<meta http-equiv="refresh" content="10;URL=mobile/index.html" />';

						}
						
						
					}else{

						echo "<h3>NO hemos encontrado tu dispositivo en nuestra base de datos, la navegación por defecto será  <b>MULTIPLATAFORMA</b></h3>";
						echo '<meta http-equiv="refresh" content="10;URL=mobile/index.html" />';

					}
					echo '<p id="contadorAtras">10</p>';
			/*
				Ya hemos realizado todas las comprobaciones podemos seguir escribiendo código HTML, para ello,
				cerramos la etiqueta reservada ?> para indicar al servidor que lo que viene a continuación lo 
				muestre automáticamente al usuario.
			#####################################################################################################
			*/
			?>
	        <a id="inicio" href="index.html">VERSIÓN PC</a><a id="inicio" href="mobile/index.html">MULTIPLATAFORMA</a>

	</article>

	

		

</section>

</body>
</html>
