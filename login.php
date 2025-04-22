<?php
// Hecho por Joseph Santamaria
// https://joseph-san.com

session_start();

include("connection.php");
include("functions.php");

if (is_logged_in($con)) {
	header("Location: index.php");
	exit;
}

$error_message = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];

	if (!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

		$stmt = mysqli_prepare($con, "SELECT user_id, password FROM usuarios WHERE user_name = ? LIMIT 1");

		if ($stmt) {
			mysqli_stmt_bind_param($stmt, "s", $user_name);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);

			if (mysqli_stmt_num_rows($stmt) > 0) {
				mysqli_stmt_bind_result($stmt, $user_id, $hashed_password);
				mysqli_stmt_fetch($stmt);

				if (password_verify($password, $hashed_password)) {
					$_SESSION['user_id'] = $user_id;
					header("Location: index.php");
					die;
				}
			}

			$error_message = "Usuario o contraseña incorrectos.";
			mysqli_stmt_close($stmt);
		} else {
			$error_message = "Error en la base de datos.";
		}
	} else {
		$error_message = "Por favor completa todos los campos.";
	}
}
?>


<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/svg+xml" href="./public/favicon.svg" />
	<link rel="shortcut icon" href="./public/favicon.ico" />
	<title>Login - UTPL</title>
	<link rel="stylesheet" href="./public/css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<script src="https://kit.fontawesome.com/4a4a9dcee8.js" crossorigin="anonymous"></script>
</head>

<body class="w-screen h-screen flex flex-col items-center justify-between bg-[#070707]">
	<!-- Botón de regreso al home -->
	<div class="absolute top-4 left-4">
		<a href="home.php"
			class="text-white hover:text-gray-300 transition-colors duration-300 flex items-center gap-2">
			<i class="fa-solid fa-arrow-left"></i>
			<span>Regresar al inicio</span>
		</a>
	</div>

	<!-- Imagen de fondo -->
	<img src="./public/img/bg.jpg" alt=""
		class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full opacity- object-cover -z-10 brightness-50 opacity-30">

	<!-- Contenedor principal -->
	<div class="flex-grow flex items-center justify-center w-full">
		<div id="box" class="w-[20%] p-">
			<?php if (!empty($error_message)): ?>
				<div class="text-red-500 bg-red-100 border border-red-300 px-4 py-2 rounded mb-6">
					<?= $error_message ?>
				</div>
			<?php endif; ?>
			<form method="post" class="flex flex-col items-center justify-center gap-4 w-full">
				<div class="flex flex-col items-center justify-center mb-4">
					<img src="./public/img/utpl.png" alt="" class="w-auto h-12 object-cover -z-10 mb-2">
					<div class="mr-4 text-white text-2xl text-left">Iniciar sesión</div>
					<div class="text-white/30 text-sm text-center">UTPL</div>
				</div>
				<div class="flex flex-col gap-2 w-full">
					<label for="user_name" class="text-white text-base">Nombre de usuario</label>
					<input id="user_name" type="text" name="user_name"
						class="bg-white/5 backdrop-blur-md text-white px-3 py-2 rounded-md w-full text-base"
						placeholder="ejemplo: juan123" required>

					<label for="password" class="text-white text-base">Contraseña</label>
					<div class="relative">
						<input id="password" type="password" name="password"
							class="bg-white/5 backdrop-blur-md text-white px-3 py-2 rounded-md w-full text-base pr-10"
							placeholder="Contraseña" required>
						<button type="button" id="togglePassword"
							class="absolute right-3 top-1/2 -translate-y-1/2 text-white/50 hover:text-white focus:outline-none">
							<i class="fa-solid fa-eye"></i>
						</button>
					</div>

					<button id="button" type="submit"
						class="bg-white text-black rounded-md py-2 cursor-pointer flex justify-center items-center gap-4 hover:bg-gray-300 duration-300 mt-2">
						<span class="text-base">Continuar</span>
						<i class="fa-solid fa-arrow-right text-base"></i>
					</button>

					<!-- Separador -->
					<div class="relative my-4 flex justify-center items-center">
						<div class="bg-white/30 h-px w-full"></div>
						<span class="px-2 text-xs text-white/50">
							o
						</span>
						<div class="bg-white/30 h-px w-full"></div>
					</div>

					<!-- Link a registro -->
					<div class="text-sm text-center text-slate-500 dark:text-slate-400">
						¿No tienes cuenta?
						<a href="signup.php" class="text-slate-900 dark:text-white hover:underline">
							Regístrate
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- Footer -->
	<footer class="w-full py-4 px-6 text-center absolute bottom-0">
		<div class="container mx-auto">
			<div class="text-white/50 text-sm mb-2">
				&copy; 2025 BAP by Joseph Santamaria. Todos los derechos reservados.
			</div>
			<div class="text-white text-sm">
				Hecho con <span class="text-red-500">❤️</span> por <a href="https://joseph-san.com" target="_blank"
					class="text-slate-500 dark:text-slate-400 hover:underline hover:text-gray-200 hover:underline transition-colors duration-300">Joseph
					Santamaria</a>
			</div>
		</div>
	</footer>

	<!-- JavaScript para el toggle de contraseña -->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const togglePassword = document.getElementById('togglePassword');
			const password = document.getElementById('password');

			togglePassword.addEventListener('click', function () {
				// Cambiar el tipo de input
				const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
				password.setAttribute('type', type);

				// Cambiar el icono
				this.querySelector('i').classList.toggle('fa-eye');
				this.querySelector('i').classList.toggle('fa-eye-slash');
			});
		});
	</script>
</body>

</html>