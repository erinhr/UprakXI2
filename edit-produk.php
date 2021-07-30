<?php
  session_start();
  include 'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  } 

  $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
  if(mysqli_num_rows($produk) == 0){
     echo '<script>window.location="data-produk.php"</script>';
  }
  $p = mysqli_fetch_object($produk);
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
            <h3>Edit Beberapa Produk</h3>
            <div class="box">
                  <form action="" method="POST" enctype="multipart/form-data">
                    <select class="input-control" name="produk">
                    <option value="">--Pilih--</option>
                    <?php
                      $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                      while($r = mysqli_fetch_array($kategori)){ 
                    ?>
                    <option value="<?php echo $r['category_id'] ?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected': ''; ?>><?php echo $r['category_name'] ?></option>
                    <?php } ?>

                    <input type="text" name="nama" class="input-control" placeholder="Nama Kategori" value="<?php echo $p->product_name ?>"  required>
                    <input type="text" name="harga" class="input-control" placeholder="Harga Produk" value="<?php echo $p->product_price ?>" required>

                    <img src="produk/<?php echo $p->product_image ?>">
                    <input type="hidden" name="gambar" value="<?php echo $p->product_image ?>">
                    <input type="file" name="gambar" class="input-control">
                    <textarea class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p->product_description ?></textarea>
                    <select class="input-control" name="status">
                         <option value="">--Pilih--</option>
                         <option value="1" <?php echo($p->product_status == 1)? 'selected': ''; ?>>--Masih tersidia--</option>
                         <option value="0" <?php echo($p->product_status == 0)? 'selected': ''; ?>>--Tidak Tersedia--</option>
                    </select>
                    <input type="submit" name="submit" value="Submit" class="btn">
                  </form>
                    <?php
                     if(isset($_POST['submit'])){
                           
                           //data inputan dari form
                            $kategori   = $_POST['produk'];
                            $nama       = $_POST['nama'];
                            $harga      = $_POST['harga'];
                            $deskripsi  = $_POST['deskripsi'];
                            $status     = $_POST['status'];
                            $foto       = $_POST['gambar'];

                           //data gambar baru

                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                           //jika admin ganti gambar
                           if($filename != ''){
                             $type1 = explode('.', $filename);
                             $type2 = $type1[1];

                            //menampung format file yang diizinkan
                            $diizinkan = array('jpeg', 'jpg', 'png', 'jfif');


                             if(!in_array($type2, $diizinkan)){

                                echo '<script>alert("Format file tidak diizinkan")</script>';

                            }else{
                               unlink('./produk/' .$foto);
                               move_uploaded_file($tmp_name, './produk/' .$filename);
                               $namagambar = $filename;

                            }

                           }else{

                            //jika admin tidak ganti gambar
                            $namagambar = $foto;

                           }

                            //query update menu

                           $update = mysqli_query($conn, "UPDATE tb_product SET 
                                                   category_id         = '".$kategori."',
                                                   product_name       = '".$nama."',
                                                   product_price      = '".$harga."',
                                                   product_description = '".$deskripsi."',
                                                   product_image       = '".$namagambar."',
                                                   product_status      = '".$status."'
                                                   WHERE product_id = '".$p->product_id."'  ");

                            if($update){
                                echo '<script>alert("Ubah produk berhasil")</script>';
                                echo '<script>window.location="data-produk.php"</script>';
                            }else{
                                echo 'gagal' .mysqli_error($conn);
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