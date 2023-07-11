<head>
    <link rel="stylesheet" href="../css/order.css">
</head>

<?php

    $userID = $_POST['user_id'];

    $conn = mysqli_connect("localhost","root","","food");

    if(!$conn){
        die("Connection failed : " . mysqli_connect_error());
    } else{
        $sql = "select SUM(quantity) from cart where User_id = $userID";
        $sql1 = "select SUM(price) from cart where User_id = $userID";
        $sql2 = "select Username from user where User_id = $userID";
        $res = mysqli_query($conn,$sql);
        $res1 = mysqli_query($conn,$sql1);
        $res2 = mysqli_query($conn,$sql2);

        $row = $res->fetch_assoc();
        $row1 = $res1->fetch_assoc();
        $row2 = $res2->fetch_assoc();
    }

?>

<body>
    
    <h2>ORDER</h2>
    <button id="home" onclick="window.location.href='../php/index.php'"><b>HOME</b></button>

    <form action="../php/placeOrder.php" method="GET">
        <input type="text"name="UserID" value="
        <?php 
            echo "ID : ";
            echo $userID;
        ?>
        ">
        <input type="text"name="Username" value="
        <?php 
            echo "Name : ";
            echo $row2['Username'];
        ?>
        ">
        <input type="text"name="itemCount" value="
        <?php 
            echo "Qty : ";
            echo $row['SUM(quantity)'];
        ?>
        ">
        <input type="text"name="totalPrice" value="
        <?php
            echo "Total : ";
            echo "$" . $row1['SUM(price)'];
        ?>
        ">
        <input type="submit" value="ORDER" id="submit">
    </form>

</body>