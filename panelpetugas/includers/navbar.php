<!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
<!--header start-->
        <header class="header black-bg">
          <div class="sidebar-toggle-box">
            <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
          </div>
          <!--logo start-->
          <a href="index.php" class="logo"><b>SITA<span>KE</span></b></a>
          <!--logo end-->
          <div class="top-menu">
            <ul class="nav pull-right top-menu">
              <li><button class="logout" type="submit" onClick='return confirmSubmit()'>Keluar</button></li>
            </ul>
          </div>
        </header>
        <!--header end-->

        <!-- Alert Keluar -->
        <script>
          function confirmSubmit()
          {
            var ya=confirm("Yakin akan keluar?");
            if (ya)
              window.location.href = "../logout.php";
            else
              return false ;
          }
        </script>
        <!-- Akhir Alert Keluar -->
        
        <!--sidebar start-->
        <aside>
          <div id="sidebar" class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              <?php
              include '../koneksi/koneksi.php';
              $idpetugas = $_SESSION['idpetugas'];
              $idstatus = $_SESSION['idstatus'];
              $data = mysqli_query($koneksi,"SELECT * FROM petugas where id_petugas='$idpetugas'");
              $query = mysqli_fetch_array($data);

              echo "<p class='centered'><img src='../paneladmin/$query[foto_petugas]' class='img-circle' width='100' height='100'</p>";
              echo "<h5 class='centered'>".$query['nama_petugas']."</h5>";
              echo "<p class='centered'>".$query['level']."</p>";
              ?>
              <li class="mt">
                <a href="index.php">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li>
                <a href="data-siswa.php">
                  <i class="fa fa-tasks"></i>
                  <span>Data Siswa</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-th"></i>
                  <span>Transaksi</span>
                </a>
                <ul class="sub">
                  <li><a href="setoran.php">Setoran</a></li>
                  <li><a href="penarikan.php">Penarikan</a></li>
                </ul>
              </li>
              <li>
                <a href="laporan.php">
                  <i class="fa fa-book"></i>
                  <span>Laporan Tabungan</span>
                </a>
              </li>
            </ul>
            <!-- sidebar menu end-->
          </div>
        </aside>
    <!--sidebar end-->