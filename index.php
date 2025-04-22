<?php
// Hecho por Joseph Santamaria
// https://joseph-san.com

session_start();

include("connection.php");
include("functions.php");

$user_data = null;

if (isset($_SESSION['user_id'])) {
    $id = $_SESSION['user_id'];
    $stmt = mysqli_prepare($con, "SELECT * FROM usuarios WHERE user_id = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, "s", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_assoc($result);
    }
    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/svg+xml" href="./public/favicon.svg" />
    <link rel="shortcut icon" href="./public/favicon.ico" />
    <title>Inicio - UTPL</title>
    <link rel="stylesheet" href="./public/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://kit.fontawesome.com/4a4a9dcee8.js" crossorigin="anonymous"></script>
</head>

<body class="w-screen h-screen flex flex-col items-center justify-between bg-[#070707]">
    <!-- Header/Navbar - Simple and Minimal -->
    <header class="py-6 px-6 w-full z-10">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="./public/img/utpl.png" alt="UTPL Logo" class="h-8 mr-3">
                <h1 class="text-white text-xl font-bold">UTPL</h1>
            </div>
            <div class="flex items-center space-x-4">
                <?php if (isset($user_data)): ?>

                    <span class="text-white/70">Hola, <?php echo $user_data['user_name']; ?></span>
                    <a href="dashboard.php"
                        class="hover:bg-gray-300 transition-colors duration-300 bg-white text-black py-2 px-3 rounded-md">
                        Dashboard
                    </a>
                    <!-- <a href="logout.php"
                        class="text-white hover:text-gray-300 transition-colors duration-300 flex justify-center items-center gap-2">
                        Cerrar Sesión
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a> -->
                <?php else: ?>
                    <a href="login.php" class="text-white hover:text-gray-300 transition-colors duration-300">Iniciar
                        Sesión</a>
                    <a href="signup.php"
                        class="bg-white text-black px-4 py-2 rounded-md hover:bg-gray-300 transition-colors duration-300">
                        Registrarse
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </header>

    <!-- Imagen de fondo -->
    <img src="./public/img/bg-3.jpg" alt=""
        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-full h-full object-cover -z-10 brightness-50 opacity-30">

    <!-- Minimalist Hero Section -->
    <section class="flex-grow flex items-center justify-center px-6 relative mb-20">
        <!-- Hero Content -->
        <div class="container mx-auto max-w-4xl text-center relative z-10">
            <div class="flex justify-center items-center mx-auto mb-8 gap-4">
                <img src="./public/logo-bap-home.png" alt="UTPL Logo" class="h-16">
                <span class="text-white">x</span>
                <img src="./public/img/utpl.png" alt="UTPL Logo" class="h-16">
            </div>
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white leading-tight mb-6">
                Basic Auth PHP
            </h2>
            <p class="text-white/70 text-lg md:text-xl mb-10 max-w-2xl mx-auto">
                Un sistema de autenticación básico en PHP.
            </p>
            <div class="flex flex-col sm:flex-row justify-center space-y-4 sm:space-y-0 sm:space-x-4">
                <a href="signup.php"
                    class="bg-white text-black px-6 py-3 rounded-md text-center hover:bg-gray-300 transition-colors duration-300">
                    Comenzar Ahora
                </a>
                <a href="login.php"
                    class="border border-white text-white px-6 py-3 rounded-md text-center hover:bg-white/10 transition-colors duration-300">
                    Iniciar Sesión
                </a>
            </div>
        </div>
    </section>

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
</body>

</html>