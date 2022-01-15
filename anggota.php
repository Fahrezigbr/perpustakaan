<?php 
//Proses Delete data
if (isset($_GET['delete'])) {
    $id = $_GET['id'];
    $query_delete = mysqli_query($konek,"DELETE FROM anggota WHERE id_anggota = '$id'");
    if ($query_delete) {
        ?>
        
        <div class="alert alert-success">
                    DATA BERSAHIL DIHAPUS !!!  
                </div>

        
        
        <?php
         header('refresh: 2; url=http://localhost/nabilah_perpus/admin.php?page=anggota');   
    }
}

  //Proses Insert Tambah Data
        if (isset($_POST['submit'])) 
        {

        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jurusan = $_POST['jurusan'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $no_telp = $_POST['tlp'];
        $alamat = $_POST['alamat'];
        $gender = $_POST['gender'];

        $query_insert = mysqli_query($konek,"INSERT INTO anggota 
        VALUES ('','$nis','$nama','$kelas','$jurusan','$tgl_lahir','$no_telp','$alamat','$gender')" );

        // MEMBUAT NOTIFIKASI JIKA BERHASIL/TIDAK DISIMPAN DATANYA
        if ($query_insert) {
            ?>
                <div class="alert alert-success">
                    DATA BERSAHIL DISMPAN !!!  
                </div>

            <?php
           header('refresh: 2; url=http://localhost/nabilah_perpus/admin.php?page=anggota');   
        
        
        }else{
            ?>
            <div class="alert alert-success">
                DATA BERSAHIL DISMPAN !!!  
       </div>
                <?php
        }

        }
  //
?>
<center><h1 class="mt-4 mb-3">Data Anggota</h1></center>

<table class="table table-striped table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>Tgl Lahir</th>
        <th>Tlp</td>
        <th>Alamat</th>
        <th>Gender</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($konek,"SELECT * FROM anggota");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nis']; ?></td>
        <td valign="middle"><?php echo $row['nama']; ?></td>
        <td valign="middle"><?php echo $row['kelas']; ?></td>
        <td valign="middle"><?php echo $row['jurusan']; ?></td>
        <td valign="middle"><?php echo $row['tgl_lahir']; ?></td>
        <td valign="middle"><?php echo $row['tlp']; ?></td>
        <td valign="middle"><?php echo $row['alamat']; ?></td>
        <td align="center" valign="middle"><?php echo $row['gender']; ?></td>
        <td valign="middle">
       
       <!--HAPUS DATA -->

        <a href="?page=anggota&delete&id=<?php echo $row['id_anggota']; ?>">
            <button class="btn btn-danger"><i class="fas fa-trash-alt">HAPUS</i></button>
        </a>
            <!--UBAH DATA -->

            <button class="btn btn-success"><i class="fas fa-edit">UBAH</i></button>
        </td>
    </tr>
    <?php
    $no++;
    }
    ?>
</table>

<!-- !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!! -->

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Tambah Data Anggota
</button>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
     
     
      <!-- Form Input Anggota  -->
         <form action="" method="post">
        
         <div class="form-group mt-2">
            <input class="form-control" type="text" name ="nis" placeholder="NIS" required>
        </div>

        <div class="form-group mt-2">
            <input class="form-control" type="text" name ="nama" placeholder="Nama Siswa" required>
        </div>

        
       
        <div class="class form grup mt-2">
            <select class="form-control" name="kelas">
                <option value="">Pilih kelas</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                </select>    
        </div>

        <div class="class form grup mt-2">
            <select class="form-control" name="jurusan">
                <option value="">Pilih Jurusan</option>
                <option value="RPL">RPL</option>
                <option value="TKR">TKR</option>
                <option value="TITL">TITL</option>
                <option value="TAV">TAV</option>
                </select>    
        </div>

        <div class="form-group mt-2">
            <div class="input-group">
            <span class="input-group-text">Tanggal Lahir</span>
              <input class="form-control" type="date" name ="tgl_lahir" placeholder="tgl_lahir" required>
            </div>
        </div>


          <div class="form-group mt-2">
                <input class="form-control" type="text" name ="tlp" placeholder="tlp" required>
          </div>

          <div class="form-group mt-2">
                <textarea class="form-control" type="text" name ="alamat" placeholder="alamat" required></textarea>
          </div>

          <div class="class form group mt-2">
            <select class="form-control" name="gender" id="">
            <option value="">Jenis Kelamin</option>
            <option value="Laki-Laki">Laki-Laki</option>
            <option value="Perempuan">Perempuan</option>
            </select>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="submit">submit</button>
       
      </div>
      </form>
    </div>
  </div>
</div>

<!--END FORM INPUT ANGGOTA -->

<!-- MODAL EDIT-->

<?php
        if (isset($_GET['edit'])) {
        $id =$_GET['id'];
        $query = mysqli_query($konek,"SELECT * FROM anggota WHERE id_anggota ='$id'");
        foreach ($query as $row){
    ?>
    <script>
        $(document).ready(function(){
            $("#edit-modal").modal('show');
        });
    </script>
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form edit Data Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form  action="anggota.php" method="get"> 
        <input type="hidden" name="id" value="<?php echo $row['id_anggota']; ?>">
        <div class="formm-group mb-2">
            <input value="<?php echo $row['nis']; ?>" class="form-control" type="text" name="nis" placeholder="NIS" required>
        </div>
        <div class="form-group mb-2">
            <input value="<?php echo $row['nama']; ?>" class="form-control" type="text" name="nama" placeholder="NAMA" required>
        </div>

        <div class="form-group mb-2">
           <select value="<?php echo $row['kelas']; ?>" class="form-control" name="kelas" placeholder="KELAS" required>
           <option value="<?php echo $row['kelas']; ?>">
           <?php
                if ($row['kelas']=='10') {
                    echo "10";
                }elseif ($row['kelas']=='11') {
                    echo "11";
                }else{
                    echo "12";
                }
           ?>
           </option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            </select>
        </div>
        <div class="form-group mb-2">
           <select  class="form-control" name="jurusan" placeholder="jurusan" required >
           <option value="<?php echo $row['jurusan']; ?>">
           <?php
                    if ($row['jurusan']=='RPL') {
                        echo "RPL";
                    }elseif ($row['jurusan']=='TAV') {
                        echo "TAV";
                    }elseif ($row['jurusan']=='TKR') {
                        echo "TKR";
                    }else {
                        echo "TITL";
                    }
            ?>
           </option>
            <option value="RPL">RPL</option>
            <option value="TKR">TKR </option>
            <option value="TITL">TITL</option>
            <option value="TAV">TAV </option>
            </select>
        </div>
        <div class="input-group mb-2">
        <span class="input-group-text">Tanggal Lahir</span>
            <input value="<?php echo $row['tgl_lahir']; ?>" class="form-control" type="date" name="tgl_lahir" placeholder="tgl_lahir" required>
        </div>
        <div class="from-group mb-2">
            <input value="<?php echo $row['tlp']; ?>" class="form-control" type="text" name="tlp" placeholder="tlp" required>
        </div>
        <div class="form-floating">
            <textarea  class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="alamat" required><?php echo $row['alamat']; ?></textarea>
            <label for="floatingTextarea2">Alamat</label>
        </div>
        <div class="from-group ">
            <select value="<?php echo $row['gender']; ?>" class="form-control" name="gender" required >
            <option vvalue="<?php echo $row['gender']; ?>">
                <?php
                        if ($row['gender']=='l') {
                            echo "Laki-Laki";
                        }else  {
                            echo "Perempuan";
                        }
                ?>
            </option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="update" class="btn btn-primary">Update</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- END MODAL EDIT-->

<?php
}
}
?>