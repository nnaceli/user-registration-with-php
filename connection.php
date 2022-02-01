<?php
include("connectionConfiguration.php");
$connection = new mysqli($server, $user, $psw, $db);
$connection->set_charset("utf8");
if(mysqli_connect_errno()){
	echo "Error en la conexión ", mysqli_connect_error();
	exit();
}
?>