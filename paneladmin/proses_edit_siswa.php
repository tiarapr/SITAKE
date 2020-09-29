<?php  
include ("../koneksi/koneksi.php");

//get the value from form update
if (isset($_POST["update"])) {
	$nis = @$_POST['nissiswa'];
	$nama_siswa = @$_POST['nsiswa'];
	$alamat_siswa = @$_POST['asiswa'];
	$telepon_siswa = @$_POST['tsiswa'];
	$jk_siswa = @$_POST['jksiswa'];
	$level = @$_POST['lsiswa'];
	$user_siswa = substr(strrev(uniqid()), 0, 7).(@$_POST['usiswa']);
	$pass = substr(strrev(uniqid()), 0, 7).(@$_POST['pssiswa']);
	$cekfoto = @$_POST['cbcek'];

	if ($cekfoto == 'GANTI') {
		$foto_temp = @$_FILES['fsiswa']['tmp_name'];
		$foto_tujuan = uniqid().@$_FILES['fsiswa']['name'];
		$ekstensi_diperbolehkan	= array('jpg'); //hanya boleh mengupload file yang berekstensi jpg
		$x = explode('.', $foto_tujuan);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['fsiswa']['size']; //untuk mendapatkan ukuran file yang di upload
		$idtab = "TA".strtoupper(uniqid());

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){ //untuk menetapkan ukuran maksimal 1 MB

				//Jika upload file berhasil, maka file gambar lama dihapus
				if (move_uploaded_file($foto_temp, "foto/".$foto_tujuan) == TRUE) {
					//Hapus dulu ya
					$abc = "SELECT foto_siswa FROM siswa WHERE nis = $nis";
					$xyz = mysqli_query($koneksi, $abc); // Eksekusi/Jalankan query dari variabel $query
		    		$data = mysqli_fetch_array($xyz); // Ambil data dari hasil eksekusi $sql
					if (file_exists($data['foto_siswa'])) {
						unlink($data['foto_siswa']);
					}
				}
				//Update foto dalam tabel
				$sqlfoto = "UPDATE siswa SET foto_siswa = 'foto/$foto_tujuan' WHERE nis = '$nis'";
				$queryfoto = mysqli_query($koneksi, $sqlfoto);
			}else{
				echo "<script>alert('UKURAN FILE TERLALU BESAR');</script>";
			}
		}else{
			echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');</script>";
		}
	}

	//query for update data in database
	$sql = "UPDATE siswa SET nis = '$nis', nama_siswa = '$nama_siswa', alamat_siswa = '$alamat_siswa', telepon_siswa = '$telepon_siswa', jk_siswa = '$jk_siswa', level = '$level', user_siswa = '$user_siswa', pass = '$pass' WHERE nis = '$nis'";
	$query = mysqli_query($koneksi, $sql);
	if ($sql == TRUE) {
		echo "<script>alert('Edit data Sukses.');</script>";
	}else{
		echo "<script>alert('Edit data gagal.');</script>";
	}	
}

?>
<meta http-equiv="refresh" content="1;url=data-siswa.php" />