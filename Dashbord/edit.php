<?php 

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
        $query = "select * from categories where id = $edit_id";
        $rslt = mysqli_query($connect , $query);
        $cat = mysqli_fetch_assoc($rslt);
        $name = $cat['name'];
        mysqli_close($connect);
        
    }else {
        
        // header("location:index.php?msg=no_edit");
    }
    ?>


<div class="container mt-5 ">
    <div class="row">
      <div class="col-5">
        <!-- form to update -->
        <form action="product_edit.php" class="form-signin" method="post">
          <h1 class="h3 mb-3 font-weight-normal mt-5">Edit New Category Name</h1>
          <label for="inputEmail" class="sr-only"> Add New Category name </label>
          <input type="text" value="<?=$name?>" name="name" id="inputEmail" class="form-control wow fadeInDown slow" placeholder="Enter new category name" autofocus>
          <input type="text" value="<?=$name_ar?>" name="name" id="inputEmail" class="form-control wow fadeInDown slow" placeholder="Enter new category name" autofocus>
          <input type="hidden" value="<?=$edit_id?>" name="id" class="form-control wow fadeInDown slow" >
          <button class="btn btn-md btn-primary btn wow fadeInUp slow mt-3" type="submit">Save Edit</button>
        </form>
      </div>

      <?php 
  
  require_once("footer.php");

?>