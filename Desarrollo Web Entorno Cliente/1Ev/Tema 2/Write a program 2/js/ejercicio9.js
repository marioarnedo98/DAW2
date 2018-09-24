function ejercicio9(comp){
 var fruta = prompt("Porfavor, inserta una fruta de las que hay abajo", comp.value);
var x;
var arraycadena=[];
var definitiva=[];
for(x=fruta.length;x>=0;x--) {
    arraycadena.push(fruta.charAt(x));

}  
alert(arraycadena);
definitiva = arraycadena.splice(0,1);
alert(definitiva);
switch (fruta) {
    case "Manzana":
        alert("Holi");
        break;

    default:
        break;
    }
}
