
<?php 

$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';



switch ($aksi) {
  case 'list':
   
    ?>
     
     <h2>Daftar mahasiswa</h2>

<a href="index.php?p=mhs&aksi=tambah" class="btn btn-primary mb-3">Tambah Mahasiswa</a>

<table class="table table-bordered table-hover">
<tr class="table-danger">
<th>No</th>
<th>Nim</th>
<th>Nama</th>
<th>Email</th>
<th width="100px">Tgl lahir</th>
<th>Jk</th>
<th>Hobi</th>
<th>Alamat</th>
<th width="150px">Aksi</th>
</tr>

<?php
include 'koneksi.php';
$ambil = mysqli_query($db,"select * from mahasiswa");
$no=1;

//fetc_array memproses query dan hasilnya disimpan dalam array
while ($data = mysqli_fetch_array($ambil)) {       
?>

<tr>
 <td><?= $no ?></td>
 <td><?= $data['nim']?></td>
 <td><?= $data[1]?></td>
 <td><?= $data[2]?></td>
 <td><?= $data[3]?></td>
 <td><?= $data[4]?></td>
 <td><?= $data[5]?></td>
 <td><?= $data[6]?></td>
<td>

<!-- jika ada lebih dari satu parameter tambahkan & -->
    <a href="index.php?p=mhs&aksi=edit&id_edit=<?=$data['nim']?>"
     class="btn btn-warning">Edit</a>

    <a href="proses_mahasiswa.php?proses=delete&id_hapus=<?= $data['nim']?>"
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

    <form class="mt-0" style="padding-left: 50px; padding-right: 150px; background-color: #c1cfd8 " method="post" action="proses_mahasiswa.php?proses=insert">
      
        <!-- NIM -->
      <div class="mb-3">
        <label for="nim" class="form-label mt-3">NIM</label>
        <input type="text" class="form-control" id="nim" name="nim" required>
      </div>

      <!-- Nama lengkap -->
      <div class="mb-3">
        <label for="nama" class="form-label">Nama lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama" required>
      </div>

      <!-- Email -->
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <!-- Tanggal Lahir -->
      <div class="col-sm-10 d-flex mb-3">
        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>

        <select name="tgl" class="form-select me-2" required>
          <option value="">-DD-</option>
          <?php
          for ($i=1; $i<=31; $i++){
              echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
        <select name="bln" class="form-select me-2" required>
        <option value="">-MM-</option>
          <?php
          for ($i=1; $i<=12; $i++){
              echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
        <select name="thn" class="form-select me-2" required>
        <option value="">-YY-</option>
          <?php
          for ($i=date('Y'); $i>=1970; $i--){
              echo "<option value='$i'>$i</option>";
          }
          ?>
        </select>
      </div>

      <!-- Jenis Kelamin -->
      <div class="mb-3">
        <label for="exampleInputjk" class="form-label ">Jenis Kelamin</label>
        <div class="form-check  form-check-inline" style="margin-left: 2rem;">
          <input class="form-check-input" type="radio" name="jenis_kelamin" value="L" id="flexRadioDefault1" checked>
          <label class="form-check-label" for="flexRadioDefault1">
            Laki-Laki
          </label>
        </div>
        <div class="form-check  form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" id="flexRadioDefault2">
          <label class="form-check-label" for="flexRadioDefault2">
            Perempuan
          </label>
        </div>
      </div>

      <!-- Hobby -->
      <div class="mb-3">
        <label for="checked" class="form-label">Hobby</label>
        <div class="d-flex">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Berenang" id="flexCheckDefault" name="hobby[]">
            <label class="form-check-label" for="flexCheckDefault">Berenang</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Menyanyi" id="flexCheckChecked1" name="hobby[]">
            <label class="form-check-label" for="flexCheckChecked1">Menyanyi</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Memasak" id="flexCheckChecked2" name="hobby[]">
            <label class="form-check-label" for="flexCheckChecked2">Memasak</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Ngoding" id="flexCheckChecked3" name="hobby[]">
            <label class="form-check-label" for="flexCheckChecked3">Ngoding</label>
          </div>
        </div>
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

    $ambil_mhs = mysqli_query($db,"select * from mahasiswa where nim
     ='$_GET[id_edit]'");
    $data_mhs = mysqli_fetch_array($ambil_mhs);

    $tgl=explode("-",$data_mhs['tgl_lahir']);
    $selected_hobbies = explode(',', $data_mhs['hobby']); 

      ?>
      
      
    
      <h2 class="alert alert-primary text-center mt-3" style="background-color: #0050ab; margin-bottom: 0; color:aliceblue">Edit Data Mahasiswa</h2>

<form class="mt-0" style="padding-left: 50px; padding-right: 150px; background-color: #c1cfd8" method="post" action="proses_mahasiswa.php?proses=update">
  
    <!-- NIM -->
  <div class="mb-3">
    <label for="nim" class="form-label mt-3">NIM</label>
    <input type="text" class="form-control" id="nim" name="nim" required
    value="<?= $data_mhs['nim']?>" readonly>

  </div>

  <!-- Nama lengkap -->
  <div class="mb-3">
    <label for="nama" class="form-label">Nama lengkap</label>
    <input type="text" class="form-control" id="nama" name="nama" required
     value="<?= $data_mhs['nama']?>">
  </div>

  <!-- Email -->
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control" id="email" name="email" required
     value="<?= $data_mhs['email']?>">
  </div>

  <!-- Tanggal Lahir -->
  <div class="col-sm-10 d-flex mb-3">
    <label class="col-sm-2 col-form-label">Tanggal Lahir</label>

    <select name="tgl" class="form-select me-2" required>
      <option value="">-DD-</option>
      <?php
      for ($i=1; $i<=31; $i++){
          
        $selected=($tgl[2]==$i) ? 'selected' : '';
        echo "<option value=" .$i ." $selected>" .$i."</option>";
      }
      ?>
    </select>
    <select name="bln" class="form-select me-2" required>
    <option value="">-MM-</option>
      <?php
      for ($i=1; $i<=12; $i++){

        $selected=($tgl[1]==$i) ? 'selected' : '';
          echo "<option value=" .$i ." $selected>" .$i."</option>";
      }
      ?>
    </select>
    <select name="thn" class="form-select me-2" required>
    <option value="">-YY-</option>
      <?php
      for ($i=date('Y'); $i>=1970; $i--){
          
        $selected=($tgl[0]==$i) ? 'selected' : '';
          echo "<option value=" .$i ." $selected>" .$i."</option>";
      }
      ?>
    </select>
  </div>

  <!-- Jenis Kelamin -->
  <div class="mb-3">
    <label for="exampleInputjk" class="form-label ">Jenis Kelamin</label>
    <div class="form-check  form-check-inline" style="margin-left: 2rem;">
      <input class="form-check-input" type="radio" name="jenis_kelamin" value="L"  <?= ($data_mhs['jk'] == 'L') ? 'checked' : ''; ?> required>

      
      <label class="form-check-label" for="flexRadioDefault1">
        Laki-Laki
      </label>
    </div>
    <div class="form-check  form-check-inline">
      <input class="form-check-input" type="radio" name="jenis_kelamin" value="P" <?= ($data_mhs['jk'] == 'P') ? 'checked' : ''; ?> required>
      <label class="form-check-label" for="flexRadioDefault2">
        Perempuan
      </label>
    </div>
  </div>

  <!-- Hobby -->
  <div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" value="Berenang" id="flexCheckDefault" name="hobby[]" 
<?= in_array("Berenang", $selected_hobbies) ? 'checked' : ''; ?>>
<label class="form-check-label" for="flexCheckDefault">Berenang</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" value="Menyanyi" id="flexCheckChecked1" name="hobby[]" 
<?= in_array("Menyanyi", $selected_hobbies) ? 'checked' : ''; ?>>
<label class="form-check-label" for="flexCheckChecked1">Menyanyi</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" value="Memasak" id="flexCheckChecked2" name="hobby[]" 
<?= in_array("Memasak", $selected_hobbies) ? 'checked' : ''; ?>>
<label class="form-check-label" for="flexCheckChecked2">Memasak</label>
</div>
<div class="form-check form-check-inline">
<input class="form-check-input" type="checkbox" value="Ngoding" id="flexCheckChecked3" name="hobby[]" 
<?= in_array("Ngoding", $selected_hobbies) ? 'checked' : ''; ?>>
<label class="form-check-label" for="flexCheckChecked3">Ngoding</label>
</div>


  <!-- Alamat -->
  <div class="mb-3">
    <label class="form-label">Alamat</label>
    <textarea name="alamat" class="form-control" rows="3" ><?= $data_mhs['alamat']?></textarea></textarea>
  </div>
  
  <!-- Tombol Submit -->
  <button type="submit" class="btn btn-primary mb-3" name="submit">Update</button>
  <button type="reset" class="btn btn-danger mb-3">Reset</button>
</form>

   
      <?php

      break;


}

?>
  




  
 
   

 