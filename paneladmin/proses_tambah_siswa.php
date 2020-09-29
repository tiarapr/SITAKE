<?php  
include ("../koneksi/koneksi.php");

$nis = @$_POST['nissiswa'];
$nama_siswa = @$_POST['nsiswa'];
$alamat_siswa = @$_POST['asiswa'];
$telepon_siswa = @$_POST['tsiswa'];
$jk_siswa = @$_POST['jksiswa'];
$level = @$_POST['lsiswa'];
$user_siswa = substr(strrev(uniqid()), 0, 7).(@$_POST['usiswa']);
$pass = substr(strrev(uniqid()), 0, 7).(@$_POST['pssiswa']);
$foto_siswa = uniqid().$_FILES['fsiswa']['name']; //untuk mendapatkan nama file yang di upload
$tmp = $_FILES['fsiswa']['tmp_name']; //untuk mendapatkan temporary file yang di upload (tmp)
$ekstensi_diperbolehkan	= array('jpg'); //hanya boleh mengupload file yang berekstensi jpg
$x = explode('.', $foto_siswa);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['fsiswa']['size']; //untuk mendapatkan ukuran file yang di upload

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	if($ukuran < 1044070){ //untuk menetapkan ukuran maksimal 1 MB	
		move_uploaded_file($tmp, "foto/".$foto_siswa); //untuk menentukan tujuan file akan di upload di mana atau sama dengan lokasi file
		//panggil kueri
		$sql = "INSERT INTO siswa (nis, nama_siswa, alamat_siswa, telepon_siswa, jk_siswa, level, user_siswa, pass, foto_siswa) VALUES ('$nis', '$nama_siswa', '$alamat_siswa', '$telepon_siswa', '$jk_siswa', '$level', '$user_siswa', '$pass', 'foto/$foto_siswa')";

		$query = mysqli_query($koneksi, $sql);

		if ($sql == TRUE) {
			echo "<script>alert('Tambah data Sukses.');</script>";
		}else{
			echo "<script>alert('Tambah data gagal.');</script>";
		}	
	}else{
		echo "<script>alert('UKURAN FILE TERLALU BESAR');</script>";
	}
}else{
	echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');</script>";
}

?>
<meta http-equiv="refresh" content="1;url=data-siswa.php" />