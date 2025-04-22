<?php
// Hecho por Joseph Santamaria
// https://joseph-san.com

function check_login($con)
{
	if (is_logged_in($con)) {
		return get_user_data($con, $_SESSION['user_id']);
	}

	header("Location: login.php");
	exit;
}

function is_logged_in($con)
{
	if (isset($_SESSION['user_id'])) {
		$user_id = $_SESSION['user_id'];

		if (!$con) {
			return false;
		}

		$stmt = mysqli_prepare($con, "SELECT 1 FROM usuarios WHERE user_id = ? LIMIT 1");
		if (!$stmt)
			return false;

		mysqli_stmt_bind_param($stmt, "s", $user_id);
		mysqli_stmt_execute($stmt);
		$result = mysqli_stmt_get_result($stmt);

		return ($result && mysqli_num_rows($result) > 0);
	}

	return false;
}


function get_user_data($con, $user_id)
{
	$stmt = mysqli_prepare($con, "SELECT * FROM usuarios WHERE user_id = ? LIMIT 1");
	mysqli_stmt_bind_param($stmt, "s", $user_id);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);

	return ($result && mysqli_num_rows($result) > 0) ? mysqli_fetch_assoc($result) : null;
}

function random_num($length)
{
	$length = max(5, $length);
	return substr(str_shuffle(str_repeat('0123456789', $length)), 0, $length);
}
