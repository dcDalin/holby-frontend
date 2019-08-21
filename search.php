<?php
// create a new function
function search($text){
	
	// connection to the Ddatabase
	$db = new PDO("mysql:host=localhost;dbname=holby", 'root', 'Password123!');
	// let's filter the data that comes in
  $text = htmlspecialchars($text);
  
  if($text == ""){
    echo "";
  }else {
    // prepare the mysql query to select the users
    $get_name = $db->prepare("SELECT blog_title FROM tbl_blog WHERE blog_title LIKE concat('%', :blog_title, '%') LIMIT 5");
    // execute the query
    $get_name -> execute(array('blog_title' => $text));
    // show the users on the page
    while($names = $get_name->fetch(PDO::FETCH_ASSOC)){
      // show each user as a link
      echo '<li class="list-group-item"><a href="">'.$names['blog_title'].'</a></li>';
    }
  }
	
}
// call the search function with the data sent from Ajax
search($_GET['txt']);
?>