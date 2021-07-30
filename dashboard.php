<?php
  session_start();
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  } 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Society Tech</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!--  Header -->

    <header>
          <div class="container">
          <h1>
            <img src="img/logo-lab.png" width="50px" style="margin-bottom: 0px;">
            <a href="dashboard.php">SOCIETY LAB</a></h1>
          <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil Admin</a></li>
                <li><a href="daftar-kategori.php">Daftar Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="logout.php">Logout</a></li>
          </ul>
          </div>
    </header>

   <!--  content -->
   <div class="section">
      <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
                  <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?></h4>
            </div>
      </div>   
   </div>

  <!--  footer -->

  <footer>
        <div class="container">
              <small>Copyright &copy; 2020-SOCIETY LAB</small>
        </div>
  </footer>


</body>
</html>