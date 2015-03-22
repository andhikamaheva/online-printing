<?php
    include_once('admin.php');
    include_once('connect.php');
    $db = new connect();
    
    if(isset($_GET["action"])){
        if ($_GET["action"] == "update"){
        $login = admin::tambahAdmin();

        }
    }

?>

<!DOCTYPE HTML>
    <head>
        <title>Tambah Admin</title>
    </head>
    <section>
    <form  method="POST" action="<?php $_SERVER['PHP_SELF'] ?>?action=update">
    <label for="username">Username</label>
    <input id="usernamex" name="username"/>
    <label for="password">Password</label>
    <input id="passwordx" name="password" />
    <label for="password">Nama</label>
    <input id="passwordx" name="name" />
    <label for="password">Email</label>
    <input id="passwordx" name="email" />
    <p><?php echo $messages ?></p>
    <input type="submit" name="tambah" value="Login"/>
    </form>
    </section>
</html>
