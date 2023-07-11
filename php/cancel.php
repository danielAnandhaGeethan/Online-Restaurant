<?php

    $userID = $_POST['user_id'];

    $conn = mysqli_connect("localhost","root","","food");

    if(!$conn){
        die("Connection Failed : " . mysqli_connect_error());
    } else{
        $sql = "delete from orders where UserID = $userID where Status = 'IN PROGRESS'";
        $res = mysqli_query($conn,$sql);

        header('Location: ../php/menu.php');
    }

?>