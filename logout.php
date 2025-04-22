<?php
// Hecho por Joseph Santamaria
// https://joseph-san.com

session_start();

if (isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
}

header("Location: login.php");
die;