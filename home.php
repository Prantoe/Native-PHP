
<h2 class="text-center">Selamat Datang<br>Sistem Informasi Penjadwalan Tiket GoKart</h2>
<br>
<div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
        <?php
          include 'koneksi.php';
            $jumlah_cust = mysqli_query($koneksi, "SELECT * FROM tb_customer");
            $jumlah_transaksi = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
            $jumlah_kart = mysqli_query($koneksi, "SELECT * FROM tb_kart");
            $jumlah_jadwal = mysqli_query($koneksi, "SELECT * FROM tb_jadwal");

          $jml_cst = mysqli_num_rows($jumlah_cust);
          $jml_tnksi = mysqli_num_rows($jumlah_transaksi);
          $jml_kart = mysqli_num_rows($jumlah_kart);
          $jml_jadwal = mysqli_num_rows($jumlah_jadwal);
          //  var_dump($test);
          ?>
          
          <h3><?= $jml_cst ?></h3>
                
                <p>Customer</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              
                <h3><?= $jml_tnksi ?></h3>

                <p>Transaksi</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jml_kart ?></h3>

                <p>Kart</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $jml_jadwal ?></h3>

                <p>Jadwal</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>

        