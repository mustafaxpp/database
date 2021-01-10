<?php
  session_start();
    // $use_email ="";
    $use_pw ="";
  if(!empty($_COOKIE["email"]) && !empty($_COOKIE["pw"])){
    // check user in database 

    $use_email =$_COOKIE["email"];
    $use_pw =$_COOKIE["pw"];

    $qry = "select id , name , email , role from users where email='$use_email' and password='$use_pw'";
    require("connection.php");        
    $rslt = mysqli_query($connect , $qry);
    if($user = mysqli_fetch_assoc($rslt)){
        if ($user["role"]=="admin"){
            $_SESSION["user"] = $user;                   
            header("location:home.php");
        }
  }
}
require_once("header.php");
?>

<body class="text-center">
    <div class="container">
        <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mb-5">
                    <form class="form-signin wow fadeIn slow" action="login_cheak.php" method="post">
                    <img class="mb-4" src="assets/brand/mi.jpg" alt="" width="72" height="72">
                     <h1 class="h3 mb-3 font-weight-normal text-primary">Login To Your Dashboard</h1>
                    <?php 
                    
                        if(!empty($_GET['error']) && $_GET["error"] == "empty"){

                            ?>
                        <small class="text-danger " >This informations importnat to enter it .</small>
                            <?php
                        }

                    ?>
                    <?php 
                    if (!empty($_GET['msg']) && $_GET['msg'] == "invalid_login"){
                            
                        $msg_succ = "enter email and password to login";
                        ?>
                    <div class="alert alert-danger" role="alert">
                                <strong>  <?=$msg_succ?>  </strong>
                            </div>
                    <?php
                    }
                    ?>
                    <label for="inputEmail" class="">Enter You E-mail</label>
                    <input type="email" name="email" id="inputEmail" class="form-control mb-3" placeholder="Enter You E-mail"  >
                    <!-- <p>Enter Yout password </p> -->
                    <label for="inputPassword" class="">Enter Your password</label>
                    <input type="password" name="pw" id="inputPassword" class="form-control mb-2 placeholder="Enter Your password" >
                    <div class="checkbox mb-3">
                    <label class="">
                        <input type="checkbox" value="remember-me" name="remember" required> Remember me
                    </label>
                    </div>
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
                </form>
            </div>
            <div class="col-4"></div>
        </div>
    </div>



<footer class="fixed-bottom mt-5 ">
<p class="mt-5 text-muted">&copy; 2020-2021</p>
      <p>LANG : 
          <a href="#">ENGLISH</a> ,
          <a href="#">FRENCH</a> ,
          <a href="#">ARABIC</a> ,
          <a href="#">ESPANIOL</a> , 
          <a href="#">ITALIAN</a> 
    
    </p>

  <?php 
  
    require_once("footer.php");
  
  ?>