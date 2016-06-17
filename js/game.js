//Funcion que sirve para arrastrar las letras a los campos de texto
function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}


$(".inputs").keyup(function () {
    if (this.value.length == this.maxLength) {
      $(this).next('.inputs').focus();
    }
});

    document.getElementById("caja0").focus();
