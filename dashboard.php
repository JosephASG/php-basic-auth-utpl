<?php
// Hecho por Joseph Santamaria
// https://joseph-san.com

session_start();

include("connection.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/svg+xml" href="./public/favicon.svg" />
	<link rel="shortcut icon" href="./public/favicon.ico" />
	<title>UTPL - Dashboard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="./public/css/style.css">
	<script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<script src="https://kit.fontawesome.com/4a4a9dcee8.js" crossorigin="anonymous"></script>
</head>

<body class="w-screen h-screen flex flex-col bg-[#070707] overflow-x-hidden">
	<!-- Imagen de fondo -->
	<img src="./public/img/bg-2.jpg" alt=""
		class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full object-cover -z-10 brightness-50 opacity-30">

	<!-- Main Content with Sidebar -->
	<div class="flex flex-grow h-screen">
		<!-- Simple Sidebar -->
		<aside class="w-64 bg-black/30 backdrop-blur-sm border-r border-white/10 flex flex-col justify-between">
			<div>
				<div class="p-6 border-b border-white/10 flex justify-start items-center gap-2">
					<img src="./public/img/utpl.png" alt="UTPL Logo" class="h-8 mb-2">
					<h1 class="text-white text-xl font-bold">UTPL</h1>
				</div>
				<nav class="p-4">
					<ul class="space-y-2">
						<li>
							<a href="index.php"
								class="flex items-center space-x-3 text-white/70 hover:text-white hover:bg-white/5 rounded-md px-4 py-3 transition-colors duration-300">
								<i class="fa-solid fa-home"></i>
								<span>Inicio</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="p-4 border-t border-white/10">
				<a href="logout.php"
					class="flex items-center space-x-3 text-red-400 hover:text-red-300 hover:bg-white/5 rounded-md px-4 py-3 transition-colors duration-300">
					<i class="fa-solid fa-sign-out-alt"></i>
					<span>Cerrar Sesión</span>
				</a>
			</div>
		</aside>

		<!-- Main Content -->
		<main class="flex-grow p-8 flex flex-col relative">
			<!-- Simple Welcome Message -->
			<div class="max-w-3xl">
				<h2 class="text-3xl font-bold text-white mb-4">Bienvenido, <?php echo $user_data['user_name']; ?></h2>
				<p class="text-white/70 text-lg">
					Este es tu dashboard personal. Desde aquí puedes acceder a todas las funcionalidades del sistema.
				</p>
			</div>

			<!-- Footer -->
			<footer class="mt-auto py-4 absolute bottom-2">
				<div class="text-white/50 text-sm mb-2">
					&copy; 2025 BAP by Joseph Santamaria. Todos los derechos reservados.
				</div>
				<div class="text-white/50 text-sm">
					Hecho con <span class="text-red-500">❤️</span> por <a href="https://joseph-san.com" target="_blank"
						class="text-slate-500 hover:text-gray-300 hover:underline transition-colors duration-300">Joseph
						Santamaria</a>
				</div>
			</footer>
		</main>
	</div>
</body>

</html>