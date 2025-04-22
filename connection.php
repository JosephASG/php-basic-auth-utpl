<?php
// Hecho por Joseph Santamaria
// https://joseph-san.com

// Conexión a la base de datos, no olvidar crear la base de datos utpl_db y la tabla users con los campos id, user_name y password
// esto se encuentra en el archivo db.sql

// Variables del Environment de Desarrollo - Descomentar para usar en local
// $dbhost = "localhost";
// $dbuser = "root";
// $dbpass = "";
// $dbname = "utpl_db";

// Variables del Environment de Producción/Local - Descomentar para usar en producción o en local
// Estas variables también pueden ser usadas localmente si se desea para 
// evitar la creación de una base de datos local

// $dbhost = "interchange.proxy.rlwy.net:12641";
// $dbuser = "root";
// $dbpass = "peTNpHzrfgKBZJmiLEygNqzOlpZPtldv";
// $dbname = "utpl_db";

// Cargar el archivo de configuración del entorno si existe (.env)
if (file_exists(__DIR__ . '/env.php')) {
	include "env.php";
	load_env(); // solo en local
}

$dbhost = getenv("DB_HOST");
$dbuser = getenv("DB_USER");
$dbpass = getenv("DB_PASS");
$dbname = getenv("DB_NAME");

if (!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
	die("failed to connect!");
}
