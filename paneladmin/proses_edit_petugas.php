<?php  
include ("../koneksi/koneksi.php");

//get the value from form update
if (isset($_POST["update"])) {
	$id_petugas = @$_POST['idpetugas'];
	$nama_petugas = @$_POST['npetugas'];
	$alamat_petugas = @$_POST['apetugas'];
	$telepon_petugas = @$_POST['tpetugas'];
	$jk_petugas = @$_POST['jkpetugas'];
	$level = @$_POST['lpetugas'];
	$id_status = @$_POST['spetugas'];
	$user_petugas = @$_POST['upetugas'];
	$pass = $pass = substr(strrev(uniqid()), 0, 7).(@$_POST['pspetugas']);
	$cekfoto = @$_POST['cbcek'];

	if ($cekfoto == 'GANTI') {
		$foto_temp = @$_FILES['fpetugas']['tmp_name'];
		$foto_tujuan = uniqid().@$_FILES['fpetugas']['name'];
		$ekstensi_diperbolehkan	= array('jpg'); //hanya boleh mengupload file yang berekstensi jpg
		$x = explode('.', $foto_tujuan);
		$ekstensi = strtolower(end($x));
		$ukuran	= $_FILES['fpetugas']['size']; //untuk mendapatkan ukuran file yang di upload

		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			if($ukuran < 1044070){ //untuk menetapkan ukuran maksimal 1 MB

				//Jika upload file berhasil, maka file gambar lama dihapus
				if (move_uploaded_file($foto_temp, "foto/".$foto_tujuan) == TRUE) {
					//Hapus dulu ya
					$abc = "SELECT foto_petugas FROM petugas WHERE id_petugas = $id_petugas";
					$xyz = mysqli_query($koneksi, $abc); // Eksekusi/Jalankan query dari variabel $query
		    		$data = mysqli_fetch_array($xyz); // Ambil data dari hasil eksekusi $sql
					if (file_exists($data['foto_petugas'])) {
						unlink($data['foto_petugas']);
					}
				}
				//Update foto dalam tabel
				$sqlfoto = "UPDATE petugas SET foto_petugas = 'foto/$foto_tujuan' WHERE id_petugas = $id_petugas";
				$queryfoto = mysqli_query($koneksi, $sqlfoto);
			}else{
				echo "<script>alert('UKURAN FILE TERLALU BESAR');</script>";
			}
		}else{
			echo "<script>alert('EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN');</script>";
		}
	}

	//query for update data in database
	$sqldata = "UPDATE petugas SET id_petugas = '$id_petugas', nama_petugas = '$nama_petugas', alamat_petugas = '$alamat_petugas', telepon_petugas = '$telepon_petugas', jk_petugas = '$jk_petugas', level = '$level', id_status = '$id_status', user_petugas = '$user_petugas', pass = '$pass' WHERE id_petugas = '$id_petugas'";
	$query = mysqli_query($koneksi, $sqldata);
	if ($sqldata == TRUE) {
		echo "<script>alert('Edit data Sukses.');</script>";
	}else{
		echo "<script>alert('Edit data gagal.');</script>";
	}	
	
}

?>
<meta http-equiv="refresh" content="1;url=data-petugas.php" />