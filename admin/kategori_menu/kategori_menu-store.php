<?php
     $nama_kategori_menu    = $_POST['nama_kategori_menu'];
     $nama_foto             = $_FILES['foto_kategori_menu']['name'];

     // folder tempat penyimpanan gambar
     $target_lokasi         = "../../assets/image/kategori_menu/";
     
     // pindahkan gambar yang diupload ke lokasi tujuan
     move_uploaded_file($_FILES['foto_kategori_menu']['tmp_name'],$target_lokasi.$nama_foto);


     $query = $koneksi->query("INSERT INTO kategori_menu VALUES('','$nama_kategori_menu', '$nama_foto')");
     if ($query) 
     {
          ?>
               <script>
                    window.alert('Data berhasil disimpan!');
                    window.location.href='../layout/admin.php?page=kategori_menu';
               </script>
          <?php
     }
     else
     {
          ?>
               <script>
                    window.alert('Data gagal disimpan!');
                    window.location.href='../layout/admin.php?page=kategori_menu-create';
               </script>
          <?php
     }
?>