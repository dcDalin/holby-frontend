<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <section class="bronze slider" id="bronze-slider">
    <?php
      $bronze = 'Bronze';
      $results = $common -> GetRows("
        SELECT * FROM tbl_course WHERE level='".$bronze."'
      ");
      $total_rows = $common -> CCGetDBValue("SELECT COUNT(*) FROM tbl_course WHERE level='".$bronze."'");

      if($total_rows < 1){ 
        ?>
    <div class="">
      <div class="card card-inverse card-primary ">
        <blockquote class="card-blockquote p-3">
          <footer>
            <small>
              No Bronze Level Courses Found
            </small>
          </footer>
        </blockquote>
      </div>
    </div>
    <?php
      }else {
        foreach ($results as $row){
          $title = $row['title'];
          $months = $row['months'];
          $weeks = $row['weeks'];
          $days = $row['days'];
          $hours = $row['hours'];
          $minutes = $row['minutes'];
          $thumbnail = $row['thumbnail'];
        ?>
    <div class="">
      <div class="card card-inverse card-primary ">
        <img class="card-img-top" src="<?php echo $ADMIN_URL; ?>/uploads/course_thumbnails/<?php echo $thumbnail; ?>">
        <blockquote class="card-blockquote p-3">
          <p><?php echo $title; ?></p>
          <footer>
            <small>
              <?php 
                if($months == 0){
                  echo null;
                }else if($months == 1){
                  ?>
              <strong><?php echo $months ?></strong> Month
              <?php
                }else {
                  ?>
              <strong><?php echo $months ?></strong> Months
              <?php
                }
              ?>

              <?php 
                if($weeks == 0){
                  echo null;
                }else if($weeks == 1){
                  ?>
              <strong><?php echo $weeks ?></strong> Week
              <?php
                }else {
                  ?>
              <strong><?php echo $weeks ?></strong> Weeks
              <?php
                }
              ?>

              <?php 
                if($days == 0){
                  echo null;
                }else if($days == 1){
                  ?>
              <strong><?php echo $days ?></strong> Day
              <?php
                }else {
                  ?>
              <strong><?php echo $days ?></strong> Days
              <?php
                }
              ?>

              <?php 
                if($hours == 0){
                  echo null;
                }else if($hours == 1){
                  ?>
              <strong><?php echo $hours ?></strong> Hour
              <?php
                }else {
                  ?>
              <strong><?php echo $hours ?></strong> Hours
              <?php
                }
              ?>
            </small>
          </footer>
        </blockquote>
      </div>
    </div>
    <?php
        }
      }
    ?>
  </section>
</div>