<?php
$id_user = $_GET['id_user'];

$query = $koneksi->query("SELECT * FROM user JOIN role_user
                        ON user.id_role_user = role_user.id_role_user
                        WHERE id_user = '$id_user'");

$hasil_user = $query->fetch_object();
?>
<br><center><h2>Edit Data User</h2><br>

<table width="400px">
     <tr>
          <td>
               <form action="?page=user-update" method="POST" enctype="multipart/form-data">
                    <input type="text" value="<?= $id_user ?>" name="id_user" hidden>

                    <select class="form-control mb-2" name="id_role_user" >
                    <option value="<?= $hasil_user->id_role_user?>">
                        <?= $hasil_user-> nama_role_user?>
                    </option>
                    <?php
                        $select_user = $koneksi->query("SELECT * FROM role_user");
                        while ($hasil_kategori = $select_user->fetch_object()) {   
                    ?>
                    <option value="<?php echo $hasil_kategori->id_role_user ?>">
                                <?php echo $hasil_kategori->nama_role_user ?>
                    </option>
                    <?php
                    }
                    ?>
                    </select>
                    <input value="<?= $hasil_user->nama_user?>" class="form-control mb-2" type="text" name="nama_user" placeholder="Nama User">
                    <input value="<?= $hasil_user->username?>" class="form-control mb-2" type="text" name="username" placeholder="Username">
                    <input value="<?= $hasil_user->password?>" class="form-control mb-2" type="text" name="password" placeholder="Password">
                    <input class="form-control mb-2" type="file" name="foto_user">
                    <center><img width="100" src="../../assets/image/user/<?= $hasil_user->foto_user ?>" alt="">
                    <div class="text-form mb=2">*Preview Gambar Lama <br> <?= $hasil_user->foto_user ?></div></center>

                    <center><button class="btn btn-success" type="submit">Simpan</button></center>
               </form>
          </td>
     </tr>
</table>
</center>
