<center>
<br>
<h2>Input Data User</h2>
<br>
<table width="400px">
     <tr>
          <td>
               <form action="?page=user-store" method="post" enctype="multipart/form-data">
                    <select class="form-control mb-2" name="id_role_user" >
                    <option value="">-Pilih Role User-</option>
                    <?php
                        $select_role= $koneksi->query("SELECT * FROM role_user");
                        while ($hasil_role = $select_role->fetch_object()) {   
                    ?>
                    <option value="<?php echo $hasil_role->id_role_user ?>">
                                <?php echo $hasil_role->nama_role_user ?>
                    </option>
                    <?php
                    }
                    ?>
                    </select>
                    <input class="form-control mb-2" type="text" name="nama_user" placeholder="Nama User">

                    <input class="form-control mb-2" type="text" name="username" placeholder="Username">

                    <input class="form-control mb-2" type="text" name="password" placeholder="Password">

                    <input class="form-control" type="file" name="foto_user">
                    <div class="text-form">*Masukan File Gambar</div>

                    <center><button class="btn btn-success" type="submit">Simpan</button></center>
               </form>
          </td>
     </tr>
</table>
</center>