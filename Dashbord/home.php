<?php 
  session_start();
  require_once("header.php");
  $user_name = $_SESSION["user"]["name"];
  
  
?>


  <!-- Add item button -->
  <div class="container mt-5 ">
    <div class="row">
      <div class="col-12 text-center">
          <h1 class="h3 mb-3 font-weight-normal text-uppercase mt-5">Welcome  <span class="text-danger"><?=$user_name ?></span> it's Your Dashboard </h1>
      </div>
    </div>
  </div>
   

  <?php 
  
    require_once("footer.php");
  
  ?>