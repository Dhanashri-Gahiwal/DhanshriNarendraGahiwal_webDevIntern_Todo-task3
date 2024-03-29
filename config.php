<!-- database connectivity -->

<?php

    $servername = "localhost:8088";
    $username = "root";
    $password = "";
    $db = "todo1";
    
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $db) or die("connection failed");

?>
