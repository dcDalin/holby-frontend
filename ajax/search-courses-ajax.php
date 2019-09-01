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
      if($sql){
        foreach ($results as $row){
          $id = $row['id'];
          $title = $row['title'];

          $courses_arr[] = array(
            "id" => $id,
            "title" => $title
          );
        }
        $response['status'] = 'success';
        $response['data'] = $courses_arr;
      }else if(!$sql){
        $response['status'] = 'error';
        $response['message'] = 'Could search';
      }
    }
    echo json_encode($response);
    exit;
  }catch(Exception $e){
    echo $e;
  }


?>