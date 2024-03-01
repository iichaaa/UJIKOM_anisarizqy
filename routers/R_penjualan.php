<?php 
// koneksi database
include '../controllers/C_koneksi.php';
$conn = new C_koneksi();
// menangkap data id yang di kirim dari url
if ($_GET['aksi'] == 'HapusDetail') {
    # code...
    $DetailID = $_POST['DetailID'];
    $PelangganID = $_POST['PelangganID'];


// menghapus data dari database
    mysqli_query($conn->conn(),"delete from detailpenjualan where DetailID='$DetailID'");

// mengalihkan halaman kembali ke data_barang.php
    echo "<script>window.location='../views/V_penjualan.php?id=$PelangganID'</script>";

}elseif ($_GET['aksi'] == 'Reset') {
    # code...
    $PenjualanID = $_POST['PenjualanID'];
    $PelangganID = $_POST['PelangganID'];


// menghapus data dari database
    mysqli_query($conn->conn(),"delete from detailpenjualan where PenjualanID='$PenjualanID'");

// mengalihkan halaman kembali ke data_barang.php
    echo "<script>window.location='../views/V_penjualan.php?id=$PelangganID'</script>";

}elseif ($_GET['aksi'] == 'CekProduk') {

    $PelangganID = $_POST['PelangganID'];
    $PenjualanID = $_POST['PenjualanID'];
    $ProdukID = $_POST['ProdukID'];

// menginput data ke database
    $sql = "INSERT INTO `detailpenjualan` (`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`) VALUES (NULL, '$PenjualanID', '$ProdukID', 0, 0.00);";
    $query = mysqli_query($conn->conn(),$sql);

// mengalihkan halaman kembali ke detail_pembelian.php
    echo "<script>window.location='../views/V_penjualan.php?id=$PelangganID'</script>";
}elseif ($_GET['aksi'] == 'SimpanBarang') {
    $ProdukID = $_POST['ProdukID'];
    $DetailID = $_POST['DetailID'];
    $PelangganID = $_POST['PelangganID'];

// menginput data ke database

    mysqli_query($conn->conn(),"update detailpenjualan set ProdukID='$ProdukID' where DetailID='$DetailID'");

// mengalihkan halaman kembali ke V_penjualan.php
    echo "<script>window.location='../views/V_penjualan.php?id=$PelangganID'</script>";
}elseif ($_GET['aksi'] == 'Hitung') {
    $Stok = $_POST['Stok'];
$ProdukID = $_POST['ProdukID'];
$JumlahProduk = $_POST['JumlahProduk'];
$Harga = $_POST['Harga'];
$DetailID = $_POST['DetailID'];
$PelangganID = $_POST['PelangganID'];
$Subtotal = $JumlahProduk * $Harga;
$Stok_total = $Stok - $JumlahProduk;

// menginput data ke database

mysqli_query($conn->conn(),"update detailpenjualan set Subtotal='$Subtotal', JumlahProduk='$JumlahProduk' where DetailID='$DetailID'");
mysqli_query($conn->conn(),"update produk set Stok='$Stok_total' where ProdukID='$ProdukID'");

// mengalihkan halaman kembali ke V_penjualan.php
    echo "<script>window.location='../views/V_penjualan.php?id=$PelangganID'</script>";
}elseif ($_GET['aksi'] == 'Harga') {
    $TotalHarga = $_POST['TotalHarga'];
$PenjualanID = $_POST['PenjualanID'];
$PelangganID = $_POST['PelangganID'];

mysqli_query($conn->conn(),"update penjualan set TotalHarga='$TotalHarga' where PenjualanID='$PenjualanID'");
    echo "<script>window.location='../views/V_penjualan.php?id=$PelangganID'</script>";

}

?>