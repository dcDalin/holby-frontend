<?php
  include_once('../sys/core/init.inc.php');

  $common = new common();

  try {
    $search_value = trim($_POST['search']);
    $results = $common -> GetRows("SELECT * FROM tbl_course WHERE title LIKE '%$search_value%'");

    $total_rows = $common -> CCGetDBValue("SELECT COUNT(*) FROM tbl_course WHERE title LIKE '%$search_value%'");

    $response = array();

    if($total_rows < 1){
      $response['status'] = 'error';
      $response['message'] = 'No results found';
    }else {
      foreach ($results as $row){
        $id = $row['id'];
        $title = $row['title'];
        $months = $row['months'];
        $weeks = $row['weeks'];
        $days = $row['days'];
        $hours = $row['hours'];
        $minutes = $row['minutes'];
        $level = $row['level'];
        $thumbnail = $row['thumbnail'];

        if($months == 1){
          $months = $months . " Month";
        }else {
          $months = $months . " Months";
        }

        if($weeks == 1){
          $weeks = $weeks . " Week";
        }else {
          $weeks = $weeks . " Weeks";
        }

        if($days == 1){
          $days = $days . " Day";
        }else {
          $days = $days . " Days";
        }

        if($hours == 1){
          $hours = $hours . " Hour";
        }else {
          $hours = $hours . " Hours";
        }

        if($minutes == 1){
          $minutes = $minutes . " Minute";
        }else {
          $minutes = $minutes . " Minutes";
        }

        if($months == 0){
          $months = '';
        }
        if($weeks == 0){
          $weeks = '';
        }
        if($days == 0){
          $days = '';
        }
        if($hours == 0){
          $hours = '';
        }
        if($minutes == 0){
          $minutes = '';
        }
        $output = '
        <div class="card">
          <img class="card-img-top" height=250 src="'.$ADMIN_URL.'/uploads/course_thumbnails/'.$thumbnail.'" alt="...">
          <div class="card-body">
            <h5 class="card-title">'.$title.'</h5>

            <p class="card-text">
              <small class="text-muted">
                '.$months.'
                ' .$weeks.'
                ' .$days.'
                ' .$hours.'
                ' .$minutes.'
              </small>
            </p>
          </div>
        </div>
        ';
      }
      $response['status'] = 'success';
      $response['output'] = $output;    
    }
    echo json_encode($response);
    exit;
  }catch(Exception $e){
    echo $e;
  }


?>