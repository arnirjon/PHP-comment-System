<?php
  include('connect.php');
  error_reporting(E_ERROR);
  // Post
  $getid = $_GET['id'];
  $postSql = "SELECT * FROM post WHERE id = $getid";
  $postQuery = mysqli_query($con, $postSql);

  // comment
  $post_id = $_GET['id'];
  $commentSql = "SELECT * FROM comment WHERE post_id = $post_id ORDER BY id desc";
  $commentQuery = mysqli_query($con, $commentSql);

?>

<!-- This code for comment send to database -->

<?php
  include('connect.php');
  error_reporting(E_ERROR);
  if(isset($_POST['comment_submit'])) {
    $id = $_POST['id'];
    $post_id = $_POST['post_id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO `comment` (`id`, `name`, `comment`, `post_id`) VALUES (NULL, '$name', '$comment', '$post_id')";

    if(mysqli_query($con, $sql)) {
      ?>
        <script language="javascript" type="text/javascript">
          alert('Project Post Successfully');
          <?php
            if($postData = mysqli_fetch_array($postQuery)) {
              $id = $postData['id'];
          ?>
          window.location = 'read.php?id=<?php echo $id ?>';
        <?php }?>
        </script>
      <?php
    }
    else {
      echo "Somrthing Wrong";
    }


  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Read</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    
    <div class="container">
      <?php
        if($postData = mysqli_fetch_array($postQuery)) {
          $id = $postData['id'];
          $headline = $postData['headline'];
          $details = $postData['details'];
          $date = $postData['date'];

      ?>
      <h4 class="my-3">Post NO: <?php echo $getid ?></h4>
      <div class="card my-3" id="read_card">
        <h3><?php echo $headline ?></h3>
        <p class="card-text"><small class="text-muted"><?php echo $details?></small>
      </div>
      <?php }?>
    </div>


    <!--============= Comment Form =============-->


    <div class="container my-5">
      <h4>Comment</h4>
      <form action="" method="POST">
        <input type="number" name="post_id" value="<?php echo $post_id ?>">
        <input type="text" name="name" class="form-control mb-3" placeholder="Name">
        <textarea name="comment" class="form-control mb-3" placeholder="Your Comment"></textarea>
        <input type="submit" name="comment_submit">
      </form>
      
    </div>

    <!--============= Fetch Comment Form Database =============-->

    <div class="container">
      <?php
        while($commentData = mysqli_fetch_array($commentQuery)) {
          $id = $commentData['id'];
          $name = $commentData['name'];
          $comment = $commentData['comment'];
          $cmdate = $commentData['cmdate'];
          $post_id = $commentData['post_id'];
      ?>
      <div>
        <h5 style="margin: 0;"><?php echo $name ?></h5>
        <small style="color: gray;">
          <?php
              echo "<span class='blogDate'>" .date('d F Y', strtotime($commentData['cmdate']) ) . "</span>";
            ?>
        </small>
        <p><?php echo $comment ?></p>
      </div>
      <hr>
      <?php }?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>