<?php
include_once 'C_koneksi.php';
class C_produk{

    public function tampil() {

       $conn = new C_koneksi();

        $sql = "SELECT * FROM produk ORDER BY ProdukID DESC";

        $query = mysqli_query($conn->conn(),$sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }
            if (empty($hasil)) {
                echo "";
            }else{
        return $hasil;
    }
    }

    public function tambah_barang($id, $nama, $harga, $qty, $nama_photo){

        $conn = new C_koneksi();

        $sql = "INSERT INTO produk VALUES ($id, '$nama', '$harga', '$qty', '$nama_photo')";
        // var_dump($sql);
        $query = mysqli_query($conn->conn(), $sql);

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_list_produk.php'</script>";
            
        }else {
            echo "<script>alert('Data gagal ditambahkan ke tabel karena suatu kesalahan');window.location='../views/V_list_produk.php'</script>";
            
        }

    }

    // public function tambah($id=0,$nama,$qty,$harga,$nama_photo) {

    //     $conn = new C_koneksi();

    //     $sql = "INSERT INTO barang VALUES ($id,'$nama','$qty','$harga','$nama_photo')";
    //     var_dump($sql);

    //    $query = mysqli_query($conn->conn(),$sql);

    //      //$sql = "INSERT INTO barang VALUES ('$id','$nama','$qty','$harga','$photo')";
    //      //var_dump($sql);

    //     // $query = mysqli_query($conn->conn(), $sql);
    //     var_dump($query);

    //     if ($query) {
    //         echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_barang.php'</script>";
    //     }else{
    //         echo "Selalu Gagal ";
    //     }
    // }

    public function edit($id) {
        $conn = new C_koneksi();

        $sql ="SELECT * FROM produk WHERE ProdukID = '$id'";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }

        return $hasil;
    }

    public function update($id, $nama, $harga, $qty, $nama_photo) {

        $conn = new C_koneksi();

        $sql = "UPDATE `produk` SET `NamaProduk` = '$nama', `Stok` = '$qty', `Harga` = '$harga', `Gambar` = '$nama_photo' WHERE `ProdukID` = '$id'";

        $query = mysqli_query($conn->conn(), $sql);
        

        if ($query) {
            echo "<script>alert('Data berhasil diubah :D');window.location='../views/V_list_produk.php'</script>";

        }else {
            echo "<script>alert('Data gagal diubah');window.location='../views/V_list_produk.php'</script>";
        }
    }
    public function delete($id){
        $conn = new C_koneksi();
        
        $sql = "DELETE FROM produk WHERE ProdukID = '$id'";

        $query = mysqli_query($conn->conn(), $sql);
        echo "<script type='text/javascript'> 
        window.location.href='../views/V_list_produk.php' 
        </script> ";

    }
    public function update_stok($id, $qty) {

        $conn = new C_koneksi();

        $sql = "UPDATE `produk` SET `Stok`='$qty' WHERE ProdukID = '$id'";

        $query = mysqli_query($conn->conn(), $sql);
        

        if ($query) {
            echo "<script>alert('Stok diperbarui');window.location='../views/V_stok.php'</script>";
        }else {
            echo "<script>alert('Stok gagal ditambah');window.location='../views/V_stok.php'</script>";
        }
    }
}
?>