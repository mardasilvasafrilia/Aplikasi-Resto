<?php
$id_role_user = $_GET['id_role_user'];

$query = $koneksi->query("SELECT * FROM role_user WHERE id_role_user = '$id_role_user'");
$hasil = $query->fetch_object();
?>
<br><center><h2>Edit Data Role User</h2><br>

<table width="400px">
     <tr>
          <td>
               <form action="?page=role-update" method="POST">
                    <input type="text" value="<?= $id_role_user ?>" name="id_role_user" hidden>

                    <input class="form-control mb-2" value="<?= $hasil->nama_role_user?>" 
                    type="text" name="nama_role_user" placeholder="Nama Role User">

                    <center><button class="btn btn-success" type="submit">Simpan</button></center>
               </form>
          </td>
     </tr>
</table>
</center>
