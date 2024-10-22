<?php 

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';



switch ($aksi) {
  case 'list':
   
    ?>
     
     <h2>Daftar Dosen</h2>

<a href="index.php?p=dosen&aksi=tambah" class="btn btn-primary mb-3">Tambah Dosen</a>

<table class="table table-bordered table-hover">
<tr class="table-danger">
<th>No</th>
<th>Nip</th>
<th>Nama Dosen</th>
<th>Email</th>
<th>Prodi</th>
<th>Notelp</th>
<th>Alamat</th>
<th>Aksi</th>

</tr>

<?php
include 'koneksi.php';
$ambil = mysqli_query($db,"select * from prodi,dosen where prodi.id = dosen.prodi_id");
$no=1;

//fetc_array memproses query dan hasilnya disimpan dalam array
while ($data = mysqli_fetch_array($ambil)) {       
?>

<tr>
 <td><?= $no ?></td>
 <td><?= $data['nip']?></td>
 <td><?= $data['nama_dosen']?></td>
 <td><?= $data['email']?></td>
 <td><?= $data['nama_prodi']?></td>
 <td><?= $data['notelp']?></td>
 <td><?= $data['alamat']?></td>

<td>

<!-- jika ada lebih dari satu parameter tambahkan & -->
    <a href="index.php?p=dosen&aksi=edit&id_edit=<?=$data['id']?>"
     class="btn btn-warning">Edit</a>

    <a href="proses_dosen.php?proses=delete&id_hapus=<?= $data['id']?>"
     class="btn btn-danger"onclick="return confirm('yakin akan menghapus data?')">Delete</a>
</td>

</tr>
<?php

$no++;

}
?>
</table>

    <?php
     
    break;
  
  case 'tambah':

    ?>

 
  
  
  
  <h2 class="alert alert-primary text-center mt-3" style="background-color: #0050ab; margin-bottom: 0; color:aliceblue">Form Registrasi</h2>

    <form class="mt-0" style="padding-left: 50px; padding-right: 150px; background-color: #c1cfd8 " method="post" action="proses_dosen.php?proses=insert">
      
        <!-- NIM -->
      <div class="mb-3">
        <label for="nip" class="form-label mt-3">NIP</label>
    
        <input type="text" class="form-control" id="nip" name="nip" required>
      </div>

      <!-- Nama lengkap -->
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Dosen</label>
        <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
        
      </div>

      <div class="mb-3">
        <label for="prodi" class="form-label">Prodi</label>
       <select name="prodi_id" class="form-select">
       <option value="">--pilih prodi--</option>
       <?php
       include 'koneksi.php' ;
       $prodi=mysqli_query($db,"select * from prodi");
       while ($data_prodi=mysqli_fetch_array($prodi)){
        echo "<option value=".$data_prodi['id'].">".$data_prodi
        ['nama_prodi']."</option>";
       }
       
       ?>



       </select>
        
      </div>

       <!-- Email -->
       <div class="mb-3">
        <label for="notelp" class="form-label">Notelp</label>
        <input type="text" class="form-control" id="notelp" name="notelp" required>
      </div>



    

      <!-- Alamat -->
      <div class="mb-3">
        <label class="form-label">Alamat</label>
        <textarea name="alamat" class="form-control" rows="3"></textarea>
      </div>
      
      <!-- Tombol Submit -->
      <button type="submit" class="btn btn-primary mb-3" name="submit">Simpan</button>
      <button type="reset" class="btn btn-danger mb-3">Reset</button>
    </form>
    

    <?php
    break;

    case 'edit' :

      include 'koneksi.php';

    $ambil_dosen = mysqli_query($db,"select * from dosen where id
     ='$_GET[id_edit]'");
    $data_dosen = mysqli_fetch_array($ambil_dosen);

      ?>
      
      <h2 class="alert alert-primary text-center mt-3" style="background-color: #0050ab; margin-bottom: 0; color:aliceblue">Edit Data Dosen</h2>

<form class="mt-0" style="padding-left: 50px; padding-right: 150px; background-color: #c1cfd8" method="post" action="proses_dosen.php?proses=update">
  
    <!-- NIP -->
  <div class="mb-3">
    <label for="nip" class="form-label mt-3">NIP</label>
        <input type="hidden" name="id_edit" class="form-control" value="<?=$data_dosen['id']?>">
    <input type="text" class="form-control" id="nip" name="nip" required
    value="<?= $data_dosen['nip']?>" readonly>

  </div>

  <!-- Nama lengkap -->
  <div class="mb-3">
    <label for="nama" class="form-label">Nama Dosen</label>
    <input type="text" class="form-control" id="nama_dosen" name="nama_dosen" required
     value="<?= $data_dosen['nama_dosen']?>">
  </div>

  <!-- Email -->
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required
     value="<?= $data_dosen['email']?>">
  </div>


  
  <div class="mb-3">
        <label for="prodi" class="form-label">Prodi</label>
       <select name="prodi_id" class="form-select">
       <option value="">--pilih prodi--</option>
       <?php
       include 'koneksi.php' ;
       $prodi=mysqli_query($db,"select * from prodi");
       while ($data_prodi=mysqli_fetch_array($prodi)){
        
        $selected=($data_prodi['id']==$data_dosen['prodi_id']) ? 'selected' : '';
        echo "<option ".$selected." value=".$data_prodi['id']." >".$data_prodi
        ['nama_prodi']."</option>";
       }
       
       ?>



       </select>
        
      </div>


      
       <!-- Email -->
       <div class="mb-3">
        <label for="notelp" class="form-label">Notelp</label>
        <input type="text" class="form-control" id="notelp" name="notelp" required
          value="<?= $data_dosen['notelp']?>">
      </div>

 



  <!-- Alamat -->
  <div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" rows="3" ><?= $data_dosen['alamat']?></textarea></textarea>
  </div>
  
  <!-- Tombol Submit -->
  <button type="submit" class="btn btn-primary mb-3" name="submit">Update</button>
  <button type="reset" class="btn btn-danger mb-3">Reset</button>
</form>

   
      <?php

      break;


}

?>
  




  




