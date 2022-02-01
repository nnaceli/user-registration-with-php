<?php
//archivo php con conexión
include("connection.php");
session_start();
if (isset($_SESSION['name'])) {
	header("Location: openSesion.php");
}

//Login
if(!empty($_POST)) {
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$psw = mysqli_real_escape_string($connection, $_POST['password']);
	$psw_encriptada = md5($psw);//encriptación de contraseña

	//consulta para comprobar si existe usaurio y contraseña
	$sql = "SELECT * FROM usuarios
	WHERE email = '$email' AND
	password = '$psw_encriptada'";

	$resultado = $connection->query($sql);
	$rows = $resultado->num_rows;

	if ($rows > 0) {
		$row = $resultado->fetch_assoc();
		$_SESSION['name'] = $row['name'];
		header("location: openSesion.php");
	}else{
		echo "
			<script>
				alert('Usuario o contraseña incorrecta');
				window.location = 'login.php';
			</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Inicio de sesión</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Inicio de sesión</h1>

	<section>
		<article class="fondo_formulario">
			<form action="login.php" method="post">
				<input type="email" name="email" placeholder="correo" class="input"><br>
				<input type="password" name="password" placeholder="contraseña" class="input"><br><br>
				<input type="submit" name="iniciar_sesion" value="Iniciar sesión" class="button">
			</form>

			<form action="index.php">
				<input type="submit" name="menu" value="Menú" class="button">
			</form>
		</article>
	</section>

</body>
</html>
