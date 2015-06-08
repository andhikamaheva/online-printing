<?php
session_start();
include "connection_handler.php";
if (isset($_GET['act'])) {
	if ($_GET['act'] == 'register') {
		$name = $_POST['member_name'];
		$username = strtolower(trim($_POST['member_username']));
		$pass = md5($_POST['member_pass']);
		$phone = $_POST['member_phone'];
		$email = $_POST['member_email'];
		$address = $_POST['member_address'];
		$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
		if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			die('Request not permitted!');
		} else {
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

	} else if ($_GET['act'] == 'update') {
		$name = $_POST['member_name'];
		$username = strtolower(trim($_POST['member_username']));
		$pass = md5($_POST['member_pass']);
		$phone = $_POST['member_phone'];
		$email = $_POST['member_email'];
		$address = $_POST['member_address'];
		$username = filter_var($username, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);

		if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
			die('Request not permitted!');
		} else {
			$result = $mysqli->query("SELECT member_username, member_email FROM member WHERE member_username != '$username'");
			$obj = $result->fetch_object();
			if ($result) {
				if ($email == $obj->member_email) {
					die('<div class=\'col-sm-12 col-md-12\'><div class=\'alert alert-danger alert-dismissible\' role=\'alert\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'><span aria-hidden=\'true\'>&times;</span></button><strong>Perhatian!</strong> Update gagal, email telah terdaftar</div></div>');
					$mysqli->close();
				} else {
					$mysqli->query("UPDATE member set member_name = '$name', member_phone = '$phone', member_email = '$email', member_address = '$address', member_pass = '$pass'  where member_username = '$username' ");
					$mysqli->commit();
					//$member[] = array('member_username' => $username, 'member_name' => $name, 'member_pass' => $pass, 'member_email' => $email, 'member_address' => $address, 'member_phone' => $phone);
					//$_SESSION['member'] = $member;
					$query = "SELECT * FROM member WHERE member_username = '" . $username . "'";
					$result = mysqli_query($conn, $query);
					$ketemu = mysqli_num_rows($result);
					if ($ketemu == 1) {
						$data = mysqli_fetch_array($result);
						mysqli_close($conn);
						//session_start();
						$_SESSION['member'] = $data;
					}
					die('<div class=\'col-sm-12 col-md-12\'><div class=\'alert alert-success alert-dismissible\' role=\'alert\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\' aria-label=\'Close\'><span aria-hidden=\'true\'>&times;</span></button><strong>Update Berhasil</strong> Silahkan login dengan detail baru akun Anda</div></div>');
				}
			}

		}
	}

}

?>