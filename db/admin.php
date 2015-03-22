<?php
require_once 'connect.php';
session_start();
	class admin{

		function __construct(){
			$db = new connect();
		}

		public function loginAdmin(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = mysqli_query("select * from admin where admin_usernmae = '".$username."' admin_pass = '".md5($password)."'");
			$user_data = mysqli_fetch_array($query);
			$hasil = mysqli_num_rows($query);
			if($hasil == 1){
				$_SESSION['login'] = true;
				$_SESSION['username'] = $user_data['admin_username'];
				$_SESSION['name'] = $user_data['admin_name'];
				$_SESSION['email'] = $user_data['admin_email'];
				return true;
			}
			else{
				return false;
			}
		}



		public function tambahAdmin(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = md5($password);
			$query =  mysql_query("insert into admin values ('".$username."', '".$password."', '".$name."', '".$email."')") or die (mysql_error());
			if ($query){
				echo "data berhasil ditambah";
			}
			else {
				echo "data gagal ditambah";
			}
		}



	}



?>