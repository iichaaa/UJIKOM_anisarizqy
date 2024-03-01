<?php
$halaman = "Dashboard";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
?>
<div class="container-fluid"><br>
    <h1> Selamat datang <?= $_SESSION['data']['Username'] ?>, Anda disini sebagai <?= $_SESSION['data']['Role'] ?> </h1>
</div>
<div class="row">
<div class="col-lg-4 col-md-6 mt-5">
                            
                        </div>
</div>
<?php
    include_once 'template/footer.php';
?>