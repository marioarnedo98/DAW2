function ejercicio9(comp){
 var fruta = prompt("Porfavor, inserta una fruta de las que hay abajo", comp.value);
var x= fruta.length;
var cadena_invertida="hola";
while (x>=0) {
    cadena_invertida=cadena_invertida+fruta.charAt(x);
}
alert(cadena_invertida);    
// switch (fruta) {
//     case "Manzana":
//         alert("Holi");
//         break;

//     default:
//         break;
//     }
}
