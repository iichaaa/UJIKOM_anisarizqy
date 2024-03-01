<?php
$halaman = "Stok";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_produk.php';
$produk = new C_produk();
?>                                    
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Table Produk</h4>
                                <div class="single-table datatable-primary">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">NO</th>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">Stok</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Gambar</th>
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                        <?php
                                    if (empty($produk->tampil())) {
                                    ?>
                                    <tr align = "center"><td colspan="7">Produk masih kosong</td></tr>
                                    <?php
                                    }else {
                                        $no = 1;
                                        foreach ($produk->tampil() as $p) {
                                    ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $p->NamaProduk; ?></td>
                                                <td style="font-size: 16px; font-weight: bold;"><?php if ($p->Stok >= 4) {
                                                    echo $p->Stok;
                                                }else {
                                                    echo "Stok hampir habis. Segera Restock Produk";
                                                } ?></td>
                                                <td><?= number_format($p->Harga, 2); ?></td>
                                                <td><img src="<?="../assets/img/" . $p->Gambar; ?>" width = "100">  </td>
                                                <td>
                                                <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a title="Kelola Jumlah Stok" href="V_tambah_stok.php?id=<?= $p->ProdukID; ?>" class="btn btn-outline-success mb-3"><i class="fa fa-plus"></i> Kelola Stok</a></li>
                                                        </ul>
                                                        </td>
                                            </tr>
                                        <?php }} ?>
                                        </tbody>
                                                        
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                            
<?php
    include_once 'template/footer.php';
?>
