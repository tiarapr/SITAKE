<?php  
include ("../koneksi/koneksi.php");

//Cek apakah tombol daftar sudah diklik atau belum
$idtab = "TA".strtoupper(uniqid());
$idset = "S".$idtab.strtoupper(uniqid(), 0, 3);
$idtabdet = $idset.strtoupper(uniqid(), 0, 3);
$nis = @$_POST['nissiswa'];
$tanggal = @$_POST['tgsetoran'];
$setoran = @$_POST['tsetoran'];
$id_petugas = @$_POST['idpetugas'];

$a = mysqli_query($koneksi, "select * from tabungan where nis='$nis'");
$b = mysqli_num_rows($a);
if ($b == 0) {
	$sqltab = "insert INTO tabungan SET
								id_tabungan = '$idtab',
								nis = '$nis',
								saldo = '0'
								";

	$querytab = mysqli_query($koneksi, $sqltab);
	$sqlset = "insert INTO setoran SET
								id_setoran = '$idset',
								id_tabungan = '$idtab',
								setoran = '$setoran',
								tanggal = '$tanggal',
								id_petugas = '$id_petugas'
								";

	$queryset = mysqli_query($koneksi, $sqlset);
} else {
	$c = mysqli_fetch_array($a);
	$d = $c['id_tabungan'];
	$sqlset = "insert INTO setoran SET
								id_setoran = '$idset',
								id_tabungan = '$d',
								setoran = '$setoran',
								tanggal = '$tanggal',
								id_petugas = '$id_petugas'
								";

	$queryset = mysqli_query($koneksi, $sqlset);
}
	header("location:laporan.php");
?>