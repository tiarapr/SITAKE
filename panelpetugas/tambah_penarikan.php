<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");

$nis = $_GET['nis'];
//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE nis = '$nis'
$sql = "SELECT A.nis, A.saldo, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) WHERE A.nis = $nis";
$query = mysqli_query($koneksi, $sql);

 //cek apakah data dari hasil query ada atau tidak
if(mysqli_num_rows($query) == 0){

  //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> penarikan.php
	echo '<script>window.history.back()</script>';

}else{

//jika data ditemukan, maka membuat variabel $data
$data = mysqli_fetch_assoc($query); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah

}
$nis = @$_REQUEST['nis'];
$sql = "SELECT A.nis, A.saldo, B.nama_siswa FROM tabungan AS A INNER JOIN siswa AS B ON (A.nis = B.nis) WHERE A.nis = $nis";

$query = mysqli_query($koneksi, $sql);
$data = mysqli_fetch_assoc($query);
$tanggal = date('Y-m-d');

?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3>Transaksi Penarikan</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="container-fluid" style="background-color: #fff; padding: 15px">
					<form method="post" action="proses_tambah_penarikan.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>NIS</label>
							<input type="text" class="form-control" name="nissiswa" value="<?php echo $data['nis']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Siswa</label>
							<input type="text" class="form-control" name="nsiswa" value="<?php echo $data['nama_siswa']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Penarikan</label>
							<input type="date" value=<?php echo $tanggal ?> class="form-control" name="tgpenarikan" required="required">
						</div>
						<div class="form-group">
							<label>Jumlah Penarikan</label>
							<input type="number" min="1000" max = <?php echo $data['saldo']; ?> class="form-control" name="tpenarikan" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="required">
						</div>
						<div class="form-group">
							<label>ID Petugas</label>
							<select class="form-control" name="idpetugas" required="required">
								<option value="">-Pilih ID Petugas-</option>
									<?php  
									include "../koneksi/koneksi.php";
									$sql = mysqli_query($koneksi,"SELECT A.id_petugas, B.nama_status FROM petugas AS A INNER JOIN status AS B ON (A.id_status = B.id_status) WHERE nama_status = 'Aktif'");
									while ($data = mysqli_fetch_assoc($sql)){
										echo "<option value='$data[id_petugas]'>$data[id_petugas]</option>";
									}
									?>
							</select>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info">Simpan</button>
							<button type="button" class="btn btn-cancel" data-toggle="modal" data-target="#batal">Batal</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</section>
</section>

<!--Modal Button-->
<div id="batal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<p>Yakin akan dibatalkan?</p>
			</div>
			<div class="modal-footer">
				<a href="penarikan.php" class="btn btn-primary">Ya</a>
				<button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
			</div>
		</div>

	</div>
</div>
<!--Akhir Modal Button-->

<?php  
include("includers/script.php");
include("includers/footer.php");
?>