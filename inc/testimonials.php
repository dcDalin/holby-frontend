<?php
  $results = $common -> GetRows("SELECT * FROM tbl_testimonials");
  $total_rows = $common -> CCGetDBValue("SELECT COUNT(*) FROM tbl_testimonials");

  if($total_rows < 1){
    echo 'No testimonials to show';
  }else {
    ?>
<section class="testimonial-section2 custom-section-margin-top">
  <div class="row text-center">
    <div class="col-12">
      <div class="h2">Testimonials</div>
    </div>
  </div>
  <div id="testim" class="testim">

    <!--         <div class="testim-cover"> -->
    <div class="wrap">

      <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>
      <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>
      <ul id="testim-dots" class="dots">
        <?php 
      $i = 1;
      foreach ($results as $row) {
        $class = ( $i === 1 ) ? 'dot active' : 'dot';
          ?>
        <li class="<?php echo $class; ?>"></li>
        <?php
        $i ++;
      }
    ?>

      </ul>
      <div id="testim-content" class="cont">
        <?php
      $j = 1;
      foreach($results as $roww) {
        $image = $roww['image'];
        $name = $roww['name'];
        $testimonial = $roww['testimonial'];

        $classs = ($j === 1) ? 'active' : '';

        ?>
        <div class="<?php echo $classs; ?>">
          <div class="img"><img src="<?php echo $ADMIN_URL; ?>/uploads/testimonial_images/<?php echo $image; ?>" alt="">
          </div>
          <div class="h4"><?php echo $name; ?></div>
          <p><?php echo $testimonial; ?></p>
        </div>
        <?php
      }
        ?>
      </div>
    </div>
  </div>
  <!--         </div> -->
</section>
<?php
  }
?>