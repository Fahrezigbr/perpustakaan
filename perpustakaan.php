<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<table class="table table-striped table-hover">
    <tr class="text-center">
        <th>No</th>
        <th>Nama Buku</th>
        <th>Penerbit</th>
        <th>Penulis</th>
        <th>--Action--</th>
    </tr>
    <?php
        $query = mysqli_query($konek,"SELECT * FROM perpustakaan");
        $no = 1;
        foreach ($query as $row) {
    ?>
    <tr>
        <td align="center" valign="middle"><?php echo $no; ?></td>
        <td valign="middle"><?php echo $row['nama buku']; ?></td>
        <td valign="middle"><?php echo $row['penerbit']; ?></td>
        <td align="center" valign="middle"><?php echo $row['penulis']; ?></td>
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
       
</body>
</html>