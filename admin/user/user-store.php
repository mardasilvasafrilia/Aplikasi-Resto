<?php
     $id_user            = $_POST['id_user'];
     $id_role_user       = $_POST['id_role_user'];
     $nama_user          = $_POST['nama_user'];
     $username           = $_POST['username'];
     $password           = $_POST['password'];
     
     $password = password_hash($password, PASSWORD_DEFAULT);

      
     $nama_foto             = $_FILES['foto_user']['name'];

     // folder tempat penyimpanan gambar
     $target_lokasi         = "../../assets/image/user/";
     
     // pindahkan gambar yang diupload ke lokasi tujuan
     move_uploaded_file($_FILES['foto_user']['tmp_name'],$target_lokasi.$nama_foto);


     $query = $koneksi->query("INSERT INTO user VALUES('', '$id_role_user', '$nama_user', '$username', '$password', '$nama_foto')");
     if ($query) 
     {
          ?>
               <script>
                    window.alert('Data berhasil disimpan!');
                    window.location.href='../layout/admin.php?page=user';
               </script>
          <?php
     }
     else
     {
          ?>
               <script>
                    window.alert('Data gagal disimpan!');
                    window.location.href='../layout/admin.php?page=user-create';
               </script>
          <?php
     }
?>