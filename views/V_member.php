<?php
$halaman = "Member";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_member.php';
$member = new C_member();
?>                                    
                <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <a href="V_tambah_member.php" class="btn btn-primary btn-lg mb-3">
                                        <span class="text"><i class = "fa fa-plus"></i></span><span> Tambah Member</span>
                                    </a>
                                   
                                </div>
                                <h4 class="header-title">Progress Table</h4>
                                <div class="single-table datatable-primary">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">NO</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">No HP</th>
                                                    <th scope="col">Jumlah Poin</th>
                                                    <th scope="col">Total Belanja</th>
                                                    <th scope="col">action</th>
                                                </tr>
                                            </thead>
                                        <tbody>
                                        <?php
                                    if (empty($member->tampil())) {
                                    ?>
                                    <th align = "center"><td colspan="4">Belum ada member yang terdaftar</td></th>
                                    <?php
                                    }else {
                                        $no = 1;
                                        foreach ($member->tampil() as $p) {
                                    ?>
                                        
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $p->NamaPelanggan; ?></td>
                                                <td><?= $p->Alamat; ?></td>
                                                <td>+62 <?= $p->NomorTelepon; ?></td>
                                                <td><?= $p->JumlahPoin; ?></td>
                                                <td>Rp.<?= number_format($p->TotalHarga) ?></td>
                                                <td>
                                                <ul class="d-flex justify-content-center">
                                                    <div class="btn-group mb-xl-3" role="group" aria-label="Basic example">
                                                                <a class="btn btn-md btn-primary" href="detail_pembelian.php?id=<?= $p->PelangganID; ?>"><i class="fa fa-cart-plus"></i> Belanja</a>
                                                            <a href="V_edit_member.php?id=<?= $p->PelangganID; ?>" class="btn btn-md btn-secondary"><i class="fa fa-edit"></i> Edit</a><a onclick="confirm('Apakah Anda yakin ingin menghapus data ini?');" href="../routers/R_member.php?id=<?= $p->PelangganID; ?>&aksi=hapus" class="btn btn-md btn-danger"><i class="ti-trash"></i> Hapus</a>
                                                        </div>
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
