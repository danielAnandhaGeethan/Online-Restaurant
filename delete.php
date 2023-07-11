<?php

    $userID = $_POST['uname'];
    $itemID = $_POST['item_id'];

    $conn = mysqli_connect("localhost","root","","food");

    if(!$conn){
        die("Connection failed : " . mysqli_connect_error());
    } else{
        $sql = "delete from cart where User_id = $userID and item_id = $itemID";
        $res = mysqli_query($conn,$sql);

        header('Location: cart.php');
    }

?>