<?php
include "connection_handler.php";

$username = strtolower(trim($_POST["member_username"]));
$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
$password = md5($_POST["member_password"]);

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
	die("Request not permitted!");
} else {
	$query = "SELECT * FROM member
	WHERE member_username= '" . $username . "'
	AND member_pass = '" . $password . "' AND member_active=true";
	$result = mysqli_query($conn, $query);
	$ketemu = mysqli_num_rows($result);
	if ($ketemu == 1) {
		$data = mysqli_fetch_array($result);
		mysqli_close($conn);
		session_start();
		$_SESSION['member'] = $data;
	} else {
		echo 'login gagal';
	}
}

?>
