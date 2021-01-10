<?php 
  session_start();
  require_once("header.php");

?>


    <!-- main Body Section -->
    <div class="container pt-5">
    <h1 class="text-center text-primary pt-5"> Welcome to Edited items </h1>
    </div>

    <?php 
    
    if(!empty ($_GET["id"])){
        $edit_id = $_GET["id"];
        require_once("connection.php");
        $query = "select * from brands where id = $edit_id";
        $rslt = mysqli_query($connect , $query);
        if($brand_info = mysqli_fetch_assoc($rslt)){
          $name = $brand_info["name"];
          $logo = $brand_info["logo"];
          $name_ar = $brand_info["name_ar"];
          $_SESSION["brand"] = $brand_info;
        }
        
    }
    ?>


<div class="container mt-5 ">
    <div class="row">
      <div class="col-5">
        <!-- form to update -->
        <form action="updatepage.php" class="form-signin" method="post" enctype="multipart/form-data">
          <h1 class="h3 mb-3 font-weight-normal mt-5">Edit New brand Name</h1>
          <label for="inputEmail" class="sr-only"> Add New brand name </label>
          <input type="text" value="<?=$name?>" name="name" id="inputEmail" class="form-control wow fadeInDown slow " placeholder="Enter new category name" autofocus>
          <input type="text" value="<?=$name_ar?>" name="name" id="inputEmail" class="form-control wow fadeInDown slow mt-2" placeholder="الاسم باللغة العربية " autofocus>
          <input type="hidden" value="<?=$edit_id?>" name="hideid" class="form-control wow fadeInDown slow" >
          <div class="form-group wow fadeInDown slow">
            <label for="logo"> Update Your New bran Logo</label>
            <input type="file" name="new_logo" id="" class="form-control" placeholder="" aria-describedby="helpId">
          </div>
          <button class="btn btn-md btn-primary btn wow fadeInUp slow mt-3" type="submit">Save Edit</button>
        </form>
        
      </div>
      <div class="col-4">
      <img src="<?= $logo ?>" alt="">
      </div>
    </div>
  </div>
      

      <?php 
  
  require_once("footer.php");

?>