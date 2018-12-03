<html>
<head>
<title>Escribe un programa</title> <meta charset="utf-8">
<script type="text/javascript">
function dime_tipo_motor() {
     var tipo;
     tipo=prompt("Introduce tipo de motor");
     tipo=Number(tipo);

     switch (tipo) {
       case 0: alert("No hay establecido un valor definido para el tipo de bomba"); break;
       case 1: alert("La bomba es una bomba de agua"); break;
       case 2: alert("La bomba es una bomba de gasolina"); break;
       case 3: alert("La bomba es una bomba de hormigón"); break;
       case 4: alert("La bomba es una bomba de planta alimenticia"); break;
       default: alert("El valor introducido no es válido");
     } // Cierre del switch
} // Cierre de la función

</script>
</head>
<body>
<div>
<p>Aquí un párrafo de texto situado antes de la imagen, dentro de un div contenedor</p>
<img onclick="dime_tipo_motor()" src="http://i.imgur.com/afC0L.jpg" alt="Notepad++" title="Notepad++, un útil editor de texto">
<p onclick ="alert('Alerta JavaScript')" style="color: #D2691E;">Aquí otro párrafo de texto. JavaScript es un lenguaje utilizado para dotar de efectos dinámicos a las páginas web.
</p>
</div>
</body>
</html>

