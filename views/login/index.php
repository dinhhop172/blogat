<?= isset($_SESSION['login-null']) ? $_SESSION['login-null'] : '' ?>
<?= isset($_SESSION['err-pass']) ? $_SESSION['err-pass'] : '' ?>
<?= isset($_SESSION['err-email']) ? $_SESSION['err-email'] : '' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/admin/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="assets/admin/index2.html" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form action="?c=home&a=sublogin" method="post">
        <div class="input-group mb-3">
          <input type="email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" name="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="rem" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <input type="submit" name="login" class="btn btn-primary btn-block" value="Sign In"/>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="javascript:;">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="javascript:;" id="register" class="text-center">Register a new membership</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<div class="register-box disable">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="javascript:;" class="h1"><b>Admin</b>LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="javascript:;" method="post" id="register-form">
        <div class="errAlert"></div>
        <div class="input-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full name" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" require name="password" id="password" class="form-control" placeholder="Password" required minlength="5">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" require name="repass" id="repassword" class="form-control" placeholder="Retype password" required minlength="5">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div id="passErr" class="text-danger font-weight-bold"></div>
        </div>
        <div class="row">
          <!-- <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" checked disabled=true name="terms" value="agree" >
              <label for="agreeTerms">
              I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div> -->
          <!-- /.col -->
          <div class="col-12">
            <input type="submit" id="register-btn" name="register_sub" class="btn btn-primary btn-block" value="Sign up"/>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="javascrip:;" id="login" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>

<!-- jQuery -->
<script src="assets/admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/admin/dist/js/adminlte.min.js"></script>

<script>
    $(function(){
        // $('.register-box').hide();
        $('.register-box *').hide();
        $('#register').on('click', function(){
            $('.login-box *').hide();
            $('.register-box *').show();
        });
        $('#login').on('click', function(){
            $('.login-box *').show();
            $('.register-box *').hide();
        });
        
        $("#register-btn").on('click', function(e){
          if($("#register-form")[0].checkValidity()){
            e.preventDefault();
            $("#register-btn").val("Please wait...");
            if($("#password").val() != $("#repassword").val()){
              $('#passErr').text("* Mật khẩu không khớp!");
              $("#register-btn").val("Sign up");
            }else{
              $('#passErr').text("");
              console.log("matching");
              $.ajax({
                url: "?a=register",
                method: "post",
                data: $("#register-form").serialize()+"&action=register_sub",
                success: function(response){
                  $("#register-btn").val("Sign up");
                  if(response === 'register'){
                    window.location = '?c=home';
                  }else{
                    $('.errAlert').html(response);
                  }
                }
              })
            }
          }
        })
    })
</script>
</body>
</html>

<?php if(isset($_SESSION['login-null'])){ unset($_SESSION['login-null']) ;} ?>
<?php if(isset($_SESSION['err-pass'])){ unset($_SESSION['err-pass']) ;} ?>
<?php if(isset($_SESSION['err-email'])){ unset($_SESSION['err-email']) ;} ?>
