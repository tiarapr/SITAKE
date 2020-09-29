<?php  
include ("../koneksi/koneksi.php");

if (isset($_GET['id_setoran_detail'])) {
	
	//ambil id dari query string
	$id_setoran = $_GET['id_setoran'];

	//buat query hapus
	$sql = "DELETE FROM setoran WHERE id_setoran = '$id_setoran' ";
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