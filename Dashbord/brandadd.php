<?php

if(!empty($_POST["productname"]) && $_POST["productnamear"] ){
    $name = $_POST["productname"]; 
    $name_ar= $_POST["productnamear"]; 

            if (!empty($_FILES["logo"]["tmp_name"])){

                $text = "abcdefghijklnopqrstwuyzx123456789v_";
                $text = substr( str_shuffle($text) , 1,10);
                
                $logo_name ="images/logo/". date("YmdHis").$text . "." . pathinfo($_FILES["logo"]["name"] ,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["logo"]["tmp_name"] ,$logo_name );
            
                $qry = "insert into brands (name ,logo,name_ar) values('$name' ,'$logo_name', '$name_ar')";
            }else{
                $qry = "insert into brands (name , name_ar) values('$name' , '$name_ar')";
            }
            require("connection.php");    
            $rslt = mysqli_query($connect , $qry);
            mysqli_close($connect);
            header("location:brands.php?msg=add_ok");

}else{
    header("location:brands.php?error=empty");
}
