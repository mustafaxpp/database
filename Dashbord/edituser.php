<?php 
  session_start();
  require_once("header.php");

?>


    <!-- main Body Section -->
    <div class="container pt-5">
    <h1 class="text-center text-primary pt-5"> Welcome to Edited users </h1>
    </div>

    <?php 
    
    if(!empty ($_GET["id"])){
        $edit_id = $_GET["id"];
        require_once("connection.php");
        $query = "select * from users where id = $edit_id";
        $rslt = mysqli_query($connect , $query);
        if($user_info = mysqli_fetch_assoc($rslt)){
          $email = $user_info["email"];
          $name = $user_info["name"];
          $mobile = $user_info["mobile"];
          $role = $user_info["role"];
          $logo = $user_info["photo"];
          $_SESSION["user"] = $user_info;
        }
        
    }
    ?>


<div class="container mt-2 ">
    <div class="row">
      <div class="col-5">
        <!-- form to update -->
        <form action="updateuser.php" class="form-signin" method="post" enctype="multipart/form-data">
          <h1 class="h3 mb-3 font-weight-normal mt-2">Edit New user Name</h1>
          <label for="inputEmail" class="sr-only"> Add User </label>
          <label for="logo" class=" wow fadeInDown slow">insert the new User Name</label>
          <input type="text" name="uname" value="<?=$name?>" id="inputEmail" class="form-control wow fadeInDown slow mb-2" placeholder="Enter New User Name" autofocus>
          <input type="email" name="uemail" value="<?=$email?>" id="inputEmail" class="form-control wow fadeInDown slow mb-2" placeholder="Enter New User Email" autofocus>
          <input type="number" name="mobile" value="<?=$mobile?>" id="inputEmail" class="form-control wow fadeInDown slow mb-2" placeholder="Enter New User mobile" autofocus>
          <select name="role" value="<?=$role?>" class="form-control wow fadeInDown slow mb-2">
              <option value="admin">Admin</option>
              <option value="seller">Seller</option>
              <option value="user">user</option>
          </select>
          <div class="form-group wow fadeInDown slow">
                    <label for="logo" class=" wow fadeInDown slow">insert user new photo</label>
                    <input type="file" name="logo" class="form-control">
          </div>
          <button class="btn btn-md btn-primary btn wow fadeInUp slow mt-3" type="submit">Save Edit</button>
        </form>
        
      </div>
      <div class="col-4 text-center mt-5">
          <div class="row">
            <div class="col-4"></div>
            <div class="col-4 mt-5">
            <img src="<?= $logo ?>" alt="">
            </div>
            <div class="col-4"></div>
          </div>
      </div>
    </div>
  </div>
      

      <?php 
  
  require_once("footer.php");

?>