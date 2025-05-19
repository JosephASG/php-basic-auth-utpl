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
	<title>Dashboard - Basic Auth PHP by Joseph Santamaria</title>
	<meta name="description" content="Dashboard de usuario del sistema de autenticación básico en PHP.">
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

	<header
		class="md:hidden bg-black/30 backdrop-blur-sm border-b border-white/10 p-4 flex justify-between items-center">
		<div class="flex items-center gap-2">
			<img src="./public/img/utpl.png" alt="UTPL Logo" class="h-6">
			<h1 class="text-white text-lg font-bold">UTPL</h1>
		</div>
		<div class="flex items-center gap-4">
			<!-- Botón de cerrar sesión para móvil -->
			<a href="logout.php" class="text-red-400 hover:text-red-300 transition-colors duration-300">
				<i class="fa-solid fa-sign-out-alt text-lg"></i>
			</a>
			<!-- Botón de menú para móvil -->
			<button id="mobile-menu-button" class="text-white focus:outline-none">
				<i class="fa-solid fa-bars text-xl"></i>
			</button>
		</div>
	</header>

	<div class="flex flex-grow h-screen">
		<aside id="sidebar"
			class="fixed top-0 md:relative w-64 md:w-64 bg-black/30 backdrop-blur-sm border-r border-white/10 flex flex-col justify-between h-full z-30 transition-all duration-300 transform -translate-x-full md:translate-x-0">
			<div>
				<div class="p-6 border-b border-white/10 flex justify-between items-center relative header-desktop">
					<div class="flex items-center gap-2">
						<img src="./public/img/utpl.png" alt="UTPL Logo" class="h-8 w-auto object-cover">
						<h1 class="text-white text-xl font-bold sidebar-text">UTPL</h1>
					</div>
					<button id="toggle-sidebar"
						class="absolute hidden text-white focus:outline-none -right-4 top-1/2 -translate-y-1/2 bg-black/30 rounded-full h-7 w-7 border border-white/10 hover:bg-white/5 transition-colors duration-300 md:flex justify-center items-center cursor-pointer">
						<i class="fa-solid fa-chevron-left text-sm"></i>
					</button>
				</div>
				<nav class="p-4">
					<ul class="space-y-2">
						<li>
							<a href="index.php"
								class="flex items-center space-x-3 text-white/70 hover:text-white hover:bg-white/5 rounded-md px-4 py-3 transition-colors duration-300 item-sidebar">
								<i class="fa-solid fa-home"></i>
								<span class="sidebar-text">Inicio</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>
			<div class="p-4 border-t border-white/10">
				<a href="logout.php"
					class="flex items-center space-x-3 text-red-400 hover:text-red-300 hover:bg-white/5 rounded-md px-4 py-3 transition-colors duration-300 item-sidebar">
					<i class="fa-solid fa-sign-out-alt"></i>
					<span class="sidebar-text">Cerrar Sesión</span>
				</a>
			</div>
		</aside>

		<button id="expand-sidebar"
			class="fixed left-0 top-1/2 -translate-y-1/2 bg-black/30 backdrop-blur-sm text-white p-2 rounded-r-md border-r border-t border-b border-white/10 hidden z-20">
			<i class="fa-solid fa-chevron-right"></i>
		</button>

		<main id="main-content" class="flex-grow p-4 md:p-8 flex flex-col relative transition-all duration-300">
			<div class="max-w-3xl">
				<h2 class="text-2xl md:text-3xl font-bold text-white mb-4">Bienvenido,
					<?php echo $user_data['user_name']; ?>
				</h2>
				<p class="text-white/70 text-base md:text-lg">
					Este es tu dashboard personal. Desde aquí puedes acceder a todas las funcionalidades del sistema.
				</p>
			</div>
			<!-- Footer -->
			<footer class="mt-auto py-2 max-md:py-6">
				<div class="flex items-center mb-4 gap-4">
					<img src="./public/logo-bap-home.png" alt="UTPL Logo" class="h-8">
					<span class="text-white">x</span>
					<img src="./public/img/utpl.png" alt="UTPL Logo" class="h-8">
				</div>
				<div class="text-white/50 text-xs md:text-sm mb-2">
					&copy; 2025 BAP by Joseph Santamaria. Todos los derechos reservados.
				</div>
				<div class="text-white/50 text-xs md:text-sm">
					Hecho con <span class="text-red-500">❤️</span> por <a href="https://joseph-san.com" target="_blank"
						class="text-slate-500 hover:text-gray-300 hover:underline transition-colors duration-300">Joseph
						Santamaria</a>
				</div>
			</footer>
		</main>
	</div>

	<!-- JavaScript para el sidebar retráctil -->
	<script>
		document.addEventListener('DOMContentLoaded', function () {
			const sidebar = document.getElementById('sidebar');
			const mainContent = document.getElementById('main-content');
			const toggleSidebar = document.getElementById('toggle-sidebar');
			const expandSidebar = document.getElementById('expand-sidebar');
			const mobileMenuButton = document.getElementById('mobile-menu-button');
			const headerDesktop = document.querySelector('.header-desktop');
			const sidebarTexts = document.querySelectorAll('.sidebar-text');
			const itemSidebar = document.querySelectorAll('.item-sidebar');

			// Estado del sidebar
			let sidebarCollapsed = false;

			// Función para colapsar el sidebar en desktop
			function collapseSidebar() {
				sidebar.classList.add('md:w-16');
				sidebar.classList.remove('md:w-64');
				mainContent.classList.add('md:ml-8');
				mainContent.classList.remove('md:ml-4');
				headerDesktop.classList.add('md:px-2');
				headerDesktop.classList.add('md:justify-center');
				toggleSidebar.innerHTML = '<i class="fa-solid fa-chevron-right text-sm"></i>';
				expandSidebar.classList.remove('hidden');
				sidebarTexts.forEach(text => text.classList.add('md:hidden'));
				itemSidebar.forEach(text => text.classList.remove('space-x-3'));
				itemSidebar.forEach(text => text.classList.add('md:justify-center'));
				sidebarCollapsed = true;
			}

			// Función para expandir el sidebar en desktop
			function expandSidebarFunc() {
				sidebar.classList.remove('md:w-16');
				sidebar.classList.add('md:w-64');
				mainContent.classList.remove('md:ml-8');
				mainContent.classList.add('md:ml-4');
				headerDesktop.classList.remove('md:px-2');
				headerDesktop.classList.remove('md:justify-center');
				toggleSidebar.innerHTML = '<i class="fa-solid fa-chevron-left text-sm"></i>';
				expandSidebar.classList.add('hidden');
				sidebarTexts.forEach(text => text.classList.remove('md:hidden'));
				itemSidebar.forEach(text => text.classList.add('space-x-3'));
				itemSidebar.forEach(text => text.classList.remove('md:justify-center'));
				sidebarCollapsed = false;
			}

			// Toggle sidebar en desktop
			toggleSidebar.addEventListener('click', function () {
				if (sidebarCollapsed) {
					expandSidebarFunc();
				} else {
					collapseSidebar();
				}
			});

			// Expandir sidebar cuando está colapsado
			expandSidebar.addEventListener('click', expandSidebarFunc);

			// Toggle sidebar en mobile
			mobileMenuButton.addEventListener('click', function () {
				sidebar.classList.toggle('-translate-x-full');
			});

			// Cerrar sidebar en mobile al hacer clic fuera
			document.addEventListener('click', function (event) {
				const isMobile = window.innerWidth < 768;
				const clickedInsideSidebar = sidebar.contains(event.target);
				const clickedOnMenuButton = mobileMenuButton.contains(event.target);

				if (isMobile && !clickedInsideSidebar && !clickedOnMenuButton && !sidebar.classList.contains('-translate-x-full')) {
					sidebar.classList.add('-translate-x-full');
				}
			});

			// Ajustar según el tamaño de la pantalla
			function handleResize() {
				if (window.innerWidth < 768) {
					sidebar.classList.add('-translate-x-full');
					mainContent.classList.remove('md:ml-4', 'md:ml-16');
					itemSidebar.forEach(text => text.classList.add('space-x-3'));
				} else {
					if (sidebarCollapsed) {
						sidebar.classList.add('md:w-16');
						sidebar.classList.remove('md:w-64');
						mainContent.classList.add('md:ml-8');
						mainContent.classList.remove('md:ml-4');
						sidebarTexts.forEach(text => text.classList.add('md:hidden'));
					} else {
						sidebar.classList.remove('md:w-16');
						sidebar.classList.add('md:w-64');
						mainContent.classList.remove('md:ml-8');
						mainContent.classList.add('md:ml-4');
						sidebarTexts.forEach(text => text.classList.remove('md:hidden'));
					}
					sidebar.classList.remove('-translate-x-full');
				}
			}

			// Ejecutar al cargar y al cambiar el tamaño de la ventana
			handleResize();
			window.addEventListener('resize', handleResize);
		});
	</script>
</body>

</html>