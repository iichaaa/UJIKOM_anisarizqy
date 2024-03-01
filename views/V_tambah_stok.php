<?php
//session_start();
//modular memanggil file dari folder tampleate
$halaman = "Barang";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_produk.php';
$produk = new C_produk();
?>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Form Stok</h6>
                        </div>
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Kelola Stok</h1>
                        </div>
                        <form action="../routers/R_produk.php?aksi=stok" method="POST" class="user">

                            <fieldset disabled>
                        <!--untuk menampung inputan id user -->
                        <?php 
                        foreach ($produk->edit($_GET['id']) as $p) {
                            # code...
                        
                        ?>
                                                        <!--untuk menampung nama dari user-->
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                    placeholder="Nama Barang" id="disabledTextInput" value="<?= $p->NamaProduk; ?>">
                            </div>
                            <!--untuk menampung email dari user-->
                            <table>
                            <!--untuk menampung password dari user-->
                            <div class="form-group"><tr>
                               <td>Harga</td><td>:</td> <td><input type="number"  id="qty"
                                    placeholder="Harga" value="<?= $p->Harga - ".00"; ?>" class="form-control form-control-user"></td><td>,</td><td><input type="number"  id="qty"
                                    placeholder="" class="form-control form-control-user" value="00"></td></tr>
                            </div>
                           

                            <!--untuk menampung nama dari user-->
                            <!-- <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="photo"
                                    placeholder="photo" name="role" hidden>
                            </div> -->
                           
                            <div class="input-field"><tr> <td><input type="text" value="<?= $p->Gambar; ?>" hidden id="gambar"></td></tr>
                            </div>
                            </table>
                            </fieldset>
                            <table>
                            <div class="form-group"><tr>
                               <td>Stok Tersedia    </td><td>  :  </td> <td><input type="number" id="qty"
                                    placeholder="Stok" name="qty" value="<?= $p->Stok; ?>" class="form-control form-control-user"></td></tr>
                            </div></table>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" name="id"
                                    placeholder="Id" hidden value="<?= $p->ProdukID; ?>">
                            </div>

                            <br>
                            <div class="input-field">
                                <input type="submit" class="btn btn-primary btn-user btn-block" value="Ubah" id="" name="update">
                            </div>
                            <?php
                            }?>
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
