<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
?>
<!--main content start-->
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3>Data Petugas</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<ul class="nav nav-tabs">
					<li role="presentation"><a href="data-petugas.php">Petugas Aktif</a></li>
					<li role="presentation" class="active"><a href="data-petugas-tidakaktif.php">Petugas Tidak Aktif</a></li>
				</ul>
				<div class="container-fluid" style="background-color: #fff; padding-top: 20px;">
					<div class="table-responsive">
						<table class="table table-bordered table-hover table-striped">
							<tr>
								<th>No</th>
								<th>ID</th>
								<th>Foto</th>
								<th>Nama Petugas</th>
								<th>Alamat</th>
								<th>Telepon</th>
								<th>Jenis Kelamin</th>	
								<th>Level</th>
								<th>Status</th>
								<th>Opsi</th>
							</tr>
							<?php  
							$sql = "SELECT A.id_petugas, A.foto_petugas, A.nama_petugas, A.alamat_petugas, A.telepon_petugas, A.jk_petugas, A.level, B.nama_status FROM petugas AS A INNER JOIN status AS B ON (A.id_status = B.id_status) WHERE nama_status = 'Tidak Aktif' ORDER BY id_petugas";
							$query = mysqli_query($koneksi, $sql);
							//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
							if(mysqli_num_rows($query) == 0){ //ini artinya jika data hasil query di atas kosong
							   //jika data kosong, maka akan menampilkan row kosong
								echo '<tr><td colspan="10"><center>Tidak ada data!</center></td></tr>';
							}else{
								$no = 1;
								while ($data = mysqli_fetch_assoc($query)) {
									echo "<tr>";
									echo "<td>$no</td>";
									echo "<td>".$data['id_petugas']."</td>";
									echo "<td><center><img src='$data[foto_petugas]' width='40' height='60'></center></td>";
									echo "<td>".$data['nama_petugas']."</td>";
									echo "<td>".$data['alamat_petugas']."</td>";
									echo "<td>".$data['telepon_petugas']."</td>";
									echo "<td>".$data['jk_petugas']."</td>";
									echo "<td>".$data['level']."</td>";
									echo "<td>".$data['nama_status']."</td>";
									echo "<td>";
									echo "<a href='edit_petugas.php?id_petugas=".$data['id_petugas']."'>Edit</a>";
									echo " | ";
									echo "<a href='#' onclick=\"javascript: if(confirm('Apakah $data[nama_petugas] mau dihapus?')==true){ window.location.href='hapus_petugas.php?aksi=hapus&id_petugas=$data[id_petugas]'; } \">Hapus</a>";
									echo "</td>";
									echo "</tr>";
									$no++;
								}
							}
							?>
						</table>
					</div>
				</div>
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