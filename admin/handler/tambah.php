<?php
    require_once ('admin.php');
    require_once  ('connecttion_handler.php');

    $db = new database();
    $db->connectMySQL();
    //$admin = new admin();
    if(isset($_POST["tambah"])){
      // $admin->tambahAdmin();
        $admin = admin::tambahAdmin();
    }
?>

<!DOCTYPE HTML>
    <head>
        <title>Tambah Admin</title>
    </head>
    <section>
    <form  method="POST" action="tambah.php">
    <label for="username">Username</label>
    <input id="usernamex" name="username" required>
    <label for="password">Password</label>
    <input id="passwordx" name="password" />
    <label for="password">Nama</label>
    <input id="passwordx" name="name" />
    <label for="password">Email</label>
    <input id="passwordx" name="email" />
    <input type="submit" name="tambah" value="Login"/>
    </form>
    </section>
</html>
