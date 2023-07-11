<link rel="stylesheet" href="../css/menu.css">
<script src="../menu.js"></script>


<body>
<div class="top">
    <input type="search" id="search" placeholder="Search . . ." name="search">
    <button id="home" onclick="window.location.href='../php/index.php'"><b>HOME</b></button>
    <button id="orders" onclick="window.location.href='../php/orders.php'"><b>ORDERS</b></button>
    <button id="cart" onclick="window.location.href='../php/cart.php'"><b>CART</b></button>
    <button id="logout" onclick="window.location.href='../php/logout.php'"><b>LOGOUT</b></button>
    <button id="dp" onclick="window.location.href = '../html/profile.html';"><img id="dp_image" src="
    <?php
        session_start();
        $conn = mysqli_connect("localhost","root","","food");

        if(!$conn){
            die("Connection failed : " . mysqli_connect_error());
        } else{
            $user_id = $_SESSION['userID'];
        
            $sql = "select dp from user where User_id = $user_id";
            $res = mysqli_query($conn,$sql);

            if($res){
                $row = $res->fetch_assoc();
                echo $row['dp'];
            }
        }

    ?>
    "></button>
    <h6 id="name">
        <?php

            $user_id = $_SESSION['userID'];
            $conn = mysqli_connect("localhost","root","","food");

            if($conn){
                $sql = "select Username from user where User_id = $user_id";
                $res = mysqli_query($conn,$sql);

                if($res){
                    $row = $res->fetch_assoc();
                    echo $row['Username'];
                }
            }
        
        ?>
    </h6>
</div>

<?php
$conn = mysqli_connect("localhost","root","","food");

if(!$conn){
    die("Connection failed : " . mysqli_connect_error());
} else {
    $mysql = "select * from items";

    $res = mysqli_query($conn,$mysql);


    if($res->num_rows > 0){

        while($row = $res->fetch_assoc()){
            ?>

            <div class="container">
                <form action="../php/addToCart.php" method="POST">
                    <div class="ID" name="ID" style="display:none;">
                        <input type="text" name="itemID" value="<?php echo $row['item_ID'] ?>">
                    </div>
                    <div class="image"><img id="img" src="<?php echo $row['image']; ?>"></div>
                    <div class="name"><?php echo $row['item_name']; ?>
                        <span class="desc"><?php echo $row['item_description']; ?></span>
                    </div>
                    <div class="price" name="price">
                        <?php
                            echo "$" . $row['price']; 
                        ?>
                    </div>
                    <div class="count">
                        <input id="quantity" name="qty" type="number" value="0">
                    </div>
                    <div class="cart"><input type="submit" class="add" value="ADD TO CART"></div>
                </form>
            </div>            
            <?php
        }
    }
}

?>  
</body>