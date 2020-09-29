<?php  
include ("../koneksi/koneksi.php");

if (isset($_GET['nis'])) {
	
	//ambil id dari query string
	$nis = $_GET['nis'];

	//buat query hapus
	$sql = "DELETE FROM siswa WHERE nis= '$nis' ";
	$query = mysqli_query($koneksi, $sql);

	//apakah query hapus berhasil?
	if ($sql == TRUE) {
		echo "<script>alert('Hapus data Sukses.');</script>";
	}else{
		echo "<script>alert('Hapus data gagal.');</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=data-siswa.php" />