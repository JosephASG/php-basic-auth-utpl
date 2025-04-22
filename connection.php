<?php
// Hecho por Joseph Santamaria
// https://joseph-san.com

// Conexión a la base de datos, no olvidar crear la base de datos utpl_db y la tabla users con los campos id, user_name y password
// esto se encuentra en el archivo db.sql

// Variables del Environment de Desarrollo - Descomentar para usar en local
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "utpl_db";

// Variables del Environment de Producción/Local - Descomentar para usar en producción o en local
// Estas variables también pueden ser usadas localmente si se desea para 
// evitar la creación de una base de datos local

// $dbhost = "interchange.proxy.rlwy.net:12641";
// $dbuser = "root";
// $dbpass = "peTNpHzrfgKBZJmiLEygNqzOlpZPtldv";
// $dbname = "utpl_db";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{
	die("failed to connect!");
}
