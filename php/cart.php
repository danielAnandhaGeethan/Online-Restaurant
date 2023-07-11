<?php

    session_start();
    $userID = $_SESSION['userID'];

         
    function func($userID,$temp){
        $conn = mysqli_connect("localhost","root","","food");

        if(!$conn){
            die("Connection failed : " . mysqli_connect_error());
        } else{
            $sql = "delete from cart where User_id = $userID and item_id = $temp";
            $res = $mysqli_query($conn,$res);
        }
    }

?>

<head>
    <link rel="stylesheet" href="../css/cart_orders.css">
</head>

<body>
    <h2>CART</h2>
    <button id="home" onclick="window.location.href='../php/index.php'"><b>HOME</b></button>

    <div class="container">
        <div class="header">
            <div class="data"><h3>IMAGE</h3></div>
            <div class="data"><h3>NAME</h3></div>
            <div class="data"><h3>PRICE</h3></div>
            <div class="data"><h3>QUANTITY</h3></div>
        </div>
    <?php

        $conn = mysqli_connect("localhost","root","","food");

        if(!$conn){
            die("Connection failed : " . mysqli_connect_error());
        } else{
            $sql = "select * from cart where User_id = $userID";
            $res = mysqli_query($conn,$sql);
            
            while($row = $res->fetch_assoc()){
                $temp = $row['item_id'];
                
                $sql1 = "select * from items where item_ID = $temp";
                $res1 = mysqli_query($conn,$sql1);
                
                $row1 = $res1->fetch_assoc();   
    ?>  
        <div class="remove">
            <form action="../php/delete.php" method="POST">
                <div style="display:none;">
                    <input type="text" name="uname" value="<?php echo $userID; ?>">
                    <input type="text" name="item_id" value="<?php echo $temp; ?>">
                </div>
                <input id="btn_rem" type="submit" value="x">
            </form>
        </div>
        <div class="capsule">
            <div class="data">
                <img id="image" src="
                <?php
                    echo $row1['image'];  
                ?>">
            </div>
            <div class="data abc">
                <?php
                    echo $row1['item_name'];
                ?>
            </div>
            <div class="data abc">
                <?php
                    echo "$" . $row1['price'];
                ?>
            </div>
            <div class="data abc">
                <?php
                    echo $row['quantity'];
                ?>
            </div>
        </div>
        <?php
            }
        }
        ?>
        <div class="order">
            <form action="../php/order.php" method="POST">
                <div style="display:none;">
                    <input type="text" name="user_id" value="<?php echo $userID; ?>">
                </div>
                <input type="submit" value="ORDER NOW" id="order_btn">
            </form>
        </div>
    </div>
</body>
