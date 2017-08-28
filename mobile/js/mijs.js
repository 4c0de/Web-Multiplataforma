
$(document).ready(function(){



     //ocultamos por defecto
     $("#mapa").hide();

     //función para mostrar u ocultar el mapa evento click
     $("#mostrar").click(function(){

        if ($("#mapa").is(":visible")){

              $("#mapa").hide();
        }else{
            $("#mapa").show();
            $('#mapa').gMap({ markers: [{latitude: , longitude: , title:'Vulcanos S.L.'}], 
                             zoom: 18 

            });     
        }  

     });



});//fin de lectura documento



  





