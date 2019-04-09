<?php
$bd = "chat";
$server = "localhost";
$user = "root";
$pass = "";
$conexion = @mysqli_connect($server, $user, $pass, $bd);
if (!$conexion) {
    die("Error");
}
$sql= "SELECT usuario, mensaje FROM conversacion ORDER BY idConversation asc;";
$result= mysqli_query($conexion, $sql);
while ($data=mysqli_fetch_assoc($result)) {
    echo '<p><b>'.$data["usuario"].'</b> dice: '.$data["mensaje"].'</p>';
}