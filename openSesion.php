<?php 
//archivo php con conexión
include("connection.php");
session_start();
if (!isset($_SESSION['name'])) {
	header("Location: login.php");
}

$name = $_SESSION['name'];

$sql = "SELECT * FROM usuarios WHERE name = '$name'";

$resultado = $connection->query($sql);
$row = $resultado->fetch_assoc();

?>
	<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>Sesión</title>
		<link rel="stylesheet" type="text/css" href="main.css">
	</head>
	<body>
		<h1>Sesión abierta</h1>

		<section>
			<article class="fondo_formulario">
				<div>
					- Nombre: 			 <?php echo $row['name']; 			?> <br>
					- Apellido: 		 <?php echo $row['last_name'];  		?> <br>
					- Nombre de usuario: <?php echo $row['nickname']; 			?> <br>
					- Correo: 			 <?php echo $row['email'];		?> <br>
				</div> 
		
				<form action="passwordUpdate.php">		
					<input type="submit" name="password" value="Actualizar contraseña" class="button">
				</form>

				<form action="emailUpdate.php">		
					<input type="submit" name="email" value="Actualizar correo" class="button">
				</form>

				<form action="nicknameUpdate.php">		
					<input type="submit" name="user" value="Actualizar usuario" class="button">
				</form>

				<br>

				<form action="closeSesion.php">
					<input type="submit" name="menu" value="Cerrar sesión" class="button">
				</form>
			</article>
		</section>
	</body>
	</html>
<?php 

?>