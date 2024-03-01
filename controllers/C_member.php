<?php
include_once 'C_koneksi.php';
class C_member
{

    public function tampil()
    {

        $conn = new C_koneksi();

        $sql = "SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID WHERE PenjualanID NOT IN (31)";

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

    public function tambah_member($id, $nama, $alamat, $no, $poin)
    {

        $conn = new C_koneksi();

        $sql = "INSERT INTO pelanggan VALUES ($id, '$nama', '$alamat', '$no', '$poin')";
        $query = mysqli_query($conn->conn(), $sql);

        if ($query) {
            echo "<script>alert('Data berhasil ditambahkan ke tabel');window.location='../views/V_list_member.php'</script>";
        } else {
var_dump($sql, $query);        }
    }
    public function tambah_jual($id_penjualan, $tgl_jual, $harga, $id_pelanggan)
    {

        $conn = new C_koneksi();

        $sql = "INSERT INTO penjualan VALUES ($id_penjualan, '$tgl_jual', '$harga', $id_pelanggan)";
        // var_dump($sql);
        $query = mysqli_query($conn->conn(), $sql);

        if ($query) {
            echo "";
        } else {
            echo "";
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

    public function edit($id)
    {
        $conn = new C_koneksi();

        $sql = "SELECT * FROM pelanggan WHERE PelangganID = '$id'";

        $query = mysqli_query($conn->conn(), $sql);

        while ($q = mysqli_fetch_object($query)) {

            $hasil[] = $q;
        }

        return $hasil;
    }

    public function update($id, $nama, $alamat, $no, $poin)
    {

        $conn = new C_koneksi();

        $sql = "UPDATE `pelanggan` SET `NamaPelanggan` = '$nama', `Alamat` = '$alamat', `NomorTelepon` = '$no', `JumlahPoin` = '$poin' WHERE `PelangganID` = '$id'";

        $query = mysqli_query($conn->conn(), $sql);


        if ($query) {
            echo "<script>alert('Data berhasil diubah :D');window.location='../views/V_list_member.php'</script>";
        } else {
            echo "<script>alert('Data gagal diubah');window.location='../views/V_list_member.php'</script>";
        }
    }
    public function delete($id)
    {
        $conn = new C_koneksi();

        $sql = "DELETE FROM pelanggan WHERE PelangganID = '$id'";

        $query = mysqli_query($conn->conn(), $sql);
        echo "<script type='text/javascript'> 
        window.location.href='../views/V_list_member.php' 
        </script> ";
    }
    public function tampil_struk($penjualan)
    {

        $conn = new C_koneksi();

        $sql = "SELECT * FROM penjualan JOIN pelanggan ON pelanggan.PelangganID = penjualan.PelangganID WHERE PenjualanID = '$penjualan'";

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
}
