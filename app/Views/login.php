<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>fonts-login/icomoon/style.css">

    <link rel="stylesheet" href="<?= base_url() ?>css-login/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>css-login/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="<?= base_url() ?>css-login/style.css">

    <!-- Favicon -->
    <link rel="icon" href="<?= base_url() ?>img/laundry-icon.png" type="image/png">

    <title>Clean Laundry - Login</title>
  </head>
  <body>
  
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <img src="<?= base_url() ?>img/undraw_remotely_2j6y.svg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>Clean Laundry</h3>
              <p class="mb-4">Login Aplikasi Sistem Informasi Clean Laundry</p>
            </div>
            <form action="<?= base_url('login') ?>" method="post">

            <?php
              if (session()->has('msg')) { ?>
                <div class="alert alert-danger" id="msg">
                  <?= session('msg') ?>
                </div>

                <script>
                  setTimeout(function() {
                    document.getElementById('msg').style.display = 'none'
                  }, 2000);
                </script>
              <?php }
            ?>

              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" name="username">
              </div>

              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password">
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>
  
    <script src="<?= base_url() ?>js-login/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url() ?>js-login/popper.min.js"></script>
    <script src="<?= base_url() ?>js-login/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>js-login/main.js"></script>
  </body>
</html>