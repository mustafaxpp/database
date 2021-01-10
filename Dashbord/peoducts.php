
    <?php

        if(!empty($_POST["productname"]) && !empty($_POST["productnamear"])){
          $cat_name = $_POST["productname"];
          $cat_namear = $_POST["productnamear"];
       
          require("connection.php");
          $query = "insert into categories (name , name_ar) values ('$cat_name' , '$cat_namear')";
          $rslt = mysqli_query($connect , $query);
          var_dump($rslt);
          echo mysqli_error($connect);
          mysqli_close($connect);
          header("location:category.php?msg=done");
          ?>
        
        <?php
 }else {
   
   header("location:category.php?error=empty");
 }
?>
