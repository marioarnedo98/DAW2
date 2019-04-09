<?php
$bd="chat";
$server="localhost";
$user="root";
$pass="";
$conexion = @mysqli_connect($server, $user, $pass, $bd);
if(!$conexion) die("Error");
$usuario=$_POST['user'];
$mensaje=$_POST['message'];
$sql="INSERT INTO conversacion (usuario, mensaje) 
VALUES('$usuario', '$mensaje')";
$result= mysqli_query($conexion,$sql);
if($result){
    echo"ok";
}
?>