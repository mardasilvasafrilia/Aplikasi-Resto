<?php
include('../login/login-session-cek.php');
?>
<br>
<center><h2>Data User</h2></center>

<table class="table table-striped">
     <tr>
          <th>No</th>
          <th>Nama Role</th>
          <th>Nama User</th>
          <th>Username</th>
          <th>Password</th>
          <th>Foto User</th>
          <th>--Action--</th>
     </tr>
     <?php
     $no = 1;
     $query = $koneksi->query(" SELECT * FROM user
                                JOIN role_user
                                ON user.id_role_user = role_user.id_role_user");
     while ($hasil = $query->fetch_object()) 
     {
          ?>
          <tr>
               <td><?= $no ?></td>
               <td><?= $hasil->nama_role_user ?></td>
               <td><?= $hasil->nama_user ?></td>
               <td><?= $hasil->username ?></td>
               <td>*******</td>
               <td>
                    <img width="60" height="60" class="img-fluid" src="../../assets/image/user/<?= $hasil->foto_user ?>" alt="gambar_user">
               </td>
               <td>|
                    <a style="text-decoration:none" href="?page=user-edit&id_user=<?= $hasil->id_user?>">
                    <i class="fa-solid fa-pen-to-square fa-sm" style="color: #005eff;"></i>
                    </a>
                    |
                    <a style="text-decoration:none" href="?page=user-delete&id_user=<?= $hasil->id_user ?>">
                         <i class="fa-solid fa-trash fa-sm" style="color: #ff0000;"></i>
                    </a>|
               </td>
          </tr>
          <?php
          $no++;
     }
     ?>
    
</table>
<a href="?page=user-create">
     <button class="btn btn-success mb-2">Tambah</button>
</a>
<br>
<br>