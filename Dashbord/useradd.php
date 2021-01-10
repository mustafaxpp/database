<?php

if(!empty($_POST["uname"]) && !empty($_POST["uemail"]) && !empty($_POST["role"]) && !empty($_POST["mobile"]) ){
    $name = $_POST["uname"]; 
    $email= $_POST["uemail"]; 
    $role= $_POST["role"]; 
    $mobile= $_POST["mobile"]; 

            if (!empty($_FILES["logo"]["tmp_name"])){

                $text = "abcdefghijklnopqrstwuyzx123456789v_";
                $text = substr( str_shuffle($text) , 1,10);
                
                $logo_name ="images/logo/". date("YmdHis").$text . "." . pathinfo($_FILES["logo"]["name"] ,PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["logo"]["tmp_name"] ,$logo_name );
                require_once("connection.php");    
            
                $qry = "insert into users (email , password , name , mobile ,photo) values('$email' ,'$text', '$name', '$mobile', '$logo_name')";
            }else{
                $qry = "insert into users (email , password , name  , mobile ) values('$email','$text','$name' , '$mobile')";
            }
            require_once("connection.php");    
            require_once("send_mail.php");    
            $rslt = mysqli_query($connect , $qry);
            // send_email (FROM_EMAIL , FROM_Name , $to , $toName , $subject , $body);
            send_email(FROM_EMAIL , FROM_Name , $email , $name , "Welcome in our web site" , 
            "Hello <br> This Message 
            From Our Team To You $name Send To You Your Password To Login To Your Dashboard To Start Work 
            and Your Password Is <b>$text</b>");
            mysqli_close($connect);
            header("location:users.php?msg=add_ok");

}else{
    header("location:users.php?error=empty");
}
