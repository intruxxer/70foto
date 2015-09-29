<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="keywords" content="" />
  <title>Kapsul Waktu 2015 | Login</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/signin.css') ?>">
  <script src="<?php echo base_url('assets/js/core/jquery.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/js/core/bootstrap.min.js') ?>"></script>
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>

      <div class="">
        <div class="row">
        <form class="form-signin" method="post" action="<?php echo site_url('login/checklogin'); ?>">
            <h4 class="form-signin-heading text-center">Kapsul Waktu 2015<br/>Photo Management System</h4>
            <label for="" class="sr-only">Username</label>
            <input type="text" name="username" class="form-control" placeholder="" required="" autofocus="">
            <label for="" class="sr-only">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" required="">
            <div class="text-center">
            <?php echo $this->session->userdata('login_msg'); $this->session->set_userdata('login_msg', ''); ?>
            </div>
            <div>&nbsp;</div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </form>
        </div>
        <div class="footer-links row">
          <div class="col-xs-12 text-center">
            Copyright © 2015
          </div>
          <div class="col-xs-12 text-center">
            <a href="<?php echo site_url(); ?>" target="_blank">PT Biline Aplikasi Digital. </a>
          </div>
          <div class="col-xs-12 text-center">
            All rights reserved.
          </div>
        </div>
      </div>

  </body>
</html>
