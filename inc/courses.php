<section class="section-courses custom-section-margin-top">
  <div class="container custom-courses-section ">
    <h1 class="display-5">Courses</h1>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
          aria-selected="true">Bronze</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
          aria-selected="false">Silver</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
          aria-selected="false">Gold</a>
      </li>
    </ul>
    <div class="tab-content" id="myTabContent">
      <?php include 'course-bronze.php'; ?>
      <?php include 'course-silver.php'; ?>
      <?php include 'course-gold.php'; ?>
    </div>
  </div>
</section>