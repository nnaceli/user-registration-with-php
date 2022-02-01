<?php 
//archivo php con conexión
include("connection.php");

session_start();
if (!isset($_SESSION['name'])) {
	header("Location: openSesion.php");
}

$name = $_SESSION['name'];

if (!empty($_POST)) {

	$usernew = mysqli_real_escape_string($connection, $_POST['user']);

	$sql = "UPDATE usuarios
		SET nickname = '$usernew'
		WHERE name = '$name'";

	$resultado = $connection->query($sql);

	echo "
		<script>
			alert('Actualización exitosa');
		</script>";
	header("location: openSesion.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Actualización de usuario</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Actualización de usuario</h1>

	<section>
		<article class="fondo_formulario">
			<form action="nicknameUpdate.php" method="post">
				<input type="text" name="user" placeholder="nuevo usuario" class="input"><br><br>
				<input type="submit" name="actualizar_usuario" value="Actualizar" class="button">
			</form>
		</article>
	</section>
</body>
</html>