<?php

// delete task for specific id
include '../config.php';
$id = $_GET['id'];
$delete = mysqli_query($conn, "DELETE FROM `tasks` WHERE id = $id");
header('location:todo.php');
?>
