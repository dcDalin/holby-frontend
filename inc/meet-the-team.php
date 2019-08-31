<?php 
  $meetTheTeam = $common -> GetRows("
    SELECT * FROM tbl_about_visibility WHERE id=1
  ");

  foreach ($meetTheTeam as $mtt){
    $meet = $mtt['meetTheTeam'];
    $ptnr = $mtt['partner'];
    $trnr = $mtt['trainer'];
    $cons = $mtt['consultant'];
  }

  // If meet the team visibility is on
  if($meet == 'On'){
    ?>
<div class="custom-meet-the-team">
  <h1 class="custom-section-margin-top custom-center-main-header">Meet the team</h1>
  <?php
$results = $common -> GetRows("
  SELECT * FROM tbl_team
");

if($ptnr == 'On'){
  // Partner
  $getPartner = $common -> GetRows("SELECT * FROM tbl_team WHERE isPartner='Yes'");
    ?>
  <section class="container custom-courses-section">
    <h2 class="display-5">Our Partners</h2>
    <section class="testimonials slider">
      <?php
      foreach($getPartner as $rowPartner){
    ?>
      <!-- Card starts here -->
      <div class="card">
        <img src="<?php echo $ADMIN_URL; ?>/uploads/team_images/<?php echo $rowPartner['image']; ?>"
          class="card-img-top">
        <div class="card-body">
          <h5><?php echo $rowPartner['name']; ?></h5>
          <p class="card-text"><?php echo $rowPartner['bio']; ?></p>
        </div>
      </div>
      <!-- Card ends here -->
      <?php
      }
    ?>
    </section>
  </section>
  <?php
}
if($trnr == 'On'){
// Trainer
$getTrainer = $common -> GetRows("SELECT * FROM tbl_team WHERE isTrainer='Yes'");
?>
  <section class="container custom-courses-section">
    <h2 class="display-5">Our Trainers</h2>
    <section class="testimonials slider">
      <?php
      foreach($getTrainer as $rowTrainer){
    ?>
      <!-- Card starts here -->
      <div class="card">
        <img src="<?php echo $ADMIN_URL; ?>/uploads/team_images/<?php echo $rowTrainer['image']; ?>"
          class="card-img-top">
        <div class="card-body">
          <h5><?php echo $rowTrainer['name']; ?></h5>
          <p class="card-text"><?php echo $rowTrainer['bio']; ?></p>
        </div>
      </div>
      <!-- Card ends here -->
      <?php
      }
    ?>
    </section>
  </section>
  <?php
}
if($cons == 'On'){
// Partner
$getConsultant = $common -> GetRows("SELECT * FROM tbl_team WHERE isConsultant='Yes'");
?>
  <section class="container  custom-courses-section">
    <h2 class="display-5">Our Consultants</h2>
    <section class="testimonials slider">
      <?php
      foreach($getConsultant as $rowConsultants){
    ?>
      <!-- Card starts here -->
      <div class="card">
        <img src="<?php echo $ADMIN_URL; ?>/uploads/team_images/<?php echo $rowConsultants['image']; ?>"
          class="card-img-top">
        <div class="card-body">
          <h5><?php echo $rowConsultants['name']; ?></h5>
          <p class="card-text"><?php echo $rowConsultants['bio']; ?></p>
        </div>
      </div>
      <!-- Card ends here -->
      <?php
      }
    ?>
    </section>
  </section>
  <?php
}
?>
</div>
<?php
// End of $meet == 'On'
  }
?>