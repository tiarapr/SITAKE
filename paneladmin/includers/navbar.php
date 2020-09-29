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
              <p class="centered"><a href="profile.html"><img src="img/user.png" class="img-circle" width="100px" height="100px" ></a></p>
              <?php
              include '../koneksi/koneksi.php';
              $idadmin = $_SESSION['idadmin'];
              $data = mysqli_query($koneksi,"SELECT * FROM admin where id_admin='$idadmin'");
              $query = mysqli_fetch_array($data);

              echo "<h5 class='centered'>".$query['nama_admin']."</h5>";
              echo "<p class='centered'>".$query['level']."</p>";
              ?>
              <li class="mt">
                <a href="index.php">
                  <i class="fa fa-bar-chart-o"></i>
                  <span>Dashboard</span>
                </a>
              </li>
              <li class="sub-menu">
                <a href="javascript:;">
                  <i class="fa fa-th"></i>
                  <span>Master Data</span>
                </a>
                <ul class="sub">
                  <li><a href="data-petugas.php">Data Petugas</a></li>
                  <li><a href="data-siswa.php">Data Siswa</a></li>
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