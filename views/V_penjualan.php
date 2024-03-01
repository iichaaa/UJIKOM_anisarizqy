<?php
include_once "../controllers/C_koneksi.php";
$conn = new C_koneksi();
$halaman="Penjualan";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';

?>
<div class="card mt-2">
	<div class="card-body">
		
		<?php 
		
		$PelangganID = 1;
		$no = 1;
		$data = mysqli_query($conn->conn(),"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
		while($d = mysqli_fetch_array($data)){
			?>
			<?php if ($d['PelangganID'] == $PelangganID) { ?>
				
                <form action="?cari_produk=yes" method="POST">
	<div class="row">
<div class="col-sm-4">
			<div class="card card-primary mb-3">
				<div class="card-header bg-primary text-white">
					<h5><i class="fa fa-search"></i> Cari Produk</h5>
				</div>
				<div class="card-body">
					<input type="text" id="cari" class="form-control" name="keyword" placeholder="Masukan : ID / Nama Produk [ENTER]">
				</div>
			</div>
		</div>
		
	
</form>
<div class="col-sm-8">
			<div class="card card-primary mb-3">
				<div class="card-header bg-primary text-white">
					<h5><i class="fa fa-list"></i> Hasil Pencarian</h5>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<div id="hasil_cari">
							
<?php
if (!empty($_GET['cari_produk'])) {
    $cari = $_POST['keyword'];
    if ($cari == true) {
        $sql = "SELECT * FROM `produk` WHERE ProdukID LIKE '%$cari%' OR NamaProduk LIKE '%$cari%'";
        $query = mysqli_query($conn->conn(),$sql);
        
        $hasil1 = array(); // Initialize the $hasil1 array

        while ($q = mysqli_fetch_assoc($query)) {
            $hasil1[] = $q;
        }

        if (empty($hasil1)) {
            echo "No results found.";
        }
    ?>
        <table class="table table-stripped" width="100%" id="hasil_cari">
            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Harga Jual</th>
                <th>Jumlah Stok</th>
                <th>Aksi</th>
            </tr>
        <?php foreach ($hasil1 as $hasil) {?>
            <tr>
                <td><?php echo $hasil['ProdukID'];?></td>
                <td><?php echo $hasil['NamaProduk'];?></td>
                <td><?php echo number_format($hasil['Harga'],2);?></td>
				<?php if ($hasil['Stok'] > 3) {
					# code...
				 ?>
                <td><?php echo $hasil['Stok'];?></td>
                <td>
                <form method="POST" action="../routers/R_penjualan.php?aksi=CekProduk">
					<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
					<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
					<input type="text" name="ProdukID" value="<?php echo $hasil['ProdukID'];?>" hidden>
					<button type="submit" class="btn btn-primary btn-sm mt-2">
						Tambah Produk
					</button>
				</form></td>
				<?php }else {
					?>
					<td><b>Stok Hampir Habis</b></td>
					<td><button type="submit" disabled class="btn btn-primary btn-sm mt-2">
						Tambah Produk
					</button></td>
					<?php
				} ?>
            </tr>
        <?php }?>
        </table>
<?php
        }
    }
?>

						</div>
						<div id="tunggu"></div>
					</div>
				</div>
			</div>
		</div>
</div>
<div class="col-sm-12">
			<div class="card card-primary">
				<div class="card-header bg-primary text-white">
					<form action="../routers/R_penjualan.php?id=<?php echo $d['PenjualanID'];?>&aksi=Reset" method="post">
					<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
					<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
					<h5><i class="fa fa-shopping-cart"></i> KASIR
					<button class="btn btn-danger float-right" type="submit">
						<b>RESET KERANJANG</b></button>
					</h5>
					</form>
				</div>
				<div class="card-body">
					<div id="keranjang" class="table-responsive">
						<table class="table table-bordered">
							<tr>
								<td><b>Tanggal</b></td>
								<td><input type="text" readonly="readonly" class="form-control" value="<?php echo date("j F Y, G:i");?>" name="tgl"></td>
							</tr>
						</table>
						<table class="table table-bordered w-100" id="example1">
							<thead>
								<tr>
									<td> No</td>
									<td> Nama Produk</td>
									<td style="width:10%;"> Jumlah</td>
									<td style="width:20%;"> Total</td>
									<td> Aksi</td>
								</tr>
							</thead>
							<tbody>
						<?php 
						
						$nos = 1;
						$detailpenjualan = mysqli_query($conn->conn(),"SELECT * FROM detailpenjualan");
						while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
							?>
							<?php 
							if ($d_detailpenjualan['PenjualanID'] == $d['PenjualanID']) { ?>
								<tr>
									<td><?php echo $nos++; ?></td>
									<td align = "center">
										<form action="../routers/R_penjualan.php?aksi=SimpanProduk" method="post">
											<div class="form-group">
												<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
												<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
												<?php 
													
													$no = 1;
													$produk = mysqli_query($conn->conn(),"SELECT * FROM produk");
													while($d_produk = mysqli_fetch_array($produk)){
														?>
														<?php if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) {?>
												<input type="text" value="<?php echo $d_produk['ProdukID']; ?>" hidden name="ProdukID" class="form-control" onchange="this.form.submit()">
												<img src="<?="../assets/img/" . $d_produk['Gambar']; ?>" width = "100">
												<br>
												<input class="center-block" type="text" value="<?php echo $d_produk['NamaProduk']; ?>" name="ProdukID" readonly onchange="this.form.submit()">
												<?php }} ?>
											</div>
										</form>
									</td>
									
										<form method="post" action="../routers/R_penjualan.php?aksi=Hitung">
											<?php 
											
											$produk = mysqli_query($conn->conn(),"SELECT * FROM produk");
											while($d_produk = mysqli_fetch_array($produk)){
												?>
												<?php 
												if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { ?>
													<input type="text" name="Harga" value="<?php echo $d_produk['Harga']; ?>" hidden>
													<input type="text" name="ProdukID" value="<?php echo $d_produk['ProdukID']; ?>" hidden>
													<input type="text" name="Stok" value="<?php echo $d_produk['Stok']; ?>" hidden>
													<?php 
												}
											}
											?>

										<td>
											<div class="form-group">
												<input type="number" name="JumlahProduk" value="<?php echo $d_detailpenjualan['JumlahProduk']; ?>" class="form-control">
											</div>
										</td>
										
										<td>Rp<?php echo number_format($d_detailpenjualan['Subtotal']); ?></td>
										<td>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<button type="submit" class="btn btn-outline-success btn-sm"><i class="fa fa-edit"></i> Update</button>
										</form>
										<form method="post" action="../routers/R_penjualan.php?aksi=HapusDetail">
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-times"></i> Batal</button>
										</form>
									</td>
								</tr>
							<?php } else {
								?>
								<?php 
							}
						} 
						?>
					</tbody>
					</table>
					<form method="post" action="../routers/R_penjualan.php?aksi=Harga">
					<?php 
					
					$detailpenjualan = mysqli_query($conn->conn(), "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE PenjualanID='$d[PenjualanID]'"); 
					$row = mysqli_fetch_assoc($detailpenjualan); 
					$sum = $row['TotalHarga'];
					
					?>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group">
								Total Bayar:<input type="text" class="form-control" name="TotalHarga" id="totalHarga" value="<?php echo $sum; ?>" readonly>
								<input type="text" class="form-control" name="Potongan" id="totalHarga" value="<?php echo $d['TotalHarga']; ?>" hidden>
								<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
								<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
							</div>
						</div>
						<div class="col-sm-2">
							<div class="form-group">
								<button class="btn btn-warning btn-sm form-control" type="submit">Hitung Total</button>
							</div>
							
							
						</div>
					</div>
				</form>
				<form action="struk.php?id=<?php echo $d['PenjualanID'];?>" method="post">
				<div class="row">
				
				<div class="col-sm-10">
							Bayar:<input class="form-control" type="text" name="Bayar" id="bayar" required oninvalid="this.setCustomValidity('Pembayaran masih kurang')">
							Kembalian:<input class="form-control" readonly type="text" id="kembalianDisplay" name='Kembalian'><p id="warningMessage"></p></div>
							<div class="col-sm-2">
							<div class="form-group">
								<button class="btn btn-secondary btn-sm form-control" type="submit">Cetak</button>
					</div>
								</div>
					</div>
					</form>
			<?php } else { ?>
				<?php 
			} 
		} 
		?>		
	</div>
</div>
					


				

<?php
include "template/footer.php";
?>
