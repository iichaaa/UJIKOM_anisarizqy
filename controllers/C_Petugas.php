<?php
include_once 'C_koneksi.php';
class C_Petugas
{
    // -ini adalah fungsi atau method yang bernama registrasi user
    public function register($id=0, $nama=null, $email=null, $pass=null, $Role=null) {
        
        //membuat sebuah variable bertipe data objek
        $koneksi = new C_koneksi();

        //untuk menambahkan data objek dari kelas c_koneksi
        $sql = "INSERT INTO pengelola VALUES ('$id', '$nama', '$email','$pass' ,'$Role')";
        //$sql2 = "INSERT INTO (id, nama, email, pass, Role, photo) user VALUES ('$id', '$nama', '$email','$pass' ,'$Role', '')";
        
        //mysqli_query=fungsi bawa an dari php
        //mengesekusi perintah
        //2 parameter 1.koneksi 2.perintahnya
        $query = mysqli_query($koneksi->conn(), $sql); //->true/false

        //untuk mengecek data hasil dari query
        if ($query) {
            echo "<script>alert('Petugas ditambahkan!');window.location='../views/V_petugas.php'</script>";
        }else{
            echo "<script>alert('Petugas gagal ditambahkan. Silahkan coba lagi');window.location='../index.php'</script>";
        }
    }
    public function logout()
    {
        session_destroy();
        //fungsi untuk kembali ke halaman index.php
        echo "<script type='text/javascript'> 
            window.location.href='../index.php' 
            </script> ";
    }
    public function list()
    {
        $conn = new C_koneksi();

        $sql = "SELECT * FROM pengelola ORDER BY PengelolaID DESC";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }
        if (empty($hasil)) {
            echo "";
        } else {
            return $hasil;
        }
    }
    public function editreg($id)
    {
        $conn = new C_koneksi();

        $sql = "SELECT * FROM pengelola WHERE PengelolaID = $id";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }
        if (empty($hasil)) {
            echo "";
        } else {
            return $hasil;
        }
    }
    public function updatereg($id, $nama, $email, $pass, $Role) {
        
        //membuat sebuah variable bertipe data objek
        $koneksi = new C_koneksi();

        //untuk menambahkan data objek dari kelas c_koneksi
        $sql = "UPDATE pengelola SET `Username`='$nama', `Email`='$email', `Password`='$pass', `Role`='$Role' WHERE PengelolaID = $id";
        //$sql2 = "INSERT INTO (id, nama, email, pass, Role, photo) user VALUES ('$id', '$nama', '$email','$pass' ,'$Role', '')";
        
        //mysqli_query=fungsi bawa an dari php
        //mengesekusi perintah
        //2 parameter 1.koneksi 2.perintahnya
        $query = mysqli_query($koneksi->conn(), $sql); //->true/false

        //untuk mengecek data hasil dari query
        if ($query) {
            echo "<script>alert('Info Petugas diubah');window.location='../views/V_petugas.php'</script>";
        }else{
            echo "<script>alert('Info Petugas gagal diubah');window.location='../views/V_petugas.php'</script>";
        }
    }
    public function delete($id)
    {
        $conn = new C_koneksi();

        $sql = "DELETE FROM pengelola WHERE PengelolaID = '$id'";

        $query = mysqli_query($conn->conn(), $sql);
        echo "<script type='text/javascript'> 
        window.location.href='../views/V_petugas.php' 
        </script> ";
    }
}
