<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3>Tambah Data Siswa</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="container-fluid" style="background-color: #fff; padding: 15px">
					<form method="post" action="proses_tambah_siswa.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>NIS</label>
							<input type="text" class="form-control" name="nissiswa" minlength="5" maxlength="10" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="required" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="nsiswa" maxlength="50" required="required" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" rows="5" name="asiswa" required="required"></textarea>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="text" class="form-control" name="tsiswa" minlength="11" maxlength="15" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="required" autocomplete="off">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="jksiswa">
								<option required="required">Laki-laki</option>
								<option required="required">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select class="form-control" name="lsiswa">
								<option required="required">Admin</option>
								<option required="required">Petugas</option>
								<option required="required">Siswa</option>
							</select>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control" name="fsiswa" required="required"><br>
							<span>
								<p><i>Foto yang diunggah harus memenuhi ketentuan sebagai berikut :</i></p>
								<li>File foto bertipe <b>JPG</b></li>
								<li>Ukuran maksimal file foto adalah <b>1 MB</b></li>
							</span>
						</div>
						<div class="form-group">
							<button class="btn btn-info" type="submit">Simpan</button>
							<button type="button" class="btn btn-cancel" onClick='return confirmBatal()'>Batal</button>
						</div>

						<script>
							function confirmBatal()
							{
								var ya=confirm("Apakah yakin ingin membatalkan pengisian data?");
								if (ya)
									window.location.href = "data-siswa.php";
								else
									return false ;
							}
						</script>
					</form>
				</div>
			</div>
		</div>
	</section>
</section>

<?php  
include("includers/script.php");
include("includers/footer.php");
?>