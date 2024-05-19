
<?php
//query untuk menampilkan menu
$query_select_menu = $koneksi->query(" SELECT * FROM menu WHERE status_menu ='tersedia'");
$tampilmenu = mysqli_num_rows($query_select_menu);

//query untuk menampilkan transaksi onproses
$query_select_tr_op = $koneksi->query(" SELECT * FROM transaksi WHERE status_transaksi='onproses' ");
$tampilonproses = mysqli_num_rows($query_select_tr_op );

//query untuk menampilkan transaksi selesai
$query_select_tr_sl = $koneksi->query(" SELECT * FROM transaksi WHERE status_transaksi='selesai' ");
$tampilselesai = mysqli_num_rows($query_select_tr_sl );

?>
<center>
     <br>
     <h2>Selamat Datang <?= $_SESSION['nama_user'] ?></h2>
     <br>
     <div class="row">
          <div class="col">
               <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                         <div class="card-header text-bg-secondary">Menu Tersedia</div>
                    <div class="card-body">
                         <h5 class="card-title"><?= $tampilmenu ?> menu</h5>
                         <hr>
                         <p class="card-text">
                              <a class="nav-link link-primary" href="">Click here for detail</a>
                         </p>
                    </div>
               </div>
          </div>
          <div class="col">
          <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                         <div class="card-header text-bg-warning">Transaksi On Proses</div>
                    <div class="card-body">
                         <h5 class="card-title"><?= $tampilonproses ?> onproses</h5>
                         <hr>
                         <p class="card-text">
                              <a class="nav-link link-primary" href="">Click here for detail</a>
                         </p>
                    </div>
               </div>
          </div>
          <div class="col">
          <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                         <div class="card-header text-bg-success">Transaksi Selesai</div>
                    <div class="card-body">
                         <h5 class="card-title"><?= $tampilselesai ?> selesai</h5>
                         <hr>
                         <p class="card-text">
                              <a class="nav-link link-primary" href="">Click here for detail</a>
                         </p>
                    </div>
               </div>
          </div>
     </div>
</center>