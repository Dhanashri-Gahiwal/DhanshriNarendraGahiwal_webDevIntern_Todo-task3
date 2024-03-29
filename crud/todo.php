<!-- php script start -->
<?php
  include '../config.php';

  session_start();
  $user_id = $_SESSION['user_id'];

  if(!isset($user_id)){
    header('location:../index.php');
  }

  // insert tasks
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    $title = $_POST['title'];
    $user_id = $_SESSION['user_id'];
    $insert = "INSERT INTO `tasks`(`user_id`,`title`) VALUES ('$user_id', '$title')";
    $data = mysqli_query($conn, $insert);
  } 
?>
<!-- php script end -->

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
    <title>Todo</title>
  </head>
  <body>
    <div class="container py-4">
      <h1 class="text-center">Todo List</h1>
      <form class="my-5" action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <input type="text" class="form-control" id="todoInput" name="title" placeholder="Add a new task" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Add Task</button>
      </form>

      <!-- retrieve tasks -->
      <?php
        $user_id = $_SESSION['user_id'];
        $select = "SELECT * FROM `tasks` WHERE user_id = $user_id";
        $data = mysqli_query($conn, $select);
        if(mysqli_num_rows($data) > 0){    
        while($result = mysqli_fetch_assoc($data)){
      ?> 

      <div class="row">
        <div class="col-md-8 col-sm-6 mb-3">

          <!-- display tasks -->
          <?php     
              echo $result['title'];
          ?>
        </div>
        <div class="col-md-4 col-sm-6 d-flex justify-content-sm-end">
          <a href="update.php?id=<?php echo $result['id'] ?>" name="update" class="btn btn-success me-2">Update</a>
          <a href="delete.php?id=<?php echo $result['id'] ?>" type="submit" name="delete" class="btn btn-danger">Delete</a>
        </div>
      </div>
      <hr>

      <?php
        }
      } else{
        echo "No todos found.";
      }
      ?>

    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>