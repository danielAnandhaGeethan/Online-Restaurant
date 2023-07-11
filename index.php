<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/style.css">
    </head>

    <body>
        <button id="header">WEE WEE RESTAURANT</button>
        <div class="container">
            <button class="box" id="about">ABOUT</button>
            <a 
            <?php
                session_start();
                if(isset($_SESSION['userID'])){
            
            ?>
                    href="menu.php";
                    
            <?php
                } else{        
            ?>
                    href="login.html";
            <?php } ?>
            ><button class="box" id="login">LOGIN</button></a>
            <a href="signup.html"><button id="signup" class="box">SIGN UP</button></a>
        </div>
        <script>
            document.getElementById('header').addEventListener("click", function(){
                window.location.href = "index.php";
            });
        </script>
    </body>
</html>