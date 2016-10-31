<?php
include '../config.tpl';
    if(isset($_POST['USERNAME']) && isset($_POST['MESSAGE'])){
        $user = stripslashes(trim($_POST['USERNAME']));
        $message = stripslashes(trim($_POST['MESSAGE']));
        $bool = (!isset($user) || $message == '' || !isset($message) || $user=='');
         if($bool){
           echo "Please fill the form correctly.";         
        }
        else{
            $query = "INSERT INTO data (user,message) VALUES ('$user','$message')";
            $done = mysqli_query($con,$query);
            if(!($done)){
                echo "Can not connect to the internet";
            }
            else{
                echo 1;
            }

        }
    }
?>          