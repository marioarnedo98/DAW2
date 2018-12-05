// ########################### Ejercicio 7 ###########################

var tipo = prompt('Ingresa un tipo de motor: ');
dimeTipoMotor(tipo);

function dimeTipoMotor(tipoMotor) {

    switch (tipoMotor) {
        case 0:
            console.log('No hay establecido un valor definido para el tipo de bomba');
            break;

        case 1:
            console.log('La bomba es una bomba de agua');
            break;

        case 2:
            console.log('La bomba es una bomba de gasolina');
            break;

        case 3:
            console.log('La bomba es una bomba de hormigón');
            break;

        case 4:
            console.log('La bomba es una bomba de pasta alimenticia');
            break;

        default:
            console.log('“No existe un valor válido para tipo de bomba');
            break;
    }

}
// ###################################################################





// ########################### Ejercicio 8 ###########################
var nombres = [];
nombres[0] = 'Luis';
nombres[1] = 'Luzuriaga';
nombres[3] = 'Manero';

nombres.forEach(element => {
    console.log(element);
})
// ###################################################################





// ########################### Ejercicio 9 ###########################
var palabra = 'Manzana';
console.log(palabra);
console.log(palabra.split('').reverse().join(""));
// ###################################################################