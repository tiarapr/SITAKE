<?php  
include ("../koneksi/koneksi.php");

if (isset($_GET['id_petugas'])) {
	
	//ambil id dari query string
	$id_petugas = $_GET['id_petugas'];

	//buat query hapus
	$sql = "DELETE FROM petugas WHERE id_petugas = '$id_petugas' ";
	$query = mysqli_query($koneksi, $sql);

	//apakah query hapus berhasil?
	if ($sql == TRUE) {
		echo "<script>alert('Hapus data Sukses.');</script>";
	}else{
		echo "<script>alert('Hapus data gagal.');</script>";
	}
}
?>
<meta http-equiv="refresh" content="1;url=data-petugas.php" />