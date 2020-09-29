<?php  
include ("../koneksi/koneksi.php");

if (isset($_GET['id_penarikan'])) {
	
	//ambil id dari query string
	$id_penarikan = $_GET['id_penarikan'];

	//buat query hapus
	$sql = "DELETE FROM penarikan WHERE id_penarikan = '$id_penarikan' ";
	$query = mysqli_query($koneksi, $sql);

	//apakah query hapus berhasil?
	if ($sql == TRUE) {
		echo "<script>alert('Hapus data Sukses.');</script>";
	}else{
		echo "<script>alert('Hapus data gagal.');</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=laporan.php" />