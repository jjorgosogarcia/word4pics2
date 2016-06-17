"use strict";
(function () {

    /**************************************************************/
    /***************DECLARACION DE VARIABLES***********************/
    /**************************************************************/  

    var  btdarletra, btborrarletra, letraBorrada, letraDada, res, puntuacion;

    btdarletra = document.getElementById("btdarletra");
    btborrarletra = document.getElementById("btborrarletra");
    

    /**************************************************************/
    /****************************EVENTOS***************************/
    /**************************************************************/

    /*************************MOSTRAR******************************/


    window.onbeforeunload = aparecerLetras();
    
    function aparecerLetras(){
        var procesarRespuesta = function (respuesta) {
            console.log(respuesta);
            //procesar(respuesta);
            if (respuesta.aparecerletras) {    
                res = respuesta.aparecerletras;
                var resArray = res.split("");
                for(var i=0; i<resArray.length; i++){
                    document.getElementById(resArray[i]).style.display="inline-block";
                }
            } else {

            }
        };
        var ajax = new Ajax();
        ajax.setUrl("../ajax/ajaxAparecerLetras.php");
        ajax.setRespuesta(procesarRespuesta);
        ajax.doPeticion();
    }
    
    btborrarletra.addEventListener("click", function () {
        var procesarRespuesta = function (respuesta) {
            console.log(respuesta);
            //procesar(respuesta);
            if (respuesta.borrarletra) {
                letraBorrada = respuesta.borrarletra;
                document.getElementById(letraBorrada).style.display="none";
                btborrarletra.style.display="none";
                puntuacion = document.getElementById("puntuacion");
                puntuacion.textContent=parseInt(puntuacion.textContent)-50 + "puntos";
            } else {

            }
        };
        var ajax = new Ajax();
        
        var datoLetras = encodeURI(res);
        ajax.setUrl("../ajax/ajaxBorrarLetras.php?Letras=" + datoLetras);
        ajax.setRespuesta(procesarRespuesta);
        ajax.doPeticion();
    });
    
    btdarletra.addEventListener("click", function () {
        //alert('hola');
        var procesarRespuesta = function (respuesta) {
            console.log(respuesta);
            //procesar(respuesta);
            if (respuesta.darletra) {
                var letraDada = respuesta.darletra;
                var posicionLetra = letraDada.split("");
                document.getElementById("caja"+posicionLetra[0]).value = posicionLetra[1];
                btdarletra.style.display="none";
                puntuacion = document.getElementById("puntuacion");
                puntuacion.textContent=parseInt(puntuacion.textContent)-50 + "puntos";
            } else {

            }
        };
        var ajax = new Ajax();
        
        ajax.setUrl("../ajax/ajaxDarLetra.php");
        ajax.setRespuesta(procesarRespuesta);
        ajax.doPeticion();
    });


})();