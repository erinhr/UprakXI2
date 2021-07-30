<?php

   include 'db.php';
   if(isset($_GET['idk'])){
   	$delete = mysqli_query($conn, "DELETE FROM tb_category WHERE category_id = '".$_GET['idk']."' ");
   	echo '<script>window.location="daftar-kategori.php"</script>';
   }

   if(isset($_GET['idm'])){
   	$produk = mysqli_query($conn, "SELECT product_image FROM tb_product WHERE product_id = '".$_GET['idm']."' ");
   	$p = mysqli_fetch_object($produk);

     unlink('./produk/' .$p->product_image);

   	$delete = mysqli_query($conn, "DELETE FROM tb_product WHERE product_id = '".$_GET['idm']."' ");
   	echo '<script>window.location="data-produk.php"</script>';
   }
?>