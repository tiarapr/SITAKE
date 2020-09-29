<?php  
include ("../koneksi/koneksi.php");

$id_petugas = @$_POST['idpetugas'];
$nama_petugas = @$_POST['npetugas'];
$alamat_petugas = @$_POST['apetugas'];
$telepon_petugas = @$_POST['tpetugas'];
$jk_petugas = @$_POST['jkpetugas'];
$level = @$_POST['lpetugas'];
$status = @$_POST['spetugas'];
$user_petugas = @$_POST['upetugas'];
$pass = substr(strrev(uniqid()), 0, 7).(@$_POST['pspetugas']);
$foto_petugas = uniqid().$_FILES['fpetugas']['name'];
$tmp = $_FILES['fpetugas']['tmp_name'];
$ekstensi_diperbolehkan	= array('jpg'); //hanya boleh mengupload file yang berekstensi jpg
$x = explode('.', $foto_petugas);
$ekstensi = strtolower(end($x));
$ukuran	= $_FILES['fpetugas']['size']; //untuk mendapatkan ukuran file yang di upload
$idtab = "TA".strtoupper(uniqid());

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
	if($ukuran < 1044070){ //untuk menetapkan ukuran maksimal 1 MB	
		move_uploaded_file($tmp, "foto/".$foto_petugas); //untuk menentukan tujuan file akan di upload di mana atau sama dengan lokasi file
		//panggil kueri
		$sql = "INSERT INTO petugas (id_petugas, nama_petugas, alamat_petugas, telepon_petugas, jk_petugas, level, id_status, user_petugas, pass, foto_petugas) VALUES ('$id_petugas', '$nama_petugas', '$alamat_petugas', '$telepon_petugas', '$jk_petugas', '$level', '$status', '$user_petugas', '$pass', 'foto/$foto_petugas')";

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
<meta http-equiv="refresh" content="1;url=data-petugas.php" />