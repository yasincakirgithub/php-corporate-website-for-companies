<?php 

     include '../../Layout/header.php';

?>



<body class="hold-transition register-page">
    
 <?php
    require('../../Database/db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $full_name    = stripslashes($_REQUEST['full_name']);
        $full_name    = mysqli_real_escape_string($con, $full_name);
        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);
        $gsm    = stripslashes($_REQUEST['gsm']);
        $gsm    = mysqli_real_escape_string($con, $gsm);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $address = stripslashes($_REQUEST['address']);
        $address = mysqli_real_escape_string($con, $address);
        $re_password = stripslashes($_REQUEST['re_password']);
        $re_password = mysqli_real_escape_string($con, $re_password);
        $create_datetime = date("Y-m-d H:i:s");
        
        $query    = "INSERT into `members` (username, password,full_name,gsm,address, email, date)
                     VALUES ('$username', '" . md5($password) . "','$full_name','$gsm','$address', '$email', '$create_datetime')";
        $result   = mysqli_query($con, $query);
        
        
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='register.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    
    
<div class="register-box">
  <div class="register-logo">
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Üyelik Bilgilerinizi Giriniz...</p>

      <form action="" method="post">
          
          <div class="input-group mb-3">
          <input type="text" class="form-control"  placeholder="Kullanıcı Adı" name="username" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>  
            
        <div class="input-group mb-3">
          <input  type="text" class="form-control" placeholder="İsim Soyisim" name="full_name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
          
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
          
         <div class="input-group mb-3">
          <input type="gsm" class="form-control" placeholder="Gsm" name="gsm" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div> 
          
        <div class="input-group mb-3">
          <input type="gsm" class="form-control" placeholder="Address" name="address" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-address-card"></span>
            </div>
          </div>
        </div>    
          
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Şifre" name="password"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  placeholder="Şifre Onayı" name="re_password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Kayıt Ol</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="login.php" class="text-center">Bir Üyeliğim Var</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
 

    <?php
    }
?>   
 
         



    
<?php 

 include '../../Layout/footer.php';

?> 