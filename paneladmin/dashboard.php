<h3>Dashboard</h3>
<div class="row mt">
	<div class="col-lg-12">
		<div class="col-lg-4">
			<div class="card" style="padding: 20px; height: auto;">
				<center>
					<img src="../assets/img/icon/siswa.svg" style="width: 50px; height: 50px;">
					<?php  
					$js_query = mysqli_query($koneksi, "SELECT * FROM siswa");
					$js_data = mysqli_num_rows($js_query);
					?>
					<h1><b><?php echo $js_data; ?></b></h1>
					<h4>Jumlah Siswa</h4>
				</center>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card" style="padding: 20px; height: auto;">
				<center>
					<img src="../assets/img/icon/money2.svg" style="width: 50px; height: 50px;">
					<?php  
					$query = "SELECT SUM(saldo) FROM tabungan";      
					$result = mysqli_query($koneksi,$query);

					while($row=mysqli_fetch_array($result)){    
						echo"<h1><b>".number_format($row['SUM(saldo)'])."</b></h1>";
					}
					?>
					<h4>Total Saldo</h4>
				</center>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="card" style="padding: 20px; height: auto;">
				<center>
					<img src="../assets/img/icon/siswa.svg" style="width: 50px; height: 50px;">
					<?php  
					$jp_query = mysqli_query($koneksi, "SELECT * FROM tabungan");
					$jp_data = mysqli_num_rows($jp_query);
					?>
					<h1><b><?php echo $jp_data; ?></b></h1>
					<h4>Jumlah Penabung</h4>
				</center>
			</div>
		</div>
	</div>
</div>