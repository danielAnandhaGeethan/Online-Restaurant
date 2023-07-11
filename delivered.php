<?php 

    session_start();
    $userID = $_POST['user_id'];
    $order_id = $_SESSION['order_id'];
    $temp = "DELIVERED";

    $conn = mysqli_connect("localhost","root","","food");

    if(!$conn){
        die("Connection Failed : " . mysqli_connect_error());
    } else{
        $sql = "update orders set Status = 'DELIVERED' where UserID = $userID and Status = 'IN PROGRESS'";
        $res = mysqli_query($conn,$sql);
        
        $sql1 = "delete from cart where User_id = $userID";
        $res1 = mysqli_query($conn,$sql1);

        echo '<script> window.location.href = "menu.php"; </script>';
    }

?>