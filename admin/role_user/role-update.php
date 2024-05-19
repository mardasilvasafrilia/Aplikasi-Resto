<?php
$id_role_user = $_POST['id_role_user'];
$nama_role_user   = $_POST['nama_role_user'];


$query_update = $koneksi->query("UPDATE role_user SET nama_role_user='$nama_role_user' WHERE id_role_user='$id_role_user'
                               ");
if ($query_update) {
     ?>
          <script>
               window.alert('Data berhasil diupdate');
               window.location.href='?page=role_user';
          </script>
     <?php
}else{
     ?>
          <script>
               window.alert('Data gagal diupdate');
               window.location.href='?page=role_user';
          </script>
     <?php
}
?>