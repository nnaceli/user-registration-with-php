<?php  
//archivo php con conexión
include("connection.php");

//registro de usuario
if(isset($_POST["Registar"])) {
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$lastName = mysqli_real_escape_string($connection, $_POST['lastName']);
	$nickName = mysqli_real_escape_string($connection, $_POST['nickName']);
	$email = mysqli_real_escape_string($connection, $_POST['email']);
	$psw = mysqli_real_escape_string($connection, $_POST['password']);
	$psw_encriptada = md5($psw);//encriptación de contraseña

	//consulta para comprobar si ya existe el usuario
	$sqluser = "SELECT id_usuario FROM usuarios
				WHERE nickname = '$nickName'";

	$resultado = $connection->query($sqluser);//resultado de la consulta
	$filas = $resultado->num_rows;//cantidad de filas en el resultado de la consulta

	//verificación de la existencia de usuario y registro (en el caso de no existir)
	if ($filas > 0) {
		echo "<script>
			alert('El usuario ingresado ya exite, pruebe con otro nombre');
			</script>";
	}else {
		$sqlRegister = "INSERT INTO usuarios 
					(name, last_name, nickname, email, password) 
					VALUES ('$name', '$lastName', '$nickName', '$email', '$psw_encriptada')";

		$resultado = $connection->query($sqlRegister);

		if ($resultado > 0) {
			echo "<script>
			alert('Registro exitoso');
			</script>";
			header("location: openSesion.php");
		}else {
			echo "<script>
			alert('Error al registrarse');
			window.location = registerUser.php;
			</script>";
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	<h1>Registro</h1>

	<section>
		<article class="fondo_formulario">
			<form action="registerUser.php" method="post">
					<div>
						<label>Nombre</label><input type="text" name="name" class="input">
					</div>

					<div>
						<label>Apellido</label><input type="text" name="lastName" class="input">
					</div>

					<div>
						<label>Nombre de usuario</label><input type="text" name="nickName" class="input">
					</div>
						
					<div>
						<label>Correo</label><input type="email" name="email" class="input">
					</div>

					<div>
						<label>Contraseña</label><input type="password" name="password" class="input">
					</div>
				
				<input type="submit" name="Registar" value="Registar" class="button">
			</form>

			<form action="index.php">
				<input type="submit" name="menu" value="Menú" class="button">
			</form>
		</article>
	</section>
</body>
</html>