<?php

include_once('../sys/core/init.inc.php');
$common = new common();

$results = $common -> GetRows("
  SELECT
    tbl_admin.id, tbl_admin.firstName, tbl_admin.lastName,
    tbl_blog.id AS blog_id, tbl_blog.thumbnail, tbl_blog.blogger_id, tbl_blog.blog_title, tbl_blog.blog_body, tbl_blog.isActive, tbl_blog.datePosted

  FROM
    tbl_admin, tbl_blog

  WHERE
    tbl_admin.id = tbl_blog.blogger_id
  
");

// AND
// tbl_blog.isActive='Y'

foreach ($results as $row){
  $id = $row['blog_id'];
  $firstName = $row['firstName'];
  $lastName = $row['lastName'];
  $bloggerId = $row['blogger_id'];
  $blogTitle = $row['blog_title'];
  $blogBody = $row['blog_body'];
  $isActive = $row['isActive'];
  $thumbnail = $row['thumbnail'];

  $blog_arr[] = array(
    "firstName" => $firstName,
    "lastName" => $lastName,
  );

  $show_arr = array(
    'data' => $blog_arr,
  );
  // encoding array to json format
  

}
echo json_encode($blog_arr);
?>