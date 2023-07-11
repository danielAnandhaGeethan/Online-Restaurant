<?php
session_start();

    $uname = $_POST['username'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];


    if($pass1 == $pass2){
        $conn = mysqli_connect("localhost","root","","food");

        if(!$conn){
            die("Connection failed : "  . mysqli_connect_error());
        } else{
            $sql = "insert into user(Username,Password) values('$uname','$pass1')";
            $res = mysqli_query($conn,$sql);

            if($res){
                echo '<script> alert(". . . Account Created Successfully . . ."); </script>';
                $sql1 = "select * from user where Username = '$uname'";
                $res1 = mysqli_query($conn,$sql1);
                $row = $res1->fetch_assoc();

                $_SESSION['userID'] = $row['User_id'];
                echo '<script> alert("Your User ID is ' . $row['User_id'] .'"); </script>';
                echo '<script> window.location.href = "../php/menu.php"; </script>';
            } else{
                die('Error : ' . mysqli_connect_error());
            }
        }
    } else{
        echo '<script> alert(". . . Passwords Not Macthing . . ."); </script>';
        echo '<script> window.location.href = "../html/signup.html"; </script>';
    }

?>