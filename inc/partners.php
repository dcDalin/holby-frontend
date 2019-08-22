<?php
$results = $common -> GetRows("
  SELECT * FROM tbl_partners
");
$total_rows = $common -> CCGetDBValue("SELECT COUNT(*) FROM tbl_partners ");

// if user got no blogs
if($total_rows < 1){ 
  echo 'No partners found';
}else {
  ?>
<section class="container custom-section-margin-top custom-courses-section">
  <h1 class="display-5">Our Partners</h1>
  <section class="testimonials slider">
    <?php
foreach ($results as $row){
  $thumbnail = $row['logo'];

  ?>
    <div class="">
      <img src="<?php echo $ADMIN_URL; ?>/uploads/partner_images/<?php echo $thumbnail; ?>"
        class="card-img-top custom-testimonial-img" alt="...">
    </div>
    <?php
}
  ?>
  </section>
</section>
<?php
}
?>