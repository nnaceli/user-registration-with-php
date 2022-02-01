<?php 
//archivo php con conexión
include("connection.php");

session_start();
if (!isset($_SESSION['name'])) {
	header("Location: openSesion.php");
}

$name = $_SESSION['name'];

if (!empty($_POST)) {

	$emailnew = mysqli_real_escape_string($connection, $_POST['email']);

	$sql = "UPDATE usuarios
		SET email = '$emailnew'
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
	<title>Actualización de correo</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Actualización de correo</h1>

	<section>
		<article class="fondo_formulario">
			<form action="emailUpdate.php" method="post">
				<input type="email" name="email" placeholder="nuevo correo" class="input"><br><br>
				<input type="submit" name="actualizar_correo" value="Actualizar" class="button">
			</form>
		</article>
	</section>
</body>
</html>