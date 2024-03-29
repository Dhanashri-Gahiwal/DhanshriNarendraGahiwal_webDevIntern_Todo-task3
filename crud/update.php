<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Update</title>
  </head>

  <!-- retrieve tasks for update -->
  <?php
    include '../config.php';
    $id = $_GET['id'];
    $select = "SELECT * FROM `tasks` WHERE id = $id";
    $data = mysqli_query($conn, $select);
    $result= mysqli_fetch_assoc($data);
  ?>

  <body>
    <div class="container">
      <form class="my-5" action="update1.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <input type="text" class="form-control" id="todoInput" name="title" value="<?php echo $result['title'] ?>" />
        </div>
        <button type="submit" class="btn btn-primary" name="update">Update</button>
        <input type="hidden" class="form-control" name="id" value="<?php echo $result['id'] ?>" />
      </form>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>