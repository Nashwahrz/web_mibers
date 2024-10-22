 
  <?php
    if ($_GET['proses'] == 'insert')
    {
        if (isset($_POST['submit'])) {
            include 'koneksi.php';
          
            $sql = "INSERT INTO dosen (nip, nama_dosen, email, prodi_id,notelp, alamat) 
                    VALUES ('$_POST[nip]', '$_POST[nama_dosen]', '$_POST[email]', '$_POST[prodi_id]', '$_POST[notelp]', '$_POST[alamat]')";
      
            if (mysqli_query($db, $sql)) {
      
              //kalau tidak berhasil redirect pakai java script
      
              echo "<script> window.location='index.php?p=dosen'
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
            
            $simpan =mysqli_query($db, "Update  dosen 
                    set  nip='$_POST[nip]', 
                    nama_dosen ='$_POST[nama_dosen]',
                    email ='$_POST[email]',
                    prodi_id = '$_POST[prodi_id]',
                    notelp ='$_POST[notelp]',
                    alamat = '$_POST[alamat]'


                     WHERE id='$_POST[id_edit]'
                    "    
                  );
          
            if ($simpan) {
          
              //kalau tidak berhasil redirect pakai java script
          
              echo "<script> window.location='index.php?p=dosen'
              </script>";
             // header('location:index.php?p=mhs'); //redirect
              //echo "<script>alert('Data berhasil disimpan')</script>";
            } else {
              echo "Error: " . mysqli_error($db);
            }
          }
    }
    if ($_GET['proses'] == 'delete')
    {
        include 'koneksi.php';
        $hapus = mysqli_query($db,"delete from dosen where id='$_GET[id_hapus]'");
        if($hapus){
            header('location:index.php?p=dosen');
        }
      
    }




   
   
    ?>
