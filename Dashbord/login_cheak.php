<?php
    session_start();
    if(!empty($_POST["email"]) && !empty($_POST["pw"])){
        $email = $_POST["email"];
        $pw = $_POST["pw"];
        $qry = "select * from users where email='$email' and password='$pw'";
        require("connection.php");        
        $rslt = mysqli_query($connect , $qry);
        if($user = mysqli_fetch_assoc($rslt)){
            if ($user["role"]=="admin"){
                $_SESSION["user"] = $user;
                if (!empty($_POST["remember"] ) && $_POST["remember"]==1 ){
                    setcookie( "email", $email , time() + 60*60*24*365);
                    setcookie("pw" ,$pw  , time() + 60*60*24*365);
                }           
                header("location:home.php");
            }else{
                header("location:index.php?error=invalid_action");
            }
        }else{
            header("location:index.php?error=invalid");
        }
        mysqli_close($connect);
    }else{
        header("location:index.php?error=empty");
    }