<?php
session_start();
include "connection_handler.php";
if (isset($_GET['act'])) {
	if ($_GET['act'] == 'register') {
		$name = $_POST['member_name'];
		$username = $_POST['member_username'];
		$pass = md5($_POST['member_pass']);
		$phone = $_POST['member_phone'];
		$email = $_POST['member_email'];
		$address = $_POST['member_address'];
		$result = $mysqli->query("SELECT member_username, member_email FROM member WHERE member_username = '$username' AND member_email = '$email' LIMIT 1");
		$obj = $result->fetch_object();
		if ($result) {
			if ($username == $obj->member_username || $email == $obj->member_email) {
				die('<div class=\'col-sm-12 col-md-12\'><div class=\'alert alert-danger alert-dismissible\' role=\'alert\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'><span aria-hidden=\'true\'>&times;</span></button><strong>Perhatian!</strong> Registrasi gagal, Username atau email telah terdaftar</div></div>');
				$mysqli->close();
			} else {
				$mysqli->query("INSERT INTO member values('$username', '$name', '$pass', '$phone', '$email', '$address', NOW(), '1' )");
				die('<div class=\'col-sm-12 col-md-12\'><div class=\'alert alert-success alert-dismissible\' role=\'alert\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'><span aria-hidden=\'true\'>&times;</span></button><strong>Registrasi Berhasil!</strong> Silahkan login dengan akun Anda</div></div>');
			}
		}

	}

}

?>