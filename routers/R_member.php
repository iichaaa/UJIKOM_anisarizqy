<?php
include_once '../controllers/C_koneksi.php';
$conn = new C_koneksi();
include_once '../controllers/C_member.php';
$member = new C_member();

if ($_GET['aksi'] == 'tambah') {
    $id = $_POST['id_pelanggan'];
    $nama = $_POST['nama_pelanggan'];
    $no = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $poin = $_POST['j_poin'];
    $tgl_jual = $_POST['tgl_jual'];
    $member->tambah_member($id, $nama, $alamat, $no, $poin);
    $member->tambah_jual(0, $tgl_jual, 0.00, $id);
   
}elseif ($_GET['aksi'] == 'update') {
    $id = $_POST['id_pelanggan'];
    $nama = $_POST['nama_pelanggan'];
    $no = $_POST['nomor'];
    $alamat = $_POST['alamat'];
    $poin = $_POST['j_poin'];
    $member->update($id, $nama, $alamat, $no, $poin);
   
}elseif ($_GET['aksi'] == 'hapus') {
    $id = $_GET['id'];

    $member->delete($id);
}elseif ($_GET['aksi'] == 'struk') {
    $idd = $_GET['id'];

    $member->tampil_struk($idd);
}
?>