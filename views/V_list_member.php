<?php
$halaman = "Produk";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_member.php';
$produk = new C_member();
?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
                    <!-- Primary table end -->
                    <!-- Dark table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                            <a href="V_member.php" class="btn btn-dark btn-lg mb-3">
                                        <span class="text"><i class = "ti ti-eye"></i></span><span> Manage Member</span>
                                    </a>  
                                <h4 class="header-title">Data Pelanggan Saat ini</h4>
                                <div class="data-tables datatable-dark">
                                    <table id="dataTable3" class="text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>Nama Pelanggan</th>
                                                <th>Alamat</th>
                                                <th>Nomor HP</th>
                                                <th>Jumlah Poin</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                    if (empty($produk->tampil())) {
                                    ?>
                                    <tr align = "center"><td colspan="5">Belum ada member yang terdaftar</td></tr>
                                    <?php
                                    }else {
                                        foreach ($produk->tampil() as $p) {
                                    ?>
                                            <tr>
                                                <td><?= $p->NamaPelanggan; ?></td>
                                                <td><?= $p->Alamat; ?></td>
                                                <td>+62 <?= $p->NomorTelepon; ?></td>
                                                <td><?= $p->JumlahPoin; ?></td>
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
