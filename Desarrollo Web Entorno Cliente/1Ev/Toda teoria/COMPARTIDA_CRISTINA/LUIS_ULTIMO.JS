// A)

var arr = [];
var divs = document.querySelectorAll('div');
for (var i = divs.length; i--; arr.unshift(divs[i]));

/*
	Lo que hace es añadir todas las divs de un documento a un Array empezando por el último div.
*/



// B)
var arr2 = [];
var elementosInput = document.getElementsByTagName('input'); //Elementos input
var elementosSelect = document.getElementsByTagName('select');
for (var i = elementosInput.length; i--; arr2.unshift(elementosInput[i]));
for (var i = elementosSelect.length; i--; arr2.unshift(elementosSelect[i]));
alert('Tenemos un número de elementos input ó select en el formulario: ' + arr2.length);