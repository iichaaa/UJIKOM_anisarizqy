<?php
session_start();
//modularisasi. memanggil class dari file lain ke file ini
include_once 'C_koneksi.php';


class C_login {

    // membuat fungsi login user
    public function login($email, $pass) {

        // ini membuat sebuah variabel yang bertipe data objek dari kelas koneksi 
        $conn = new C_koneksi();

        //untuk mengecek tombol login sudah di tekan / di klik oleh user
        if (isset($_POST['login'])) {
        
            // perintah untuk mengambil semua data dari tabel user berdasarkan email yang di inputkan oleh user 
            $sql = "SELECT * from pengelola WHERE Email = '$email'";

            //exsekutor perintah diatas
            $query = mysqli_query($conn->conn(), $sql);  

            //mengubah data dari yg bertipe data objek menjadi aray asosiatif
            // assoc = array asosiatif -> key / index nya berupa string/huruf.
            $data = mysqli_fetch_assoc($query);

            //array biasa -> key / index nya berupa angka, dimulai dari 0 - tak terhingga 
            // $data2 = mysqli_fetch_array($query);

            // untuk mengecek apakah ada data dari hasil $query 
            if ($data) {

                //menggunkan array asosiatif
                //untuk membandingkan inputan password dari user dengan password dari tabel user 
                if (password_verify($pass, $data['Password'])) {
        
                    //untuk mengecek posisi login sebagai admin, atau mengecek apakah Role user itu sebagai admin atau bukan pengguna sebagai admin
                    if ($data['Role'] == 'admin') {

                        //menampung query dari database yg nantinya di gunakan pada halaman admin atau user setelah proses login berhasil
                        // membuat variabel session yang nantinya akan digunkan pada halaman home admin/ login sebagai admin 
                        $_SESSION["data"] = $data;
                        $_SESSION["Role"] = $data["Role"];

                        // jika login berhasil dan Rolenya sebagai admin maka akan berpindah kehalaman home 
                        echo "<script type='text/javascript'> window.location.href='../views/home.php' </script>";

                        //untuk menghentikan proses di bawahnya
                        exit;

                        
                        //untuk mengecek posisi login sebagai user, atau mengecek apakah Role user itu sebagai admin atau bukan pengguna sebagai admin
                        //untuk Role pengguna sebagai admin
                    }elseif ($data['Role'] == 'kasir') {

                        
                        //menampung query dari database yg nantinya di gunakan pada halaman admin atau user setelah proses login berhasil
                        // membuat variabel session yang nantinya akan digunkan pada halaman home user/ login sebagai user 
                        $_SESSION["data"] = $data;
                        $_SESSION["Role"] = $data["Role"];

                        // jika login berhasil dan Rolenya sebagai user maka akan berpindah kehalaman home 
                        echo "<script type='text/javascript'> 
                        window.location.href='../views/home_user.php' 
                        </script> ";

                        //untuk menghentikan proses di bawahnya
                        exit;
                    
                    }else {
                        echo "<script>alert('Password salah');window.location='../index.php'</script>";
                    }
                    
                    //untuk Role pengguna bukan sebagai admin dan user
                    }else {
                        echo "<script>alert('Password salah');window.location='../index.php'</script>/";
                    }
            }else{
                echo "<script>alert('Email tidak terdaftar dalam sistem');window.location='../index.php'</script>/";
            }
        }
}       
    }

?>