<?php

if ($_GET['proses'] == 'insert'){
    if (isset($_POST['submit'])) {
        include 'koneksi.php';
        
        $simpan =mysqli_query($db, "INSERT INTO prodi (nama_prodi,jenjang_studi) 
                VALUES ('$_POST[nama_prodi]', '$_POST[jenjang_studi]')");
      
        if ($simpan) {
      
          //kalau tidak berhasil redirect pakai java script
      
          echo "<script> window.location='index.php?p=prodi'
          </script>";
         // header('location:index.php?p=mhs'); //redirect
          //echo "<script>alert('Data berhasil disimpan')</script>";
        } else {
          echo "Error: " . mysqli_error($db);
        }
      }
}


if ($_GET['proses'] == 'update'){
    if (isset($_POST['submit'])) {
        include 'koneksi.php';
        
        $simpan =mysqli_query($db, "Update  prodi 
                set  nama_prodi='$_POST[nama_prodi]', 
                jenjang_studi='$_POST[jenjang_studi]'
                 WHERE id='$_GET[id_edt]'
                "    
              );
      
        if ($simpan) {
      
          //kalau tidak berhasil redirect pakai java script
      
          echo "<script> window.location='index.php?p=prodi'
          </script>";
         // header('location:index.php?p=mhs'); //redirect
          //echo "<script>alert('Data berhasil disimpan')</script>";
        } else {
          echo "Error: " . mysqli_error($db);
        }
      }
}

if ($_GET['proses'] == 'delete'){

    include 'koneksi.php';
        $hapus = mysqli_query($db,"delete from prodi where id='$_GET[id_hapus]'");
        if($hapus){
            header('location:index.php?p=prodi');
        }

}




    