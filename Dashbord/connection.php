<?php 

$connect = mysqli_connect("localhost" , "root" , "" , "ecommerce");

// 
define('DSN', 'mysql:host=localhost;dbname=ecommerce');
define("DB_USER" ,"root");
define("DB_PW" ,"" );

// email server  info
define("HOST" ,"smtp.mailtrap.io" );
define("EMAIL_USER_NAME" ,"170090027b50b7" );
define("EMAIL_PW" ,"69375e3c7bb059" );
define("EMAIL_PORT" ,"2525" );
define("SMTP_Auth" ,true );
define("SMTPSecure" ,"tls" );
define("FROM_EMAIL" ," Moustafa@ecomm.com" );
define("FROM_Name" ,"Moustafa Ecommerce Team" );
