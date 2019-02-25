// This is the custom JavaScript file referenced by index.html. You will notice
// that this file is currently empty. By adding code to this empty file and
// then viewing index.html in a browser, you can experiment with the example
// page or follow along with the examples in the book.
//
// See README.txt for more information.

$(document).ready(function(){
    
    $.fn.cycle.defaults.timeout=10000;
    $.fn.cycle.defaults.random = true;
    $(document).ready(function(){
        $("#books").cycle({
            timeout:10,
        });
    })



//Seleccionar el elemento con id books, guardalo en vble llamada books
//Creo un elem div llamado books-controls, guardalo en vble llamada controls
//Lo inserto despuÃ©s de la div anterior
//Crea un <button> con el texto Pause, que al hacer click, llame a una funcion callback(), en la que se aplique cycle a 
// books en pause. AÃ±adir a este botÃ³n el icono ui-icon-pause de pausa(las dos barras)
//Colgar el elemento de la div controls
var $books = $("#books");
var $controls = $('<div id="books-controls"></div>');
$controls.insertAfter($books);
$('<button>Pause</button>').click(function(event){
    event.preventDefault();
    $books.cycle('pause');
}).button({icons:{primary:  'ui-icon-pause'}}).appendTo($controls);

//AÃ±adir otro botÃ³n Resume exactamente igual
$('<button>Resume</button>').click(function(event){
    event.preventDefault();
    $books.cycle('resume');
}).button({icons:{primary:  'ui-icon-play'}}).appendTo($controls);
//Al hacer el over sobre books, lanza una funcion callback en la que con un metodo para buscar a todos los
//elementos de clase .title se le aplique una animation que cambie el color de fondo y el color de la letra
$books.hover(function(){
    $books.find('.title').animate({
        backgroundColor: '#eee',
        color : '#000'
    },
    1000);
},
function(){
    $books.find('.title').animate({
        backgroundColor: '#eee',
        color : '#fff'
    },
    1000);
})
//Al hacer click sobre h1, llamar a una funciÃ³n para aplicar toggleClass con hightligthed, de forma suave 
$('h1').click(function(){
    $(this).toggleClass('highlighted', 'slow', 'easeInExpo')
})
})