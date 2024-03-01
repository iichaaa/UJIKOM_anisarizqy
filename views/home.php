<?php
$halaman = "Dashboard";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
$halaman = "Dashboard";

?>
<div class="container-fluid">
    <h1> Selamat datang <?= $_SESSION['data']['Username'] ?>, Kamu disini sebagai <?= $_SESSION['data']['Role'] ?> </h1>
</div>
<?php
    include_once 'template/footer.php';
?>