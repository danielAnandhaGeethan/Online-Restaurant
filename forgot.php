<?php
    
$userID = $_POST['userID'];
$email = $_POST['email'];

$conn = mysqli_connect("localhost","root","","food");

if(!$conn){
    die("Connection failed : " . mysqli_connect_error());
} else{
    $mysql = "select * from user where User_id = '$userID'";

    $res = mysqli_query($conn,$mysql);

    /*
    $header = "From:j9084389@gmail.com \r\n";
    $header .= "Content-type: text/html\r\n";
    $subject = "Password";
    */

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $message = "Your Password is ";
        $message .= strval($row['Password']);
        //mail($email,$subject,$message);

        //echo '<script>alert("Password Sent via Mail");</script>';

        echo '<script> alert("' . $message . '"); </script>';
        echo '<script> window.location.href = "login.html"; </script>';
    }

}

?>