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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
  <link rel="stylesheet" href="assets/css/custom.css" />
  <link rel="stylesheet" href="assets/css/footer.css" />
  <title>Blog | <?php echo $SystemName; ?> </title>
</head>

<body>
  <?php include 'inc/header.php'; ?>
  <!-- Page Content -->
  <div class="container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">Blogs</h1>
        <!-- Blog Post -->
        <?php
          $results = $common -> GetRows("
            SELECT
              tbl_admin.id, tbl_admin.firstName, tbl_admin.lastName,
              tbl_blog.id AS blog_id, tbl_blog.thumbnail, tbl_blog.blogger_id, tbl_blog.blog_title, tbl_blog.blog_body, tbl_blog.isActive, tbl_blog.datePosted

            FROM
              tbl_admin, tbl_blog

            WHERE
              tbl_admin.id = tbl_blog.blogger_id
            AND
              tbl_blog.isActive='Y'
          ");
          $total_rows = $common -> CCGetDBValue("SELECT COUNT(*) FROM tbl_blog ");

          if($total_rows < 1){
            ?>
        <h2>No blogs</h2>
        <?php
          }else {
            foreach ($results as $row){
              $id = $row['blog_id'];
              $firstName = $row['firstName'];
              $lastName = $row['lastName'];
              $blogTitle = $row['blog_title'];
              $blogBody = $row['blog_body'];
              $datePosted = $row['datePosted'];
              $thumbnail = $row['thumbnail'];

              $phpdate = strtotime($datePosted);
              $mysqldate = date( 'd-m-Y', $phpdate);

              $trimBlogBody = substr($blogBody, 0, 200). '...';
              ?>
        <div class="card mb-4">
          <img class="card-img-top custom-carousel"
            src="<?php echo $ADMIN_URL; ?>/uploads/blog_thumbnails/<?php echo $thumbnail; ?>" alt="Blog Thumbnail">
          <div class="card-body">
            <h2 class="card-title"><?php echo $blogTitle; ?></h2>
            <p class="card-text"><?php echo $trimBlogBody; ?></p>
            <a href="#" class="btn btn-primary btn-sm">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $mysqldate; ?> by
            <span><?php echo $firstName ?> <?php echo $lastName ?></span>
          </div>
        </div>
        <?php
            }
          }
        ?>

        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
          <li class="page-item">
            <a class="page-link" href="#">&larr; Older</a>
          </li>
          <li class="page-item disabled">
            <a class="page-link" href="#">Newer &rarr;</a>
          </li>
        </ul>

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        <div class="card my-4">
          <h5 class="card-header">Search</h5>
          <div class="card-body">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div>

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">Web Design</a>
                  </li>
                  <li>
                    <a href="#">HTML</a>
                  </li>
                  <li>
                    <a href="#">Freebies</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">JavaScript</a>
                  </li>
                  <li>
                    <a href="#">CSS</a>
                  </li>
                  <li>
                    <a href="#">Tutorials</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Recent Posts</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new
            Bootstrap 4 card containers!
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

</body>

</html>