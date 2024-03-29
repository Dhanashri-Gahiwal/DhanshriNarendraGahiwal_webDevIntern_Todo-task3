<?php

    // update task for specific id
    include '../config.php';
    $title = $_POST['title'];
    $id = $_POST['id'];
    $update = "UPDATE `tasks` SET `title`='$title' WHERE id = '$id'";
    $data = mysqli_query($conn, $update);
    header('location:todo.php');

?>