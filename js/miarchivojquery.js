$(document).ready(function(){

	//Usamos jqueryUI, llamando al método button para que
	//los elementos tomen apariencia de botón
   $( "input[type=submit], a, button" )

   .button()


      
	var i = 9;
	var tiempo=1000;

    setTimeout(function() {actualizaContador2()}, tiempo);

    //Esta función va a restar una unidad y esperar un intervalo
    function sigueRestando(){
    	j= i;
    	i--;
		console.log("Sigo restando, Intervalo="+tiempo+", Entrada="+j+", Salida="+i);
		setTimeout(function() {actualizaContador2()}, tiempo);
    }
    
   //Esta función actualiza el valor del texto con el valor dado
   //en la variable i
    function actualizaContador2(){

		$("#contadorAtras").text(i);
		console.log('Actualizo valor del contador: '+i);
		if(i!=1){
			sigueRestando();
		}else{
			console.log('Contador ha llegado al final -> Realizo acción');
		}
    }

});//fin de la lectura del documento

$(document).ready(function(){

	//Usamos jqueryUI, llamando al método button para que
	//los elementos tomen apariencia de botón
   $( "input[type=submit], a, button" )

   .button()


});//fin de la lectura del documento