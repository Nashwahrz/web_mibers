<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APP MI-DEPARTMENT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg  mb-5" style="background-color: #90acc5;">
  <div class="container-fluid">
    <img src="img/ti-removebg-preview.png " alt="" width="50px">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 " style="font-size: 20px;">

        <li class="nav-item ms-3">
          <a class="nav-link active" aria-current="page" href="index.php?p=home">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="index.php?p=mhs">Mahasiswa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=prodi">Prodi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?p=dosen">Dosen</a>
        </li>
        

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>


<div class="container ">
     
   <?php   

   //kita cek kalau parameter p sudah ada maka nilainya p kalau belum nilainya home
    $page = isset($_GET['p']) ? $_GET['p'] : 'home';
    if($page=='home') include 'home.php';
    if($page== 'mhs') include 'mahasiswa.php';
   // if($page== 'create_mhs') include '_regis_mahasiswa.php';
   // if($page== 'edit_mhs') include 'edit_mahasiswa.php';


    if($page=='prodi') include 'prodi.php';
    //if($page== 'create_prodi') include '_tambah_prodi.php';
    //if($page== 'edit_prodi') include 'edit_prodi.php';
    

    if($page=='dosen') include 'dosen.php';
    if($page=='create_dosen') include '_tambah_dosen.php';
    if($page== 'edit_dosen') include 'edit_dosen.php';
    


   ?>
    


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>