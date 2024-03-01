<?php
$halaman = "Produk";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_produk.php';
$produk = new C_produk();
?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Primary table end -->
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                            <a href="V_barang.php" class="btn btn-secondary btn-lg mb-3">
                                        <span class="text"><i class = "ti ti-eye"></i></span><span> Manage Produk</span>
                                    </a> 
                                <h4 class="header-title">List Produk</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable2" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Nama Produk</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    if (empty($produk->tampil())) {
                                    ?>
                                    <tr><td colspan="5">Produk masih kosong</td></tr>
                                    <?php
                                    }else {
                                        foreach ($produk->tampil() as $p) {
                                    ?>
                                            <tr>
                                                <td><?= $p->NamaProduk; ?></td>
                                                <td>Rp<?= number_format($p->Harga); ?></td>
                                                <td><?php if ($p->Stok <= 3) {
                                                    echo "Segera Restok Produk!";
                                                }else {
                                                    echo $p->Stok;
                                                } ?></td>
                                                <td> <h6><?= $p->NamaProduk; ?></h6><br>
                                                    <img src="<?="../assets/img/" . $p->Gambar; ?>" width="150">  </td>
                                            </tr>
                                        <?php }} ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Dark table end -->
                </div>
            </div>
        </div>
<?php
    include_once 'template/footer.php';
?>
