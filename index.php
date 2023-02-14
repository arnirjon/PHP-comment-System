<?php
  include('connect.php');
  // Post
  $postSql = "SELECT * FROM post";
  $postQuery = mysqli_query($con, $postSql);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Comment System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    
    <div class="container my-5">
      <?php
        while($postData = mysqli_fetch_array($postQuery)) {
          $id = $postData['id'];
          $headline = $postData['headline'];
          $details = $postData['details'];
          $date = $postData['date'];

      ?>
      <div class="card text-bg-light mb-3">
        <div class="card-body">
          <a href="read.php?id=<?php echo $id ?>" class="post_headline">
            <h2 class="card-title"><?php echo $headline?></h2>
          </a>
          <p class="card-text"><small class="text-muted"><?php echo $date?></small></p>
          <p class="card-text col-12 text-truncate"><?php echo $details?></p>
        </div>
      </div>
    <?php }?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>