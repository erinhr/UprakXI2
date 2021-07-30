<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/stylelogin.css">
    <title> Sign in </title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form action=""  method="POST" class="sign-in-form">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" name="pass" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" name="user" placeholder="Password" />
            </div>
            <input type="submit" name ="submit" placeholder="Login" class="btn solid" />
            <p class="social-text">Welcome To Society Lab</p>
          </form>

         <?php 
            if(isset($_POST['submit'])){
              include 'db.php';
              session_start();

              $user = $_POST['user'];
              $pass = $_POST['pass'];

              $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
              if(mysqli_num_rows($cek) > 0){
                $d =mysqli_fetch_object($cek);
                $_SESSION['status_login'] = true;
                $_SESSION['a_global'] = $d;
                $_SESSION['id'] = $d->admin_id;
                echo '<script>window.location="dashboard.php"</script>';
              }else{
                echo '<script>alert("Username atau password Anda salah!")</script';
              }
              
            }
    ?>

    <script src="app.js"></script> 
  </body>
</html>


