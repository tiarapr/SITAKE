<?php  
include ("../koneksi/koneksi.php");

//Cek apakah tombol daftar sudah diklik atau belum
$idtab = "TA".strtoupper(uniqid());
$idpen = "P".$idtab.strtoupper(uniqid(), 0, 3);
$idtabdet = $idpen.$idtab.strtoupper(uniqid(), 0, 3);
$nis = @$_POST['nissiswa'];
$nama_siswa = @$_POST['nsiswa'];
$tanggal = @$_POST['tgpenarikan'];
$penarikan = @$_POST['tpenarikan'];
$id_petugas = @$_POST['idpetugas'];

//panggil kueri
$a = mysqli_query($koneksi, "select * from tabungan where nis='$nis'");
$b = mysqli_num_rows($a);
if ($b == 0) {
	$sqltab = "insert INTO tabungan SET
								id_tabungan = '$idtab',
								nis = '$nis',
								saldo = '0'
								";

	$querytab = mysqli_query($koneksi, $sqltab);
	$sqlpen = "insert INTO penarikan SET
								id_penarikan = '$idpen',
								id_tabungan = '$idtab',
								penarikan = '$penarikan',
								tanggal = '$tanggal',
								id_petugas = '$id_petugas'
								";

	$querypen = mysqli_query($koneksi, $sqlpen);
} else {
	$c = mysqli_fetch_array($a);
	$d = $c['id_tabungan'];
	$sqlpen = "insert INTO penarikan SET
								id_penarikan = '$idpen',
								id_tabungan = '$d',
								penarikan = '$penarikan',
								tanggal = '$tanggal',
								id_petugas = '$id_petugas'
								";

	$querypen = mysqli_query($koneksi, $sqlpen);
}
	header("location:laporan.php");

?>