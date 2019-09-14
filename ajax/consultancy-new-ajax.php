<?php

include_once('../sys/core/init.inc.php');

$common = new common();
if(filter_has_var(INPUT_POST, 'btn-submit')){
  try {
  $firstName = ucfirst(strtolower(trim($_POST['firstName'])));
  $lastName = ucfirst(strtolower(trim($_POST['lastName'])));
  $email = strtolower(trim($_POST['email']));
  $phoneNumber = trim($_POST['phoneNumber']);
  $idNumber = trim($_POST['idNumber']);
  $tokenCode = 'some';

  $password = md5($_POST['password']);

  $response = array();

  // Check if email and password are correct 

  $query = $common -> Insert("
    INSERT INTO `tbl_users_individuals` (`firstName`, `lastName`, `email`, `idNumber`, `phoneNumber`, `password` , `tokenCode`)
    VALUES ('".$firstName."', '".$lastName."', '".$email."', '".$idNumber."', '".$phoneNumber."', '".$password."', '".$tokenCode."');
  ");

  if(!$query){
    $response['status'] = 'error'; // could not create user
    $response['message'] = 'Sorry, Could not create your account'; 
  }else if($query){
    $response['status'] = 'success';
    $response['message'] = 'Account successfuly created. Reloading...';
    
  } 
  echo json_encode($response);
  exit;
  }catch(Exception $e){
    $response['status'] = 'exception'; 
    $response['message'] = $e; 
    echo json_encode($response);
  } 
}
?>