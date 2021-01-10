
<?php
session_start();
if (!empty($_POST["uname"]) && !empty($_POST["uemail"]) && !empty($_POST["mobile"]) && !empty($_POST["role"])  && !empty($_SESSION["user"]["id"])) {

    $email = $_POST["uemail"];
    $name = $_POST["uname"];
    $role = $_POST["role"];
    $mobile = $_POST["mobile"];
    $id = $_SESSION["user"]["id"];
    $old_logo = $_SESSION["user"]["photo"];

    if (!empty($_FILES["logo"]["tmp_name"])) {

        $text = "abcdefghijklmniqrstwuyz123456789v_";
        $text = substr(str_shuffle($text), 1, 10);

        $new_logo = "images/logo/" . date("YmdHis") . $text . "." . pathinfo($_FILES["logo"]["name"], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["logo"]["tmp_name"], $new_logo);
        unlink($old_logo);
        $query = "update users set name = '$name' , email = '$email' , role = '$role' , photo = '$new_logo' where id = $id";
    }else {
        $query = "update users set name = '$name', email = '$email' , role = '$role' where id = $id";
    }
    require_once("connection.php");
    $rslt = mysqli_query($connect, $query);
    mysqli_close($connect);
    header("location:users.php?msg=edit_done&id=$id");
} else {

    header("location:users.php?msg=error_editing");
   
}
?>