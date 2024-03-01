<?php
$halaman = "Produk";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';
include_once '../controllers/C_Petugas.php';
$petugas = new C_Petugas();
?>
<div class="col-12 mt-5">
    <div class="card">
        <div class="card-body">
            <a href="V_register_petugas.php" class="btn btn-primary btn-lg mb-3">
                <span class="text"><i class="fa fa-plus"></i></span><span> Register Petugas</span>
            </a>
            <h4 class="header-title">List Petugas</h4>
            <div class="single-table datatable-primary">
                <div class="table-responsive">
                    <table class="table table-hover progress-table text-center">
                        <thead class="text-uppercase">
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">Nama Petugas</th>
                                <th scope="col">Email</th>
                                <th scope="col">Masuk Sebagai</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (empty($petugas->list())) {
                            ?>
                                <tr align="center">
                                    <td colspan="7">Belum ada petugas yang terdaftar</td>
                                </tr>
                                <?php
                            } else {
                                $no = 1;
                                foreach ($petugas->list() as $p) {
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $p->Username; ?></td>
                                        <td><?= $p->Email; ?></td>
                                        <td><?php
                                        if ($p->Role == 'admin') {
                                            echo "Admin";
                                        }else {
                                            echo "Kasir";
                                        }
                                        ?></td>
                                        <td>
                                            <ul class="d-flex justify-content-center">
                                            <?php if ($p->PengelolaID != $_SESSION['data']['PengelolaID']) {
                                                 ?>
                                                <li class="mr-3"><a href="V_edit_petugas.php?id=<?= $p->PengelolaID; ?>" title="Edit" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                                <li><a onclick="alert('Apakah Anda yakin ingin menghapus data ini?');" href="../routers/R_petugas.php?id=<?= $p->PengelolaID; ?>&aksi=hapus" title="Hapus" class="text-danger"><i class="ti-trash"></i></a></li>
                                                <?php } ?>
                                            </ul>
                                        </td>
                                    </tr>
                            <?php }
                            } ?>
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