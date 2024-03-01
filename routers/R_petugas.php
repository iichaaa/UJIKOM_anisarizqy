<?php
include_once '../controllers/C_Petugas.php';

$reg = new C_Petugas();
//untuk mengecek apakah action pada form register mengirimkan aksi register
    //tanda tanya aksi klo di pindah ke role akan jadi dolar get
    if ($_GET['aksi'] == 'register') {
        
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        //hash password = enskripsi password
        //agar pass nya aman sehingga defeloper tidak mengetahui pass yg di inputkna
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $role = $_POST['role'];
        
        $reg->register($id, $nama, $email, $pass, $role);
    }
    elseif ($_GET['aksi'] == 'edit') {
        
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $pass = $_POST['password'];

        //hash password = enskripsi password
        //agar pass nya aman sehingga defeloper tidak mengetahui pass yg di inputkna
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $role = $_POST['role'];
        
        $reg->updatereg($id, $nama, $email, $pass, $role);
    }elseif ($_GET['aksi'] == 'hapus') {
        
        $id = $_GET['id'];
        $reg->delete($id);
    }
?>