<?php
//session_start();
//modular memanggil file dari folder tampleate
$halaman = "Barang";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_member.php';
$member = new C_member();
?>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Update Member</h6>
                        </div>
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Ubah detail Member</h1>
                        </div>

                        <form action="../routers/R_member.php?aksi=update" method="POST" class="user" enctype ="multipart/form-data">
                        <?php 
                        foreach ($member->edit($_GET['id']) as $m) {
                        ?>
                        <!--untuk menampung inputan id user -->
                            <div class="form-group">
                                <tr>Nama Pelanggan :  
                                <input type="text" class="form-control form-control-user"
                                    placeholder="Nama Pelanggan" value="<?= $m->NamaPelanggan; ?>" name="nama_pelanggan">
                                    </tr>
                            </div>
                            <!--untuk menampung email dari user-->
                            <table>
                            <div class="form-group"><input type="text" id="qty"
                                    placeholder="Alamat" name="id_pelanggan" value="<?= $m->PelangganID; ?>" class="form-control form-control-user" hidden>
                            </div>
                            <div class="form-group"><tr>Alamat :<input type="text" id="qty"
                                    placeholder="Alamat" name="alamat" value="<?= $m->Alamat; ?>" class="form-control form-control-user"></tr>
                            </div>

                            <!--untuk menampung password dari user-->
                            <div class="form-group"><tr>Nomor Telepon :<div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                                </div>
                                                <input type="text" id="username" class="form-control" placeholder="Nomor HP" value="<?= $m->NomorTelepon; ?>" name="nomor" aria-label="" aria-describedby="basic-addon1">
                                            </div></tr>
                            </div>
                            <div class="form-group"><tr>Jumlah Poin : <input type="number" id="poin"
                                    placeholder="Point" name="j_poin" value="<?= $m->JumlahPoin; ?>"  class="form-control form-control-user"></tr>
                            </div>

                            <!--untuk menampung nama dari user-->
                            <!-- <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="photo"
                                    placeholder="photo" name="role" hidden>
                            </div> -->
                            </table>

                            <div class="input-field">
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Ubah" id="" name="tambah">
                            </div>
                            
                            <?php
                        }
                        ?>
                        </form>
                        
                
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="../assets/vendor/jquery/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../assets/js/sb-admin-2.min.js"></script>

</body>

<?php
    include_once 'template/footer.php';
?>
