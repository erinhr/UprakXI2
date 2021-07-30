<?php
  session_start();
  include 'db.php';
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
            <h3>Data Produk</h3>
            <div class="box">
              <p><a href="tambah-produk.php">Tambah Produk</a></p>
                 <table border="1" cellspacing="0" class="table">
                    <thead>
                      <tr>
                        <th width="60px">No</th>
                        <th>Daftar</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th width="150px">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                          $no = 1;
                          $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id)ORDER BY product_id DESC");
                          if(mysqli_num_rows($produk) > 0){
                          while($row = mysqli_fetch_array($produk)){ 
                        ?>
                      <tr>
                        <td><?php echo $no++  ?></td>
                        <td><?php echo $row['category_name']  ?></td>
                        <td><?php echo $row['product_name']  ?></td>
                        <td>Rp. <?php echo number_format( $row['product_price']) ?></td>
                        <td><img src="produk/<?php echo $row['product_image']  ?>" width="80px"></td>
                        <td><?php echo ($row['product_status'] == 0)? 'Tidak Tersedia':'Masih Tesedia'; ?></td>
                        <td>
                          <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="proses-hapus.php?idm=<?php echo $row['product_id'] ?>" onclick="return confirm('Hapus Produk Ini.?')">Hapus</a>
                        </td>
                      </tr>
                    <?php }}else{ ?>
                      <tr>
                        <td colspan="7">Tidak Ada Produk</td>
                      </tr>
                    <?php } ?>
                    </tbody>
                 </table>
            </div>
      </div>   
   </div>

  <!--  footer -->

  <footer>
        <div class="container">
              <small>Copyright &copy; 2021-SOCIETY LAB</small>
        </div>
  </footer>


</body>
</html>