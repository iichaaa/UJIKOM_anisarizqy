<?php
include_once '../controllers/C_login.php';

$login = new C_login();

if ($_GET['aksi'] == 'login') {

        $email = $_POST['email'];
        $pass = $_POST['password'];

        //memanggil method login
        $login->login($email, $pass);

    }elseif ($_GET['aksi'] == 'logout') {
        session_destroy();
    echo "<script>window.location='../index.php'</script>";
        exit;
    }
?>