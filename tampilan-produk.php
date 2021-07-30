<?php
error_reporting(0);
include 'db.php'; 
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
          </ul>
          </div>
    </header>

    <!-- search -->
     <div class="search">
      <div class="container">
        <form action="produk.php">
          <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
          <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
          <input type="submit" name="cari" value="Cari Produk">
        </form>
      </div>
     </div>

     
    
     <!--Menu baru-->

     <div class="section">
       <div class="container">
        <h3>Produk</h3>
         <div class="box">
          <?php
         
          if($_GET['search'] !='' || $_GET['kat'] != ''){
            $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_id LIKE '%".$_GET['kat']."%' ";
          }

            $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
            if(mysqli_num_rows($produk) > 0){ 
              while($p = mysqli_fetch_array($produk)){
          ?>
           <a href="?id=<?php echo $p['product_id'] ?>">
           <div class="col-1">
             <img src="menu/<?php echo $p['product_image'] ?>">
             <p class="nama"><?php echo $p['product_name']; ?></p>
             <p class="harga"><?php echo $p['product_price'] ?></p>
           </div>
         </a>
         <?php }}else{ ?>
              <p>Produk Tidak Ada</p>
         <?php } ?>
         </div>
       </div>
     </div>
     <!--footer-->
     <div class="footer">
       <div class="container">
         <small>Copyright &copy; 2021 - SOCIETY LAB.</small>
       </div>
     </div>
</body>
</html>