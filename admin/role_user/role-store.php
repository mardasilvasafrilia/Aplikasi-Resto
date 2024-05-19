<?php
     $id_role_user   = $_POST['id_role_user'];
     $nama_role_user          = $_POST['nama_role_user'];
     $query = $koneksi->query("INSERT INTO role_user VALUES('$id_kategori_menu', '$nama_role_user' )");
     if ($query) 
     {
          ?>
               <script>
                    window.alert('Data berhasil disimpan!');
                    window.location.href='../layout/admin.php?page=role_user';
               </script>
          <?php
     }
     else
     {
          ?>
               <script>
                    window.alert('Data gagal disimpan!');
                    window.location.href='../layout/admin.php?page=role-create';
               </script>
          <?php
     }
?>