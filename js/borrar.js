/*global document*/
"use strict";
(function () {
    var elementos = document.getElementsByClassName("borrar");
    for (var i = 0; i < elementos.length; i++) {
        var elemento = elementos[i];
        elemento.addEventListener("click", sweet, false);
    }
}());

function sweet(event) {
    event.preventDefault();
swal({
  title: '¿Deseas darte de baja?',
  text: 'En Word4Pics te echaremos de menos',
  type: 'warning',
  showCancelButton: true,
  confirmButtonText: 'Borrar!',
  cancelButtonText: 'Cancelar',
}).then(function() {
     setTimeout(function () {
       window.location.href = "../php/phpdeletprofile.php"; 
    }, 3000);
  swal(
    'Eliminado!',
    'Esperamos volver a verte pronto',
    'success'
  );
}, function(dismiss) {
  // dismiss can be 'cancel', 'overlay', 'close', 'timer'
  if (dismiss === 'cancel') {
    swal(
      'Que alegría',
      'Nos complace ver que has decidido quedarte',
      'error'
    );
  }
});
}

