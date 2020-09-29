<?php  
	$databaseHost = 'localhost';
	$databaseName = 'sitake';
	$databaseUsername = 'root';
	$databasePassword = '';

	$koneksi = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

	if (!$koneksi) {
		die("Gagal tersambung dengan database : ".mysql_connect_error());
	}
?>