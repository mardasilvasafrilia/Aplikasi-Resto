<?php
include('../login/login-session-cek.php');
?>
<br>
<center><h2>Data Role User</h2></center>
<a href="?page=role-create">
     <button class="btn btn-success mb-2">Tambah</button></a>
<table class="table table-striped">
     <tr>
          <th>No</th>
          <th>Nama Role</th>
          <th>--Action--</th>
     </tr>
     <?php
     $no = 1;
     $query = $koneksi->query(" SELECT * FROM role_user");
     while ($hasil = $query->fetch_object()) 
     {
          ?>
          <tr>
               <td><?= $hasil->id_role_user ?></td>
               <td><?= $hasil->nama_role_user ?></td>
               <td>|
                    <a style="text-decoration:none" href="?page=role-edit&id_role_user=<?= $hasil->id_role_user?>">
                    <i class="fa-solid fa-pen-to-square fa-sm" style="color: #005eff;"></i>
                    </a>
                    |
                    <a style="text-decoration:none" href="?page=role-delete&id_role_user=<?= $hasil->id_role_user ?>">
                         <i class="fa-solid fa-trash fa-sm" style="color: #ff0000;"></i>
                    </a>|
               </td>
          </tr>
          <?php
          $no++;
     }
     ?>
</table>

<br>
<br>