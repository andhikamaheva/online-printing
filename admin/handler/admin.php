<?php
include 'connecttion_handler.php';
$db = new database();
$db->connectMySQL();

session_start();
	class admin{
		private $error = false;

		public function loginAdmin(){
			$username = $_POST['username'];
			$password = $_POST['password'];
			$query = mysql_query("select * from admin where admin_username = '".$username."' and admin_pass = '".md5($password)."'") or die ($_SESSION['login']=true);
			$user_data = mysql_fetch_array($query);
			$hasil = mysql_num_rows($query);
			if($hasil == 1){
				session_start();
				$_SESSION['login'] = true;
				$_SESSION['username'] = $user_data['admin_username'];
				$_SESSION['name'] = $user_data['admin_name'];
				$_SESSION['email'] = $user_data['admin_email'];;
				return false;
			}
			else{
				session_start();
        		$_SESSION['errors'] = array("Your username or password was incorrect.");
				return true;
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

		public function getError(){
			if (isset($_SESSION['errors'])){
			foreach($_SESSION['errors'] as $error){
				echo $error;
			}
			}
        
		}

		public function logOut(){
		session_start();
		session_destroy();
		unset($_SESSION['login']);
		unset($_SESSION['username']);
		unset($_SESSION['name']);
		unset($_SESSION['email']);
		session_regenerate_id();
		header('location: login.php');
		exit();
		}

	}

?>
