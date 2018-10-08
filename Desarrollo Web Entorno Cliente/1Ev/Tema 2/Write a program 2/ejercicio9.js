function ejercicio9(comp){
 do{
 var fruta = prompt("Porfavor, inserta "+comp.value, comp.value);
}while (fruta != comp.value);
var x;
var arraycadena=[];
var definitiva=[];

for(x=fruta.length;x>=0;x--) {
    arraycadena.push(fruta.charAt(x));
}  
        alert(fruta+"\n"+arraycadena);
// switch (fruta) {
//     case "Manzana":
//         alert(fruta+"\n"+arraycadena);
//         break;
//         case "Pera":
//         alert(fruta+"\n"+arraycadena);
//         break;
//         case "Fresa":
//         alert(fruta+"\n"+arraycadena);
//         break;
//         case "Nectarina":
//         alert(fruta+"\n"+arraycadena);
//         break;
//         case "Kiwi":
//         alert(fruta+"\n"+arraycadena);
//         break;
//         case "Mango":
//         alert(fruta+"\n"+arraycadena);
//         break;
//         case "Frambuesa":
//         alert(fruta+"\n"+arraycadena);
//         break;


//     default:
//         alert("No existe "+fruta);
//         break;
//     }
}
