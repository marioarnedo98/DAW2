<html>
<head>

    <script>
        var numero = eval(prompt('Introduce un número: '));
        verParIpar(numero);
    
        function verParIpar(numero) {
            if(numero % 2 == 0) alert('par')
            else alert('impar');
        }
    </script>

</head>

</html>