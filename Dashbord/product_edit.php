<?php 

if(!empty($_POST["name"]) && !empty($_POST["id"])){

    $name = $_POST["name"] ; 
    $id = $_POST["id"] ; 

    $query = "update categories set name = '$name' where id =$id";
    require_once("connection.php");

    $rslt = mysqli_query($connect , $query );
    mysqli_close($connect);
    header("location:index.php?msg=edit_done&id=$id");
} else{
    header("location:index.php?msg=error_editing");
}
?>
