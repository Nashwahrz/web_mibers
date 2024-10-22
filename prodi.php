<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
   case 'list':

     ?>
     
<h2>Data Prodi</h2>


<a href="index.php?p=prodi&aksi=tambah" class="btn btn-primary mb-3">Tambah Prodi</a>
<table class="table table-bordered">
   <tr>
    <th>No</th>
    <th>id prodi</th>
    <th>Nama Prodi</th>
    <th>Jenjeng studi</th>
    <th>Aksi</th>
   </tr>


   <?php
        include 'koneksi.php';
        $ambil = mysqli_query($db,"select * from prodi");
        $no=1;

        //fetc_array memproses query dan hasilnya disimpan dalam array
       while ($data = mysqli_fetch_array($ambil)) {       
     ?>

     <tr>
        <td><?=$no?></td>
        <td><?=$data['id']?></td>
        <td><?=$data['nama_prodi']?></td>
        <td><?=$data['jenjang_studi']?></td>
        <td>
            <a href="index.php?p=prodi&aksi=edit&id_edt=<?=$data['id']?>" 
            class="btn btn-warning"> Edit</a>
            <a href="delete_prodi.php?proses=delete&id_hapus=<?= $data['id']?>"
            class="btn btn-danger"onclick="return confirm('yakin akan menghapus data?')">Delete</a>

        </td>

     </tr>
    

     <?php

     $no++;}
     ?>


</table>

     <?php
    
      break;
   
   case 'tambah' :

      ?>
      
<h2 class="alert alert-primary text-center mt-3" style="background-color: #0050ab; margin-bottom: 0; color:aliceblue">Form Tambah prodi</h2>

<form class="mt-0" style="padding-left: 50px; padding-right: 150px; background-color: #c1cfd8" method="post" action="proses_prodi.php?proses=insert">
  
    <!-- Nama -->
  <div class="mb-3">
    <label for="nama" class="form-label mt-3">NAMA</label>
    <input type="text" class="form-control" id="nama" name="nama_prodi" required>
  </div>

  <!-- Jenjang -->
  <select class="form-select mb-5" aria-label="Default select example" name="jenjang_studi">
  <option selected>Pilih Jenjang</option>
  <option value="D2">D2</option>
  <option value="D3">D3</option>
  <option value="D4">D4</option>
</select>
  
  <!-- Tombol Submit -->
  <button type="submit" class="btn btn-primary mb-3" name="submit">Simpan</button>
  <button type="reset" class="btn btn-danger mb-3">Reset</button>
</form>
      <?php
     
      break;

      case 'edit':
         include 'koneksi.php';

         $ambil_prodi = mysqli_query($db,"select * from prodi where id
          ='$_GET[id_edt]'");
         $data_prodi = mysqli_fetch_array($ambil_prodi);
         ?>
   
         
<h2 class="alert alert-primary text-center mt-3" style="background-color: #0050ab; margin-bottom: 0; color:aliceblue">Form Edit prodi</h2>

<form class="mt-0" style="padding-left: 50px; padding-right: 150px; background-color: #c1cfd8" method="post" action="proses_prodi.php?proses=update">
  
    <!-- Nama -->
  <div class="mb-3">
    <label for="nama" class="form-label mt-3">NAMA</label>
    <input type="text" class="form-control" id="nama" name="nama_prodi" required
    value="<?= $data_prodi['nama_prodi']?>" >
  </div>

  <!-- Jenjang -->
  <select class="form-select mb-5" aria-label="Default select example" name="jenjang_studi">
  <option selected>Pilih Jenjang</option>
  <option value="D2" <?= ($data_prodi['jenjang_studi'] == 'D2') ? 'selected' : ''; ?>>D2</option>
  <option value="D3" <?= ($data_prodi['jenjang_studi'] == 'D3') ? 'selected' : ''; ?>>D3</option>
  <option value="D4" <?= ($data_prodi['jenjang_studi'] == 'D4') ? 'selected' : ''; ?>>D4</option>
</select>
  
  <!-- Tombol Submit -->
  <button type="submit" class="btn btn-primary mb-3" name="submit">Simpan</button>
  <button type="reset" class="btn btn-danger mb-3">Reset</button>
</form>

         <?php
         break;
}




?>







