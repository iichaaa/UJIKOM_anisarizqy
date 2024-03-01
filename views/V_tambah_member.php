<?php
//session_start();
//modular memanggil file dari folder tampleate
$halaman = "Barang";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_member.php';
$produk = new C_member();
$date = date("Y-m-d");
?>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Tambah Member</h6>
                        </div>
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tambahkan Member</h1>
                        </div>

                        <form action="../routers/R_member.php?aksi=tambah" method="POST" class="user" enctype ="multipart/form-data">

                        <!--untuk menampung inputan id user -->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    placeholder="Id" value="<?php echo rand(999999999, 2147483647) ?>" name="id_pelanggan" readonly hidden>
                            </div>
                            <!--untuk menampung nama dari user-->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    placeholder="Nama Pelanggan" name="nama_pelanggan">
                            </div>
                            <!--untuk menampung email dari user-->
                            <table>
                            <div class="form-group"><input type="text" id="qty"
                                    placeholder="Alamat" name="alamat" class="form-control form-control-user">
                            </div>

                            <!--untuk menampung password dari user-->
                            <div class="form-group"><div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="basic-addon1">+62</span>
                                                </div>
                                                <input type="text" id="username" class="form-control" placeholder="Nomor HP" name="nomor" aria-label="" aria-describedby="basic-addon1">
                                            </div>
                            </div>
                            <div class="form-group"><input type="number" id="poin"
                                    placeholder="Point" name="j_poin" class="form-control form-control-user">
                            </div>
                            <div class="form-group"><input type="date" id="poin"
                                    placeholder="Point" name="tgl_jual" value="<?= $date ?>" class="form-control form-control-user" hidden>
                            </div>

                            <!--untuk menampung nama dari user-->
                            <!-- <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="photo"
                                    placeholder="photo" name="role" hidden>
                            </div> -->
                            </table>

                            <div class="input-field">
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Tambahkan" id="" name="tambah">
                            </div>

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
