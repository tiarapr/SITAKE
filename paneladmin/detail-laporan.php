<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
?>

<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3>Detail Laporan Tabungan Siswa</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<br>
				<p style='margin-bottom:10px;'><a href='laporan.php'><i class='glyphicon glyphicon-arrow-left'></i> Kembali</a></p>

				<!-- Profil Siswa -->
				<table class="table table-bordered" style="background-color: #fff">
					<?php
					$idtab = $_GET['id_tabungan'];
					$sql = "SELECT A.nis, A.saldo, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) WHERE A.id_tabungan = '$idtab'";
					$query = mysqli_query($koneksi, $sql);

					if(mysqli_num_rows($query) == 0){ //ini artinya jika data hasil query di atas kosong
						//jika data kosong, maka akan menampilkan row kosong
						echo '<tr><td colspan="2"><center>Tidak ada data!</center></td></tr>';
					}else{
						while ($data = mysqli_fetch_assoc($query)) {
							echo "<tr>";
							echo "<td><b>NIS</b></td>";
							echo "<td>".$data['nis']."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td><b>Nama Siswa</b></td>";
							echo "<td>".$data['nama_siswa']."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td><b>Saldo</b></td>";
							echo "<td>".$data['saldo']."</td>";
							echo "</tr>";
						}
					}
					?>
				</table>
				<!-- Akhir Profil Siswa -->

				<!-- Riwayat Setoran -->
				<div class="container-fluid" style="background-color: #fff; padding-top: 10px; margin-bottom: 20px; padding-bottom: 10px;">
					<h4>Riwayat Setoran</h4><br>
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>No</th>
								<th>ID Tabungan</th>
								<th>ID Setoran</th>
								<th>Tanggal</th>
								<th>Setoran</th>
								<th>ID Petugas</th>
							</tr>
							<?php
							//Pagination
							$set = mysqli_query($koneksi,"SELECT * FROM setoran WHERE id_tabungan = '$idtab'");
							$banyak = mysqli_num_rows($set);

							$mulai = 0;
							$tujuan = 5;

							$page = ceil($banyak / $tujuan);

							if(isset($_GET['halaman'])) {
								$hal = $_GET['halaman'];
								$mulai = ($hal*$tujuan)-$tujuan;
							} else {
								$mulai = 0;
							}

							$idtab = $_GET['id_tabungan'];  
							$sql = "SELECT * FROM setoran WHERE id_tabungan = '$idtab' limit $mulai,$tujuan";
							$query = mysqli_query($koneksi, $sql);

							//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
							if(mysqli_num_rows($query) == 0){ //ini artinya jika data hasil query di atas kosong
							   //jika data kosong, maka akan menampilkan row kosong
								echo '<tr><td colspan="6"><center>Tidak ada data!</center></td></tr>';
							}else{
								$no = 1+$mulai;
								while ($data = mysqli_fetch_assoc($query)) {
									echo "<tr>";
									echo "<td>$no</td>";
									echo "<td>".$data['id_tabungan']."</td>";
									echo "<td>".$data['id_setoran']."</td>";
									echo "<td>".$data['tanggal']."</td>";
									echo "<td>".$data['setoran']."</td>";
									echo "<td>".$data['id_petugas']."</td>";
									echo "</tr>";
									$no++;
								}
							}
							?>
						</table>
					</div>

					<!-- Style Pagination -->
					<div style="text-align: right;">
						<?php
						$idtab = $_GET['id_tabungan'];
						echo '<a class="btn btn-primary btn-tambah"  href="detail_setoran_siswa.php?id_tabungan='.$idtab.'">Lihat Selengkapnya</a>';  
						?>
					</div>
					<!-- Akhir Style Pagination -->

				</div>
				<!-- Akhir Riwaya Setoran -->

				<!-- Riwayat Penarikan -->
				<div class="container-fluid" style="background-color: #fff; padding-top: 10px; margin-bottom: 20px; padding-bottom: 10px;">
					<h4>Riwayat Penarikan</h4><br>
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>No</th>
								<th>ID Tabungan</th>
								<th>ID Setoran</th>
								<th>Tanggal</th>
								<th>Setoran</th>
								<th>ID Petugas</th>
							</tr>
							<?php
							//Pagination
							$pen = mysqli_query($koneksi,"SELECT * FROM penarikan WHERE id_tabungan = '$idtab'");
							$banyak = mysqli_num_rows($pen);

							$mulai = 0;
							$tujuan = 5;

							$page = ceil($banyak / $tujuan);

							if(isset($_GET['halaman'])) {
								$hal = $_GET['halaman'];
								$mulai = ($hal*$tujuan)-$tujuan;
							} else {
								$mulai = 0;
							}

							$idtab = $_GET['id_tabungan'];  
							$sql = "SELECT * FROM penarikan WHERE id_tabungan = '$idtab' limit $mulai,$tujuan";
							$query = mysqli_query($koneksi, $sql);
							//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
							if(mysqli_num_rows($query) == 0){ //ini artinya jika data hasil query di atas kosong
							   //jika data kosong, maka akan menampilkan row kosong
								echo '<tr><td colspan="6"><center>Tidak ada data!</center></td></tr>';
							}else{
								$no = 1+$mulai;
								while ($data = mysqli_fetch_assoc($query)) {
									echo "<tr>";
									echo "<td>$no</td>";
									echo "<td>".$data['id_tabungan']."</td>";
									echo "<td>".$data['id_penarikan']."</td>";
									echo "<td>".$data['tanggal']."</td>";
									echo "<td>".$data['penarikan']."</td>";
									echo "<td>".$data['id_petugas']."</td>";
									echo "</tr>";
									$no++;
								}
							}
							?>
						</table>
					</div>

					<!-- Style Pagination -->
					<div style="text-align: right;">
						<?php
						$idtab = $_GET['id_tabungan'];
						echo '<a class="btn btn-primary btn-tambah"  href="detail_penarikan_siswa.php?id_tabungan='.$idtab.'">Lihat Selengkapnya</a>';  
						?>
					</div>
					<!-- Akhir Style Pagination -->

				</div>
				<!-- Akhir Riwayat Penarikan -->
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