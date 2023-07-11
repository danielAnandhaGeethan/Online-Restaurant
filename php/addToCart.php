<?php

    session_start();

    $itemID = $_POST['itemID'];
    $userID = $_SESSION['userID'];
    $qty = $_POST['qty'];

    
    $conn = mysqli_connect("localhost","root","","food");

    if(!$conn){
        die("Connection failed : " .mysqli_connect_error());
    } else{
        $sql = "select * from cart where User_id = $userID";
        $res = mysqli_query($conn,$sql);

        $fl = 0;

        if($res->num_rows > 0){
            while($row1 = $res->fetch_assoc()){
                if($row1['item_id'] == $itemID){
                    $qty += (int)$row1['quantity'];
                    $sql0 = "update cart set quantity = $qty where User_id = $userID and item_id = $itemID";
                    $res0 = mysqli_query($conn,$sql0);
                    $fl = 1;
                    
                    echo '<script> window.location.href = "../php/menu.php"; </script>';
                }
            }
        }

        if($fl == 0){
            $sql1 = "select price from items where item_ID = $itemID";
            $res1 = mysqli_query($conn,$sql1);

            if($res1){
                $row = $res1->fetch_assoc();
                $sql2 = "insert into cart values($userID,$itemID,$qty,$row[price])";
                $res2 = mysqli_query($conn,$sql2);

                if($res2){
                    echo '<script> window.location.href = "../php/menu.php"; </script>';
                }
            }
        }
    }
?>