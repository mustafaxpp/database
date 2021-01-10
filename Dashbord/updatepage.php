
<?php
session_start();
if (!empty($_POST["name"]) && !empty($_SESSION["brand"]["id"])) {

    $name = $_POST["name"];
    $id = $_SESSION["brand"]["id"];
    $old_logo = $_SESSION["brand"]["logo"];
    if (!empty($_FILES["new_logo"]["tmp_name"])) {

        $text = "abcdefghijklmniqrstwuyz123456789v_";
        $text = substr(str_shuffle($text), 1, 10);

        $new_logo = "images/logo/" . date("YmdHis") . $text . "." . pathinfo($_FILES["new_logo"]["name"], PATHINFO_EXTENSION);
        move_uploaded_file($_FILES["new_logo"]["tmp_name"], $new_logo);
        unlink($old_logo);
        $query = "update brands set name = '$name' , logo = '$new_logo' where id = $id";
    }else {
        $query = "update brands set name = '$name' where id = $id";
    }
    require_once("connection.php");
    $rslt = mysqli_query($connect, $query);
    mysqli_close($connect);
    header("location:brands.php?msg=edit_done&id=$id");
} else {

    header("location:brands.php?msg=error_editing");
    // var_dump($old_logo);
    // var_dump($id);
    // var_dump($name);
    // var_dump($new_logo);
    // var_dump($query);
}
?>
