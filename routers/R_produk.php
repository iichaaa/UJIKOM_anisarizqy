<?php
include_once '../controllers/C_produk.php';
$barang = new C_produk();

if ($_GET['aksi'] == 'tambah') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'] . '.' . $_POST['harga_lagi'];

     //ekstensi yang diperbolehkan hanya jpg dan png
     $ekstensi_diperbolehkan = array('png','jpg','jpeg');

     $nama_photo = $_FILES['gambar']['name'];
 
     $x = explode('.', $nama_photo);

     $ekstensi = strtolower(end($x));
    //endapatkan ukurran 
     $ukuran = $_FILES ['gambar']['size'];

    //untuk mendapatkan tempory file yang di uplod
     $file_tmp = $_FILES['gambar']['tmp_name']; 

     //menegecek ekstensi yang di buat
     if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){

        if( $ukuran < 10440700){
            move_uploaded_file($file_tmp,'../assets/img/'. $nama_photo);

            // $query = $barang->tambah($id=0, $nama, $qty, $harga, $nama_photo);
            $barang->tambah_barang($id = 0, $nama, $harga, $qty, $nama_photo);

        }
        else{
            echo"EKSTENSI GAMBAR TERLALU BESAR";
            
        }
     }else{
        $barang->tambah_barang($id = 0, $nama, $harga, $qty, 'noimage.png');
     }
 
    

   
}elseif ($_GET['aksi'] == 'update') {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'] . '.' . $_POST['harga_lagi'];

     //ekstensi yang diperbolehkan hanya jpg dan png
     $ekstensi_diperbolehkan = array('png','jpg','jpeg');

     $nama_photo = $_FILES['gambar']['name'];
 
     $x = explode('.', $nama_photo);

     $ekstensi = strtolower(end($x));
    //endapatkan ukurran 
     $ukuran = $_FILES ['gambar']['size'];

    //untuk mendapatkan tempory file yang di uplod
     $file_tmp = $_FILES['gambar']['tmp_name']; 

     //menegecek ekstensi yang di buat
     if(in_array($ekstensi,$ekstensi_diperbolehkan) === true){

        if( $ukuran < 10440700){
            move_uploaded_file($file_tmp,'../assets/img/'. $nama_photo);

            // $query = $barang->tambah($id=0, $nama, $qty, $harga, $nama_photo);
            $barang->update($id, $nama, $harga, $qty, $nama_photo);

        }
        else{
            echo"EKSTENSI GAMBAR TERLALU BESAR";
            
        }
     }else{
        $barang->update($id, $nama, $harga, $qty, 'noimage.png');
     }
 
    

   
}elseif ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];

    $barang->delete($id);

}elseif ($_GET['aksi'] == 'stok') {
    $id = $_POST['id'];
    $qty = $_POST['qty'];
    $barang->update_stok($id, $qty);
}
?>