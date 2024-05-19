<?php
$id_user     = $_POST['id_user'];
$id_role_user    = $_POST['id_role_user'];
$nama_user           = $_POST['nama_user'];
$username     = $_POST['username'];
$password          = $_POST['password'];

$nama_foto             = $_FILES['foto_user']['name'];

if ($_POST) {
     $id_user            = $_POST['id_user'];
     $id_role_user     = $_POST['id_role_user'];
     $nama_user          = $_POST['nama_user'];
     $username           = $_POST['username'];
     $password           = $_POST['password'];

     $password = password_hash($password, PASSWORD_BCRYPT);

     if ($password == '') {
          $query_update = $koneksi->query("UPDATE user
                                          SET id_role_user        ='$id_role_user',
                                              nama_user           ='$nama_user',
                                              username            ='$username',
                                              password            ='$password'
                                              WHERE id_user       ='$id_user'
                                              ");
     } elseif ($nama_foto == '') {
          $query_update = $koneksi->query("UPDATE user
                                          SET id_role_user        ='$id_role_user',
                                              nama_user           ='$nama_user',
                                              username            ='$username',
                                              password            ='$password'
                                              WHERE id_user       ='$id_user'
                                              ");
     } else {

          $target_lokasi = "../../assets/image/user/";
          $query = $koneksi->query("SELECT foto_user FROM user 
                                   WHERE id_user ='$id_user'");
          $nama_foto_lama = $query->fetch_object()->foto_user;

          unlink("../../assets/image/user/$nama_foto_lama");
          move_uploaded_file($_FILES['foto_user']['tmp_name'], $target_lokasi . $nama_foto);

          $query_update = $koneksi->query("UPDATE user
                                          SET id_role_user        ='$id_role_user',
                                              nama_user           ='$nama_user',
                                              username            ='$username',
                                              password            ='$password',
                                              foto_user          ='$nama_foto'
                                              WHERE id_user       ='$id_user'
                                              ");
     }
}
if ($query_update) {
?>
     <script>
          window.alert('Data berhasil diupdate');
          window.location.href = '?page=user';
     </script>
<?php
} else {
?>
     <script>
          window.alert('Data gagal diupdate');
          window.location.href = '?page=user';
     </script>
<?php
}
?>