<?php 
//archivo php con conexión
include("connection.php");

session_start();
if (!isset($_SESSION['name'])) {
	header("Location: openSesion.php");
}

$name = $_SESSION['name'];

if (!empty($_POST)) {

	$passwordnew = mysqli_real_escape_string($connection, $_POST['password']);
	$psw_encriptada = md5($passwordnew);

	$sql = "UPDATE usuarios
		SET password = '$psw_encriptada'
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
	<title>Actualización de contraseña</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Actualización de contraseña</h1>

	<section>
		<article class="fondo_formulario">
			<form action="passwordUpdate.php" method="post">
				<input type="password" name="password" placeholder="nueva contraseña" class="input"><br><br>
				<input type="submit" name="actualizar_contraseña" value="Actualizar" class="button">
			</form>
		</article>
	</section>
</body>
</html>