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
  <link rel="stylesheet" type="text/css" href="./assets/slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./assets/slick/slick-theme.css">
  <link rel="stylesheet" href="assets/css/custom.css" />
  <link rel="stylesheet" href="assets/css/carousel.css" />
  <link rel="stylesheet" href="assets/css/testimonial.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <title>Home | <?php echo $SystemName; ?> </title>
</head>

<body>
  <?php include 'inc/header.php'; ?>
  <?php include 'inc/carousel.php'; ?>
  <?php include 'inc/about-vid.php'; ?>
  <?php include 'inc/courses.php'; ?>
  <?php include 'inc/partners.php'; ?>
  <?php include 'inc/testimonials.php'; ?>
  <?php include 'inc/footer.php'; ?>

  <!-- JS  -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
  <script src="./assets/slick/slick.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
  $(document).on('ready', function() {
    function slickInit() {
      $("#bronze-slider").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1
      });

      $("#silver-slider").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1
      });

      $("#gold-slider").slick({
        dots: true,
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1
      });
    }
    slickInit();

    $(".testimonials").slick({
      dots: true,
      infinite: true,
      slidesToShow: 5,
      slidesToScroll: 1
    });
  });
  </script>
  <script src="assets/js/testimonial.js"></script>
</body>

</html>