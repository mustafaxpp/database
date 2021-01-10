<?php

if(!empty($_POST["productname"]) && 
    !empty($_POST["productnamear"]) && 
    !empty($_POST["price"]) && 
    !empty($_POST["offer_price"]) && 
    !empty($_POST["details"]) && 
    !empty($_POST["brand_id"]) && 
    !empty($_POST["category_id"]) && 
    !empty($_POST["seller_id"]) ){



    $name = $_POST["productname"]; 
    $name_ar= $_POST["productnamear"]; 
    $price = $_POST["price"]; 
    $offer_price = $_POST["offer_price"]; 
    $brand_id = $_POST["brand_id"]; 
    $category_id = $_POST["category_id"]; 
    $seller_id = $_POST["seller_id"]; 
    $details = $_POST["details"]; 


            if (!empty($_FILES["logo"]["tmp_name"])){

                $text = "abcdefghijklnopqrstwuyzx123456789v_";
                $text = substr( str_shuffle($text) , 1,10);
                
                $logo_name ="images/logo/". date("YmdHis").$text . "." . pathinfo($_FILES["logo"]["name"] ,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["logo"]["tmp_name"] ,$logo_name );
            
                $qry = "insert into products (name , name_ar , price , offer_price, details ,category_id , brand_id ,  seller_id , logo) values ('$name' ,'$name_ar', '$price','$offer_price','$details','$category_id','$brand_id','$seller_id','$logo_name')";
            }else{
                $qry = "insert into products (name , name_ar , price , offer_price ,category_id , brand_id ,  seller_id ) values ('$name' ,'$name_ar', '$price','$offer_price',,'$category_id','$brand_id','$seller_id')";
            }
            require("connection.php");    
            $rslt = mysqli_query($connect , $qry);
            mysqli_close($connect);
            header("location:product.php?msg=add_ok");

}else{
    header("location:product.php?error=empty");
}
