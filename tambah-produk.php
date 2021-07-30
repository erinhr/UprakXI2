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
                <li><a href="daftar-kategori.php">Daftar Kategori</a></li>
                <li><a href="data-produk.php">Data Produk</a></li>
                <li><a href="logout.php">Logout</a></li>
          </ul>
          </div>
    </header>

   <!--  content -->
   <div class="section">
      <div class="container">
            <h3>Tambah Beberapa Produk</h3>
            <div class="box">
                  <form action="" method="POST" enctype="multipart/form-data">
                  <select class="input-control" name="kategori">
                    <option value="">--Pilih--</option>
                    <?php
                      $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                      while($r = mysqli_fetch_array($kategori)){ 
                    ?>
                    <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                    <?php } ?>
                  </select>
                  
                    <input type="text" name="nama" class="input-control" placeholder="Nama Produk" required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga Produk" required>
                    <input type="file" name="gambar" class="input-control" required>
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"></textarea>
                    <select class="input-control" name="status">
                         <option value="">--Pilih--</option>
                         <option value="1">--Masih Tersedia--</option>
                         <option value="0">--Tidak Tersedia--</option>
                    <input type="submit" name="submit" value="Submit" class="btn">
                  </form>
                    <?php
                     if(isset($_POST['submit'])){
                            
                           
                            //menampung inputan dari form
                            $kategori   = $_POST['kategori'];
                            $nama       = $_POST['nama'];
                            $harga      = $_POST['harga'];
                            $deskripsi  = $_POST['deskripsi'];
                            $status     = $_POST['status'];


                            //menampung data file yang diupload
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                           $type1 = explode('.', $filename);
                           $type2 = $type1[1];

                            //menampung format file yang diizinkan
                            $diizinkan = array('jpeg', 'jpg', 'png', 'jfif');

                            //validasi format file
                            if(!in_array($type2, $diizinkan)){

                                echo '<script>alert("Format file tidak diizinkan")</script>';

                            }else{
                               //proses upload file & insert db
                              move_uploaded_file($tmp_name, './produk/' .$filename);

                              $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (null, '".$kategori."',  
                                                                                                  '".$nama."',
                                                                                                  '".$harga."',
                                                                                                  '".$deskripsi."',
                                                                                                  '".$filename."',
                                                                                                  '".$status."',
                                                                                                  null
                                          

                                                                                                 ) ");
                              if($insert){
                                echo '<script>alert("Menambahkan Produk berhasil")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                              }else{
                                echo 'gagal' .mysqli_error($conn);
                              }
                            }

                           

                       
                     }  
                    ?>
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