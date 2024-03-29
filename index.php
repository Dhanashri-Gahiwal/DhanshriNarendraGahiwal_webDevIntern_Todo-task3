<!-- php script start -->
<?php
  include 'config.php';
  session_start();

  // login functionality
  if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'") or die("query failed");

    if(mysqli_num_rows($select) == 1){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['username'] = $row['username'];
      header('location:./crud/todo.php');
      exit();
    }else{
          $message[] = 'Incorrect username or password!';
        }
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
    <div class="container" id="container">
      <!-- login screen -->
      <div class="mb-3" id="profile">
        <img src="./images/avatar.jpg" alt="profile picture">
      </div>
      <h1>Login To Add Tasks</h1>
      <button type="button" class="btn btn-success py-2 px-4 mt-4" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-whatever="@mdo">Login</button>
      
      <!-- popup login form start -->
      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
          <div class="modal-content border-0">
            <div class="modal-header border-0 align-items-start">
              <div style="margin:auto; width:150px;">
                <img src="./images/avatar.jpg" class="mx-auto" alt="profile picture">
              </div>
              <div class="mt-4 mr-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
            </div>
            <div class="modal-body">
              <form class="" action="" method="post" enctype="multipart/form-data">
                
              <!-- display error message -->
                <?php
                  if(isset($message)){
                    foreach($message as $message){
                      echo '<div class="message">'.$message.'</div>';
                    }
                  }
                ?>
                
                <div class="mb-3">
                  <label for="username" class="col-form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" autocomplete="false" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="col-form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" autocomplete="false" required>
                </div>
                <div class="mb-3 form-check">
                  <input type="checkbox" class="form-check-input" id="check" name="check">
                  <label class="form-check-label" for="check">Remember me</label>
                </div>
                <div class="mb-3 d-grid gap-2">
                  <button class="btn btn-success" type="submit" name="submit">Login</button>
                </div>
              </form>
            </div>
            <div class="modal-footer border-0 bg-light text-dark d-flex justify-content-between">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
              <a href="index.php">Forgot password</a>
            </div>
          </div>
        </div>
      </div>
      <!-- popup login form end -->
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  
  </body>
</html>