<?php
  include 'db.php';
   $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
   $a = mysqli_fetch_object($kontak);
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
            <a href="index.php">SOCIETY LAB</a></h1>
          <ul>
                <li><a href="produk.php">Produk</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li><a href="login.php">Login</a></li>
          </ul>
          </div>
    </header>

    <!-- search -->
     

     <!--category-->
     <div class="section">
       <div class="container">
        <h3>Contact Us</h3>
         <div class="box">

          <h4>Alamat</h4>
          <p><?php echo $a->admin_address ?></p>

          <h4>Email</h4>
          <p><?php echo $a->admin_email ?></p>

          <h4>No. Hp</h4>
          <p><?php echo $a->admin_telp ?></p>



         </div>
       </div>
     </div>
     <!--Menu baru-->

     <!--footer-->
     <div class="footer">
       <div class="container">
         <small>Copyright &copy; 2021 - SOCIETY LAB.</small>
       </div>
     </div>
</body>
</html>