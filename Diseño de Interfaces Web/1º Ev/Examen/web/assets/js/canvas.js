            //canvas
    canvas_id=document.getElementById("ejemplo1")
    cxt1=iniciaCanvas("ejemplo1");
    if (cxt1) {
cxt1.beginPath(); //iniciar ruta
grad1=cxt1.createLinearGradient(10,75,200,75); //puntos inicio y final de gradiente
grad1.addColorStop(0,"#ff0000"); //color en punto inicial
grad1.addColorStop(0.3,"#ffffff"); //color en punto medio
grad1.addColorStop(0.6, "#ffff00");
grad1.addColorStop(1,"#18f018"); //color en punto final
cxt1.fillStyle=grad1; //dar color
cxt1.fillRect(10,10,200,130); //rectángulo relleno.
}
