<?php 

  require_once("header.php");

    
    if(!empty ($_GET["id"])){

        $del_id = $_GET["id"];
        require_once("connection.php");
        $query = "delete from users where id = $del_id";
        $rslt = mysqli_query($connect , $query);
        mysqli_close($connect);
        header("location:users.php?msg=deleted");
        
    }else {
        
        header("location:users.php?msg=no_delet");
    }
    ?>
