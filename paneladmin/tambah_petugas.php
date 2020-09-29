<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3>Tambah Data Petugas</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="alert alert-danger" role="alert">
					<h4><b>PERHATIAN!</b> Pastikan data petugas yang dimasukkan benar!. Cek kembali sebelum menyimpan data. Karena data yang sudah disimpan, tidak dapat dihapus. Data dapat dihapus jika petugas berstatus <b>Tidak Aktif</b>.</h4>
				</div>
				<div class="container-fluid" style="background-color: #fff; padding: 15px">
					<form method="post" action="proses_tambah_petugas.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>ID Petugas</label>
							<input type="text" class="form-control" name="idpetugas" maxlength="2" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="required" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="npetugas" maxlength="50" required="required" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" rows="5" name="apetugas" required="required"></textarea>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="number" class="form-control" name="tpetugas" minlength="12" maxlength="15" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="required" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="jkpetugas">
								<option required="required">Laki-laki</option>
								<option required="required">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select class="form-control" name="lpetugas">
								<option required="required">Admin</option>
								<option required="required">Petugas</option>
								<option required="required">Siswa</option>
							</select>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="spetugas">
								<?php
								$query = mysqli_query($koneksi,"SELECT * FROM status limit 1");
								while ($data = mysqli_fetch_assoc($query)){
									echo "<option value='$data[id_status]'>$data[nama_status]</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="upetugas" required="required" autocomplete="off">
						</div>						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control" name="fpetugas" required="required"><br>
							<span>
								<p><i>Foto yang diunggah harus memenuhi ketentuan sebagai berikut :</i></p>
								<li>File foto bertipe <b>JPG</b></li>
								<li>Ukuran maksimal file foto adalah <b>1 MB</b></li>
							</span>
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
				<a href="data-petugas.php" class="btn btn-primary">Ya</a>
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