<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3>Data Laporan</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<!-- Pencarian -->
				<div class="container-fluid" style="background-color: #fff; padding-top: 10px; margin-bottom: 10px">
					<form action="laporan.php" method="get">
						<div class="form-group">
							<label><p>Cari Siswa</p></label>
							<div class="input-group">
								<input type="text" class="form-control" name="cari" placeholder="Cari NIS atau Nama Siswa" autocomplete="off">
								<span class="input-group-btn">
									<input type="submit" class="btn btn-success btn-flat" value="Cari"></input>
								</span>
							</div>
						</div>
					</form>
				</div>
				<!-- Akhir Pencarian -->
				<?php 
				if(isset($_GET['cari'])){
					$cari = $_GET['cari'];
					echo "<h4 style='margin-top:20px; margin-bottom:30px;'>Hasil pencarian : ".$cari."</h4>";
					echo "<p style='margin-bottom:10px;'><a href='laporan.php'><i class='glyphicon glyphicon-arrow-left'></i> Kembali</a></p>";
				}
				?>
				<!-- Tabel -->
				<div class="container-fluid" style="background-color: #fff; padding-top: 10px; margin-bottom: 20px">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>No</th>
								<th>NIS</th>
								<th>ID Tabungan</th>
								<th>Nama</th>
								<th>Saldo</th>
								<th colspan="2">Opsi</th>
							</tr>
							<?php
							//Pagination
							$tabungan = mysqli_query($koneksi,"SELECT A.nis, A.saldo, A.id_tabungan, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis)");
							$banyak = mysqli_num_rows($tabungan);

							$mulai = 0;
							$tujuan = 5;

							$page = ceil($banyak / $tujuan);

							if(isset($_GET['halaman'])) {
								$hal = $_GET['halaman'];
								$mulai = ($hal*$tujuan)-$tujuan;
							} else {
								$mulai = 0;
							}

							//Search  
							if(isset($_GET['cari'])){
								$cari = $_GET['cari'];
								$query = mysqli_query($koneksi,"SELECT A.nis, A.saldo, A.id_tabungan, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) WHERE B.nama_siswa LIKE '%$cari%' OR A.nis LIKE '%$cari%' ORDER BY nis");				
							}else{
								$query = mysqli_query($koneksi,"SELECT A.nis, A.saldo, A.id_tabungan, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) ORDER BY nis limit $mulai,$tujuan");
							}

							//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
							if(mysqli_num_rows($query) == 0){ //ini artinya jika data hasil query di atas kosong
							   //jika data kosong, maka akan menampilkan row kosong
								echo '<tr><td colspan="7"><center>Tidak ada data!</center></td></tr>';
							}else{
								$no = 1+$mulai;
								while ($data = mysqli_fetch_assoc($query)) {
									echo "<tr>";
									echo "<td>$no</td>";
									echo "<td>".$data['nis']."</td>";
									echo "<td>".$data['id_tabungan']."</td>";
									echo "<td>".$data['nama_siswa']."</td>";
									echo "<td>".$data['saldo']."</td>";
									echo "<td>";
									echo "<a href='#' onclick=\"javascript: if(confirm('Apakah data setoran $data[nama_siswa] mau dihapus?')==true){ window.location.href='hapus_transaksi.php?aksi=hapus&nis=$data[nis]'; } \">Hapus</a>";
									echo " | ";
									echo "<a href='detail-laporan.php?id_tabungan=".$data['id_tabungan']."'>Detail</a>";
									echo "</td>";
									echo "</tr>";
									$no++;
								}
							}
							?>
						</table>
					</div>
				</div>
				<!-- Tabel -->

				<!-- Style Pagination -->
				<div style="text-align: right;">
					<?php 
					for ($i=1; $i <= $page; $i++) { 
						echo '<a class="btn btn-info btn-md"  href="?halaman='.$i.'">'.$i.'</a>';
						echo "&nbsp";
					}
					?>
				</div> 
				<!-- End Style Pagination -->

			</div>
		</div>
	</section>
	<!-- /wrapper -->
</section>
<!-- /MAIN CONTENT -->

<?php  
include("includers/script.php");
include("includers/footer.php");
?>