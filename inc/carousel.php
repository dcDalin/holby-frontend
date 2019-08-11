<?php
  $results = $common -> GetRows("SELECT * FROM tbl_home_slider");
  $total_rows = $common -> CCGetDBValue("SELECT COUNT(*) FROM tbl_home_slider ");

  if($total_rows < 1){
    ?>
<h2>No slider items to show...</h2>
<?php
  }else {
    
    ?>

<section id="carouselExampleCaptions" class="carousel slide pointer-event" data-ride="carousel">
  <ol class="carousel-indicators">
    <?php 
      $i = 1;
      foreach ($results as $row) {
        $class = ( $i === 1 ) ? 'active' : '';
          ?>
    <li data-target="#carouselExampleCaptions" data-slide-to="<?php echo $i; ?>" class="<?php echo $class; ?>"></li>
    <?php
        $i ++;
      }
    ?>
  </ol>
  <div class="carousel-inner">
    <?php
      $j = 1;
      foreach($results as $roww) {
        $image = $roww['image'];
        $title = $roww['title'];
        $slogan = $roww['slogan'];

        $classs = ($j === 1) ? 'carousel-item active' : 'carousel-item';

        ?>
    <div class="<?php echo $classs; ?>">
      <img src="<?php echo $ADMIN_URL; ?>/uploads/slider_images/<?php echo $image; ?>"
        class="d-block w-100 custom-carousel"
        alt="<?php echo $ADMIN_URL; ?>/uploads/slider_images/<?php echo $image; ?>" />
      <div class="carousel-caption d-none d-md-block">
        <h2><?php echo $title; ?></h2>
        <p><?php echo $slogan; ?></p>
      </div>
    </div>

    <?php

        $j ++;
      }
    ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</section>

<?php
  }
?>