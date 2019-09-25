<header>
  <?php
    $id = 1;
    $result = $common -> GetRows("
      SELECT * FROM tbl_contacts_social WHERE id='".$id."'
    ");

    foreach($result as $row){
      $twitter = $row['twitter'];
      $facebook = $row['facebook'];
      $instagram = $row['instagram'];
      $email = $row['email'];
      $phoneNumber = $row['phoneNumber'];
    }
  ?>

  <ul class="list-unstyled list-inline social text-right bg-holby-red custom-top-social-info ">
    <li class="list-inline-item"><a class="holby-white" href="<?php echo $email; ?>" target="_blank"><i
          class="fa fa-envelope holby-white"></i>&nbsp;<?php echo $email; ?></a>

    </li>
    <li class="list-inline-item"><a class="holby-white" href="<?php echo $phoneNumber; ?>" target="_blank"><i
          class="fa fa-phone holby-white"></i>&nbsp;<?php echo $phoneNumber; ?></a>

    </li>
    <li class="list-inline-item"><a href="<?php echo $facebook; ?>"><i class="fa fa-facebook holby-white"></i></a></li>
    <li class="list-inline-item"><a href="<?php echo $twitter; ?>"><i class="fa fa-twitter holby-white"></i></a></li>
    <li class="list-inline-item"><a href="<?php echo $instagram; ?>"><i class="fa fa-instagram holby-white"></i></a>
    </li>

  </ul>


  <nav class="navbar navbar-expand-md navbar-dark bg-holby-red sticky-top">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#main_navbar_collapse">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="main_navbar_collapse">
      <a class="navbar-brand" href="index">
        <img src="img/logo.png" height="50" />
        <span class="custom-app-title">Holby Training Solutions</span>
      </a>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link holby-white" href="about">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle holby-white" data-toggle="dropdown" data-target="dropdown_products"
            href="#">
            Products
            <span class="caret"></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown_products">
            <a href="courses" class="dropdown-item">Individual Courses</a>
            <a href="courses" class="dropdown-item">Organizational Courses</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle holby-white" data-toggle="dropdown" data-target="dropdown_services"
            href="#">
            Services
            <span class="caret"></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown_services">
            <a href="consultancy" class="dropdown-item">Consultancy</a>
            <a href="executive-coaching" class="dropdown-item">Executive Coaching</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link holby-white" href="blog">Blog</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle holby-white" data-toggle="dropdown" data-target="dropdown_media" href="#">
            Media
            <span class="caret"></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="dropdown_media">
            <a class="dropdown-item">Something</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item">Something</a>
            <a class="dropdown-item">Something</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link holby-white" href="#">Store</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle holby-white" data-toggle="dropdown" data-target="dropdown_account"
            href="#">
            Account
            <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown_account">
            <a href="login" class="dropdown-item">Login</a>
            <a href="signup-individual" class="dropdown-item">Register as individual</a>
            <a href="signup-organization" class="dropdown-item">Register as organization</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>