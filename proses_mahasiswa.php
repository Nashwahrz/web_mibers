  <!-- Proses penyimpanan data ke database -->
  <?php
    if ($_GET['proses'] == 'insert')
    {
        if (isset($_POST['submit'])) {
            include 'koneksi.php';
            $tgl = $_POST['thn'].'-' .$_POST['bln'].'-' .$_POST['tgl'];
            $hobbies = implode(",", $_POST['hobby']);
            $sql = "INSERT INTO mahasiswa (nim, nama, email, tgl_lahir, jk, hobby, alamat) 
                    VALUES ('$_POST[nim]', '$_POST[nama]', '$_POST[email]', '$tgl', '$_POST[jenis_kelamin]', '$hobbies', '$_POST[alamat]')";
      
            if (mysqli_query($db, $sql)) {
      
              //kalau tidak berhasil redirect pakai java script
      
              echo "<script> window.location='index.php?p=mhs'
              </script>";
             // header('location:index.php?p=mhs'); //redirect
              //echo "<script>alert('Data berhasil disimpan')</script>";
            } else {
              echo "Error: " . mysqli_error($db);
            }
          }
    }

    if ($_GET['proses'] == 'update')
    {
        if (isset($_POST['submit'])) {
            include 'koneksi.php';
            $tgl = $_POST['thn'].'-' .$_POST['bln'].'-' .$_POST['tgl'];
            $hobbies = implode(",", $_POST['hobby']);
            $sql =  "UPDATE mahasiswa 
            SET nim='$_POST[nim]', 
                nama='$_POST[nama]', 
                email='$_POST[email]', 
                tgl_lahir='$tgl', 
                jk='$_POST[jenis_kelamin]', 
                hobby='$hobbies', 
                alamat='$_POST[alamat]' 
            WHERE nim='$_POST[nim]'";
      
            if (mysqli_query($db, $sql)) {
      
              //kalau tidak berhasil redirect pakai java script
      
              echo "<script>
               alert('Data berhasil diedit');
              window.location='index.php?p=mhs'</script>";
             // header('location:list_mahasiswa.php'); //redirect
              //echo "<script>alert('Data berhasil disimpan')</script>";
            } else {
              echo "Error: " . mysqli_error($db);
            }
          }
    }
    if ($_GET['proses'] == 'delete')
    {
        
        include 'koneksi.php';
        $hapus = mysqli_query($db,"delete from mahasiswa where nim='$_GET[id_hapus]'");
        if($hapus){
            header('location:index.php?p=mhs');
        }
    }




   
   
    ?>
