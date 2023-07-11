<?php

    session_start();
    $userID = $_GET['UserID'];
    $userName = $_GET['Username'];
    $total_price = $_GET['totalPrice'];
    $item_count = $_GET['itemCount'];

    $conn = mysqli_connect("localhost","root","","food");

    if(!$conn){
        die("Connection failed : " . mysqli_connect_error());
    } else{
        $sql = "insert into orders(UserID, Username, item_count, total_price, Status) values($userID,'$userName',$item_count,'$total_price','IN PROGRESS')";
        $res = mysqli_query($conn,$sql);

        $sql3 = "select * from orders";
        $res3 = mysqli_query($conn,$sql3);

        $temp = "";

        while($row2 = $res3->fetch_assoc()){
            $temp = $row3['orderID'];
        }
        
        $_SESSION['order_id'] = $temp;
        
        if($res){
            header('Location: menu.php');
            echo '<script> alert(". . . ORDER PLACED SUCCESSFULLY :)"); </script>';
        } else{
            die("Connection Failed : " . mysqli_connect_error());
        }
    }

?>