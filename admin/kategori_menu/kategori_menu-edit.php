<?php
$id_kategori_menu = $_GET['id_kategori_menu'];
$query = $koneksi->query("SELECT * FROM kategori_menu WHERE id_kategori_menu = '$id_kategori_menu'");
$hasil = $query->fetch_object();
?>
<br><center><h2>Edit Data Kategori Menu</h2><br>

<table width="400px">
     <tr>
          <td>
               <form action="?page=kategori_menu-update" method="POST" enctype="multipart/form-data">
                    <input type="text" value="<?= $hasil->id_kategori_menu ?>" name="id_kategori_menu" hidden>

                    <input class="form-control mb-2" value="<?= $hasil->nama_kategori_menu?>" 
                    type="text" name="nama_kategori_menu" placeholder="Nama Kategori Menu">

                    <input class="form-control mb-2" type="file" name="foto_kategori_menu">
                    
                    <center><img width="100" src="../../assets/image/kategori_menu/<?= $hasil->foto_kategori_menu ?>" alt="">
                    <div class="text-form mb=2">*Preview Gambar Lama <br> <?= $hasil->foto_kategori_menu ?></div></center>

                    <div class="d-grid">
                    <center><button class="btn btn-success" type="submit">Simpan</button></center>
                    </div>
               </form>
          </td>
     </tr>
</table>
</center>
