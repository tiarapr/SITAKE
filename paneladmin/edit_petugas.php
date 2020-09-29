<?php  
include("includers/header.php");
include("includers/navbar.php");
include ("../koneksi/koneksi.php");
//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
$id_petugas = $_GET['id_petugas'];

//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
$sql = "SELECT * FROM petugas WHERE id_petugas = $id_petugas";
$query = mysqli_query($koneksi, $sql);
 //cek apakah data dari hasil query ada atau tidak
if(mysqli_num_rows($query) == 0){

  //jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
	echo '<script>window.history.back()</script>';

}else{

  //jika data ditemukan, maka membuat variabel $data
  $data = mysqli_fetch_assoc($query); //mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah

}
$id_petugas = @$_REQUEST['id_petugas'];
$sql = "SELECT * FROM petugas WHERE id_petugas = $id_petugas";
$query = mysqli_query($koneksi, $sql);
$data_edit = mysqli_fetch_assoc($query);
?>
<section id="main-content">
	<section class="wrapper site-min-height">
		<h3>Edit Data Petugas</h3>
		<div class="row mt">
			<div class="col-lg-12">
				<div class="container-fluid" style="background-color: #fff; padding: 15px">
					<form method="post" action="proses_edit_petugas.php" enctype="multipart/form-data">
						<div class="form-group">
							<label>ID Petugas</label>
							<input type="text" class="form-control" name="idpetugas" value="<?php echo $data_edit['id_petugas']; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama</label>
							<input type="text" class="form-control" name="npetugas" maxlength="50" value="<?php echo $data_edit['nama_petugas']; ?>" required="required">
						</div>
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" rows="5" name="apetugas" required="required"><?php echo $data_edit['alamat_petugas']; ?></textarea>
						</div>
						<div class="form-group">
							<label>Telepon</label>
							<input type="number" class="form-control" name="tpetugas" value="<?php echo $data_edit['telepon_petugas']; ?>" minlength="12" maxlength="15" onkeypress="return event.charCode >= 48 && event.charCode <=57" required="required">
						</div>
						<div class="form-group">
							<label>Jenis Kelamin</label>
							<select class="form-control" name="jkpetugas" required>
								<option value="Laki-laki" <?php if($data['jk_petugas'] == 'Laki-laki'){ echo 'selected'; } ?>>Laki-laki</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
								<option value="Perempuan" <?php if($data['jk_petugas'] == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
							</select>
						</div>
						<div class="form-group">
							<label>Level</label>
							<select class="form-control" name="lpetugas" required>
								<option value="Admin" <?php if($data['level'] == 'Admin'){ echo 'selected'; } ?>>Admin</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
								<option value="Petugas" <?php if($data['level'] == 'Petugas'){ echo 'selected'; } ?>>Petugas</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
								<option value="Siswa" <?php if($data['level'] == 'Siswa'){ echo 'selected'; } ?>>Siswa</option> <!-- jika data di database sama dengan value maka akan terselect/terpilih -->
							</select>
						</div>
						<div class="form-group">
							<label>Status</label>
							<select class="form-control" name="spetugas">
								<?php
								$query = mysqli_query($koneksi,"SELECT * FROM status");
								while ($datastatus = mysqli_fetch_assoc($query)){
									echo "<option value='$datastatus[id_status]' ";
									if ($data['id_status'] == $datastatus['id_status']) {
										echo "selected";
									}
									echo ">$datastatus[nama_status]</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Username</label>
							<input type="text" class="form-control" name="upetugas" value="<?php echo $data_edit['user_petugas']; ?>">
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" class="form-control" name="fpetugas" value="<?php echo $data_edit['foto_petugas']; ?>"><br>
							<input type="checkbox" name="cbcek" id="cbcek" value="GANTI">&nbsp;Centang jika foto di ganti.
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-info" name="update" onClick='return confirmSubmit()'>Update</button>
							<button type="button" class="btn btn-cancel" data-toggle="modal" data-target="#batal">Batal</button>
						</div>
						<script>
							function confirmSubmit()
							{
								var ya=confirm("Apakah data sudah benar?");
								if (ya)
									window.location.href = "proses_edit_petugas.php";
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