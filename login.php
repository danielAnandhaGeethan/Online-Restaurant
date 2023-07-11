<?php

session_start();

$fl = 0;
$userID = $_POST['user_id'];
$pass = $_POST['password'];

$_SESSION['userID'] = $userID;

$conn = mysqli_connect("localhost","root","","food");

if(!$conn){
    die("Connection failed : " . mysqli_connect_error());
} else{
    $sql = "select * from user where User_id = '$userID' and Password = '$pass'";
    $sql1 = "select * from user where User_id = '$userID'";
    $res = mysqli_query($conn,$sql);
    $res1 = mysqli_query($conn,$sql1);

    if($res->num_rows > 0){
        header('Location: menu.php');
    } else{
        if($res1->num_rows > 0){
            echo '<script>alert(". . . Incorrect Password . . .");</script>';
            echo '<script> window.location.href = "login.html"; </script>';
        } else{
            echo '<script>alert(". . . No Such User Exists . . .");</script>';
            echo '<script> window.location.href = "login.html"; </script>';
        }
    }    
}
?>