<?php
  error_reporting(0);
	session_start();
	header('Cache-control: private');
	header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
	include_once('sys/core/init.inc.php');
  $common = new common();
  include_once('env-variables.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/custom.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <title>Register Individual | <?php echo $SystemName; ?> </title>
  <style>
  .help-block {
    color: red;
    text-align: left !important;
    font-size: 12px;
  }

  .form-heading {
    color: #fff;
    font-size: 23px;
  }

  .panel h2 {
    color: #444444;
    font-size: 18px;
    margin: 0 0 8px 0;
  }

  .panel p {
    color: #777777;
    font-size: 14px;
    margin-bottom: 30px;
    line-height: 24px;
  }

  .login-form .form-control {
    background: #f7f7f7 none repeat scroll 0 0;
    border: 1px solid #d4d4d4;
    border-radius: 4px;
    font-size: 14px;
    height: 50px;
    line-height: 50px;
  }

  .main-div {
    background: #ffffff none repeat scroll 0 0;
    border-radius: 2px;
    margin: 10px auto 30px;
    max-width: 50%;
    padding: 50px 70px 70px 71px;
  }

  .login-form .form-group {
    margin-bottom: 10px;
  }

  .forgot a {
    color: #777777;
    font-size: 14px;
    text-decoration: underline;
  }

  .login-form .btn.btn-primary {
    background: #f0ad4e none repeat scroll 0 0;
    border-color: #f0ad4e;
    color: #ffffff;
    font-size: 14px;
    width: 100%;
    height: 50px;
    line-height: 50px;
    padding: 0;
  }

  .forgot {
    text-align: left;
    margin-bottom: 30px;
  }

  .botto-text {
    color: #ffffff;
    font-size: 14px;
    margin: auto;
  }

  .login-form .btn.btn-primary.reset {
    background: #ff9900 none repeat scroll 0 0;
  }

  .back {
    text-align: left;
    margin-top: 10px;
  }

  .back a {
    color: #444444;
    font-size: 13px;
    text-decoration: none;
  }
  </style>
</head>

<body>
  <?php include 'inc/header.php'; ?>
  <div class="container">
    <div class="login-form custom-section-margin-top">
      <div class="main-div">
        <div class="panel">
          <h2>Register as an individual</h2>
        </div>
        <br>
        <form method="post" id="form">
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
              <span class="help-block" id="error"></span>
            </div>
            <div class="form-group col-md-6">
              <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
              <span class="help-block" id="error"></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
              <span class="help-block" id="error"></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="number" class="form-control" id="idNumber" name="idNumber" placeholder="ID Number">
              <span class="help-block" id="error"></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-12">
              <input type="number" class="form-control" id="phoneNumber" name="phoneNumber" placeholder="Phone Number">
              <span class="help-block" id="error"></span>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password">
              <span class="help-block" id="error"></span>
            </div>
            <div class="form-group col-md-6">
              <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                placeholder="Confirm Password">
              <span class="help-block" id="error"></span>
            </div>
          </div>
          <button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary">Register</button>
        </form>
      </div>
      <a href="">
        Register as Organization instead?
      </a>
    </div>
    <br>
  </div>
  </div>


  <?php include 'inc/footer.php'; ?>

  <!-- JS  -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="assets/js/jquery-validate.js"></script>
  <script type="text/javascript" src="ajax-js/signup-individual.js"></script>

</body>

</html>