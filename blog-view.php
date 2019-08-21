<?php
  error_reporting(0);
	session_start();
	header('Cache-control: private');
	header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
	header('Cache-Control: no-store, no-cache, must-revalidate');
	header('Cache-Control: post-check=0, pre-check=0', false);
	header('Pragma: no-cache');
	include_once('sys/core/init.inc.php');
  $common = new common();
  include_once('env-variables.php');
?>
<?php 
  if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = $_GET['id'];

    $result = $common -> GetRows("
      SELECT
        tbl_admin.id, tbl_admin.firstName, tbl_admin.lastName,
        tbl_blog.id AS blog_id, tbl_blog.thumbnail, tbl_blog.blogger_id, tbl_blog.blog_title, tbl_blog.blog_body, tbl_blog.isActive, tbl_blog.datePosted

      FROM
        tbl_admin, tbl_blog

      WHERE
        tbl_admin.id = tbl_blog.blogger_id
      AND
        tbl_blog.id = '".$id."'
      AND
        tbl_blog.isActive='Y'
    ");

    if(!$result) {
      header("Location: blog");
    }

    foreach($result as $row){
      $id = $row['blog_id'];
      $firstName = $row['firstName'];
      $lastName = $row['lastName'];
      $blogTitle = $row['blog_title'];
      $blogBody = $row['blog_body'];
      $datePosted = $row['datePosted'];
      $thumbnail = $row['thumbnail'];

      $phpdate = strtotime($datePosted);
      $mysqldate = date( 'd-m-Y', $phpdate);

      $trimTitle = substr($blogTitle, 0, 20). '...';
    }
  }
  else
  { 
    header("Location: blog");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/custom.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <title>Blog | <?php echo $blogTitle; ?> </title>
</head>

<body>
  <?php include 'inc/header.php'; ?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4"><?php echo $blogTitle ?></h1>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top custom-carousel"
            src="<?php echo $ADMIN_URL; ?>/uploads/blog_thumbnails/<?php echo $thumbnail; ?>" alt="Blog Thumbnail">
          <div class="card-body">
            <p class="card-text"><?php echo $blogBody; ?></p>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $mysqldate; ?> by
            <span><?php echo $firstName ?> <?php echo $lastName ?></span>
          </div>
        </div>
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <div class="card my-4">
          <h5 class="card-header">Recent Posts </h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12">
                <ul class="list-group list-group-flush">
                  <?php 
                  $recentPosts = $common -> GetRows("
                    SELECT * FROM tbl_blog WHERE isActive='Y' ORDER BY id DESC LIMIT 10
                  ");
                  foreach ($recentPosts as $row){
                    $trimTitle = substr($row['blog_title'], 0, 50). '...';
                    $id = $row['id'];
                    ?>
                  <li class="list-group-item">
                    <a href="blog-view?id=<?php echo $id; ?>">
                      <?php echo $trimTitle; ?>
                    </a>
                  </li>
                  <?php
                  }
                ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php include 'inc/footer.php'; ?>

  <!-- JS  -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="http://flaviusmatis.github.io/simplePagination.js/"></script>
  <script>
  var items = $(".list-group .list-group-flush .list-group-item");
  var numItems = items.length;
  var perPage = 4;

  items.slice(perPage).hide();

  $('#pagination-container').pagination({
    items: numItems,
    itemsOnPage: perPage,
    prevText: "&laquo;",
    nextText: "&raquo;",
    onPageClick: function(pageNumber) {
      var showFrom = perPage * (pageNumber - 1);
      var showTo = showFrom + perPage;
      items.hide().slice(showFrom, showTo).show();
    }
  });
  </script>
</body>

</html>