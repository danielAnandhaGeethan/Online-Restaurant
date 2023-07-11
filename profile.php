<?php

    session_start();

    $uname = $_POST['username'];
    $pass = $_POST['pass'];
    $confPass = $_POST['confirm_pass'];

    $conn = mysqli_connect("localhost","root","","food");

    $target_dir = "CSS/IMAGES/";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

    $userID = $_SESSION['userID'];
    if(!$conn){
        die("Connection Failed : " . mysqli_connect_error());
    } else{
        if($uname != ""){
            $sql = "update user set Username = '$uname' where User_id = $userID";
            $res = mysqli_query($conn,$sql);   
            header('Location: profile.html');    
        }

        if($pass != ""){
            if($confPass != ""){
                if($pass == $confPass){
                    $sql = "update user set Password = '$pass' where User_id = $userID";
                    $res = mysqli_query($conn,$sql); 
                    header('Location: profile.html');
                    
                } else{
                    echo '<script> window.alert("!!!PASSWORDS DON\'T MATCH!!!"); </script>';
                    echo '<script> window.location.href = "profile.html"; </script>';
                }
            } else{
                echo '<script> window.alert("CONFIRM THE PASSWORD") </script>';
                echo '<script> window.location.href = "profile.html"; </script>';
            }
        }

        if($target_file != "CSS/IMAGES/"){
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
            $sql = "update user set dp = '$target_file' where User_id = $userID";
            $res = mysqli_query($conn,$sql);
            header('Location: profile.html');
        }
    }

?>