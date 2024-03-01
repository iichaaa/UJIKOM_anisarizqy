<?php
$halaman = "Produk";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_produk.php';
$produk = new C_produk();
?>                                    
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                            <a href="V_tambah_produk.php" class="btn btn-primary btn-lg mb-3">
                                        <span class="text"><i class = "fa fa-plus"></i></span><span> Tambah Produk</span>
                                    </a> 
                                <h4 class="header-title">Table Produk</h4>
                                <div class="single-table datatable-primary">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">NO</th>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Stok</th>
                                                    <th scope="col">Nilai Poin</th>
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
                                                <td><?= number_format($p->Harga, 2); ?></td>
                                                <td><?php if ($p->Stok <= 3) {
                                                    echo "Segera Restok Produk!";
                                                }else {
                                                    echo $p->Stok;
                                                } ?></td>
                                                <td><img src="<?="../assets/img/" . $p->Gambar; ?>" width = "100">  </td>
                                                <td>
                                                <ul class="d-flex justify-content-center">
                                                            <li class="mr-3"><a href="V_edit_produk.php?id=<?= $p->ProdukID; ?>" title="Edit" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                            <li><a onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');" href="../routers/R_produk.php?id=<?= $p->ProdukID; ?>&aksi=hapus" title="Hapus" class="text-danger"><i class="ti-trash"></i></a></li>
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
