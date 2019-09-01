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
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css"
    integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
  <link rel="stylesheet" href="assets/css/custom.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <style>
  .custom-btn-search {
    padding-left: 30px !important;
    padding-right: 30px !important;
  }

  .form-control-borderless {
    border: none;
    border-radius: 0px !important;
    height: 70px;
  }

  .form-control-borderless:hover,
  .form-control-borderless:active,
  .form-control-borderless:focus {
    border: none;
    outline: none;
    box-shadow: none;
  }

  .help-block {
    padding: 2px;
    color: red;
    font-size: 12px;
  }
  </style>
  <title>Courses | <?php echo $SystemName; ?> </title>
</head>

<body>
  <?php include 'inc/header.php'; ?>

  <section class="container custom-section-margin-top">
    <h1>Individual Solutions</h1>
    <div class="row">
      <div class="col-12">
        <form method="post" id="search-courses-form">
          <div id="errorDiv">
            <!-- error will be shown here ! -->
          </div>
          <div class="card-body row no-gutters align-items-center">
            <div class="col-lg-12">
              <div class="row">
                <div class="form-group col-lg-6 col-md-6 col-sm-12 p-0">
                  <input type="text" name="search" id="search" class="form-control search-slt form-control-borderless"
                    placeholder="Search">
                  <span class="help-block" id="error"></span>
                </div>
                <div class="form-group col-lg-3 col-md-3 col-sm-12 p-0">
                  <select class="form-control search-slt form-control-borderless" name="sortBy" id="sortBy">
                    <option value="">Sort By</option>
                    <option value="Popularity">Popularity</option>
                    <option value="Latest">Latest</option>
                    <option value="Price">Price</option>
                  </select>
                  <span class="help-block" id="error"></span>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 p-0">
                  <button type="submit" name="search-courses" id="search-courses"
                    class="btn btn-success wrn-btn form-control-borderless custom-btn-search">Search</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!--end of col-->
    </div>

    <div class="card-columns" id="search-results">

    </div>
  </section>

  <?php include 'inc/footer.php'; ?>

  <!-- JS  -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>

  <script type="text/javascript" src="assets/js/jquery-validate.js"></script>
  <script type="text/javascript" src="ajax-js/search-courses.js"></script>
  <script>
  $(window).on("load", function() {
    $.ajax({
      type: 'GET',
      url: 'ajax/search-courses-ajax.php',
      data: $("#search-courses-form").serialize(),
      dataType: "json",

      success: function(data) {
        $("#search-results").html(data.output);
      }
    });
  });
  </script>
</body>

</html>