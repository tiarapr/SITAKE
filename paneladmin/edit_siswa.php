<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
$nis = $_GET['nis'];

//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
$sql = "SELECT * FROM siswa WHERE nis = $nis";
$query = mysqli_query($koneksi, $sql);
 //cek apakah data dari hasil query ada atau tidak
if(mysqli_num_rows($query) == 0){

  //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
	echo '<script>window.history.back()</script>';

}else{

  //jika data ditemukan, maka membuat variabel $data
  $data = mysqli_fetch_assoc($query); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah

}
$nis = @$_REQUEST['nis'];
$sql = "SELECT * FROM siswa WHERE nis = $nis";
$query = mysqli_query($koneksi, $sql);
$data_edit = mysqli_fetch_assoc($query);
?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3>Edit Data Siswa</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="container-fluid" style="background-color: #fff; padding: 15px">
					<form method="post" action="proses_edit_siswa.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>NIS</label>
							<input type="text" class="form-control" name="nissiswa" value="<?php echo $data_edit['nis']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="nsiswa" autocomplete="off" maxlength="50" value="<?php echo $data_edit['nama_siswa']; ?>" required="required">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" rows="5" name="asiswa" required="required"><?php echo $data_edit['alamat_siswa']; ?></textarea>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="number" class="form-control" name="tsiswa" autocomplete="off" value="<?php echo $data_edit['telepon_siswa']; ?>" minlength="11" maxlength="15" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="required">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="jksiswa" required>
								<option value="Laki-laki" <?php if($data['jk_siswa'] == 'Laki-laki'){ echo 'selected'; } ?>>Laki-laki</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
								<option value="Perempuan" <?php if($data['jk_siswa'] == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
							</select>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select class="form-control" name="lsiswa" required>
								<option value="Admin" <?php if($data['level'] == 'Admin'){ echo 'selected'; } ?>>Admin</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
								<option value="Petugas" <?php if($data['level'] == 'Petugas'){ echo 'selected'; } ?>>Petugas</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
								<option value="Siswa" <?php if($data['level'] == 'Siswa'){ echo 'selected'; } ?>>Siswa</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
							</select>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control" name="fsiswa" value="<?php echo $data_edit['foto_siswa']; ?>"><br>
							<input type="checkbox" name="cbcek" id="cbcek" value="GANTI">&nbsp;Centang jika foto di ganti.
							<span>
								<p style="padding-top: 10px"><i>Foto yang diunggah harus memenuhi ketentuan sebagai berikut :</i></p>
								<li>File foto bertipe <b>JPG</b></li>
								<li>Ukuran maksimal file foto adalah <b>1 MB</b></li>
							</span>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info" name="update">Update</button>
							<button type="button" class="btn btn-cancel" onClick='return confirmBatal()'>Batal</button>
						</div>

						<script>
							function confirmBatal()
							{
								var ya=confirm("Apakah yakin ingin membatalkan pengeditan data?");
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