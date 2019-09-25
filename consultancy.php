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
  <title>Consultancy | <?php echo $SystemName; ?> </title>
  <style>
  .our-plans {
    width: 100%;
  }

  .our-plans .price-plan {
    width: 100%;
    padding: 20px;
    background: #fff;
    border: 1px solid #eaeaea;
    margin-bottom: 20px;
  }

  .our-plans .price-plan:last-child {
    margin-bottom: 0;
  }

  .our-plans .price-plan .plan-details,
  .our-plans .price-plan .plan-features,
  .our-plans .price-plan .accept-plan {
    float: left;
    padding: 0 10px;
  }

  .our-plans .price-plan .plan-details {
    width: 25%;
  }

  .our-plans .price-plan .plan-features {
    width: 55%;
  }

  .our-plans .price-plan .accept-plan {
    width: 20%;
  }

  .our-plans .price-plan .plan-details h2 {
    display: block;
    font-size: 24px;
    line-height: 30px;
    font-weight: 700;
    padding: 20px 0;
    color: #252a37;
    margin-bottom: 0;
  }

  .our-plans .price-plan .plan-details h3 {
    font-size: 34px;
    padding: 0 0;
    position: relative;
    color: #252a37;
    margin: 0 0 25px;
  }

  .our-plans .price-plan .plan-details h3 sub {
    font-size: 20px;
    left: -0.6em;
    position: relative;
  }

  .our-plans .price-plan .plan-details h3 sup {
    top: -0.9em;
    font-size: 50%;
    left: -0.01em;
    font-weight: 700;
  }

  /* plan features */
  .our-plans .price-plan .plan-features ul {
    list-style: none;
  }

  .our-plans .price-plan .plan-features ul li {
    position: relative;
    padding-left: 30px;
    margin-bottom: 4px;
  }

  .our-plans .price-plan .plan-features ul li:before {
    content: "\f00c";
    font-family: FontAwesome;
    font-style: normal;
    font-weight: normal;
    text-decoration: inherit;
    /*--adjust as necessary--*/
    color: #2154cf;
    font-size: 18px;
    padding-right: 0.5em;
    position: absolute;
    top: 0px;
    left: 0;
  }

  /* plan details ends here */
  .our-plans .price-plan .accept-plan {
    text-align: center;
  }

  .our-plans .price-plan .accept-plan a {
    text-align: center;
    padding: 5px 20px;
    background-color: #2154cf;
    color: #fff;
    border-radius: 27px;
    margin-top: 20%;
    display: inline-block;
  }

  .our-plans .price-plan .accept-plan a:hover {
    background: #272d33;
  }
  </style>
</head>

<body>
  <?php include 'inc/header.php'; ?>
  <!-- Prcing plan starts here -->

  <section class="our-plans">
    <div class="container">
      <h1>Consultancy</h1>
      <div class="row text-center">
        <div class="col-md-12">
          <h2 class="">Types of Consultancy We Offer</h2>
        </div>
      </div>
      <!-- PLANS STARTS -->
      <div class="row mrt-40">
        <?php
        $results = $common -> GetRows("SELECT * FROM tbl_consultancy");
        foreach($results as $row){
          $id = $row['id'];
          $title = $row['title'];
          $description = $row['description'];
          ?>
        <div class="price-plan">
          <div class="plan-details">
            <h2><?php echo $title;  ?></h2>
          </div>
          <div class="plan-features">
            <p><?php echo $description; ?></p>
          </div>
          <div class="accept-plan">
            <a target="_self" href="#">Apply Now</a>
          </div>
        </div>
        <?php
        }
      ?>
      </div>
      <!-- Plans ends -->
      <div class="custom-section-margin-top"></div>
    </div>
  </section>
  <!-- pricing plans ends here -->
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