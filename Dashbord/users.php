<?php 

  require_once("header.php");

?>


  <!-- Add item button -->
  <div class="container mt-5 ">
    <div class="row">
      <div class="col-4">
        <form action="useradd.php" class="form-signin" method="post" enctype="multipart/form-data">
          <h1 class="h3 mb-3 font-weight-normal mt-5">Add User</h1>
          <?php
          if (!empty($_GET['msg']) && $_GET['msg'] == "done") {
          ?>
            <div class="alert alert-success" role="alert">
              <strong>Your item Added Succesfully</strong>
            </div>
          <?php
          }
          ?>
          <label for="inputEmail" class="sr-only"> Add User </label>
          <label for="logo" class=" wow fadeInDown slow">insert User name</label>
          <input type="text" name="uname" id="inputEmail" class="form-control wow fadeInDown slow mb-2" placeholder="Enter User Name" autofocus>
          <input type="email" name="uemail" id="inputEmail" class="form-control wow fadeInDown slow mb-2" placeholder="Enter User Email" autofocus>
          <input type="number" name="mobile" id="inputEmail" class="form-control wow fadeInDown slow mb-2" placeholder="Enter User mobile" autofocus>
          <label for="logo" class=" wow fadeInDown slow">insert User role</label>
          <select name="role" id="" class="form-control wow fadeInDown slow mb-2">
            <option value=""></option>
              <option value="admin">Admin</option>
              <option value="seller">Seller</option>
              <option value="user">User</option>
          </select>
          <div class="form-group wow fadeInDown slow">
                    <label for="logo" class=" wow fadeInDown slow">insert user photo</label>
                    <input type="file" name="logo" class="form-control">
          </div>
         <?php

          if (!empty($_GET["error"]) && $_GET["error"] == "empty") {
          ?>
            <small class="mb-4 text-danger wow fadeInUp slow"> brand name required </small><br>

          <?php
          }

          ?>
          <button class="btn btn-md btn-primary btn wow fadeInUp slow mt-3" type="submit">Save</button>
        </form>
      </div>
      <div class="col mt-5">
        <?php 
        
        if(!empty($_GET["msg"]) && $_GET["msg"] == "edit_done" )
        {

          
          ?>
          <div class="alert alert-success" role="alert">
            <strong>Yout item Edited Succesfully</strong>
          </div>
          
          <?php
        }
        ?>
                <?php 
        
        if(!empty($_GET["msg"]) && $_GET["msg"] == "error_editing" )
        {

          
          ?>
          <div class="alert alert-success" role="alert">
            <strong>You Are Not <b class="text-uppercase">Admin</b> to Delete this item</strong>
          </div>
          
          <?php
        }
        ?>
        <table class="table mt-4 table-hover">
          <thead>
            <tr>
              <th>id</th>
              <th>photo</th>
              <th>email</th>
              <th>name</th>
              <th>mobile</th>
              <th>role</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php
            require_once("connection.php");
            $query = "select * from users";
            $rslt = mysqli_query($connect, $query);
            while ($tabledata = mysqli_fetch_array($rslt)) {


            ?>
              <tr>
                <td class=""><?= $tabledata['id'] ?></td>
                <td class=""><img src="<?= $tabledata['photo'] ?>" width="60" ></td>
                <td class=""><?= $tabledata['email'] ?></td>
                <td class=""><?= $tabledata['name'] ?></td>
                <td class=""><?= $tabledata['mobile'] ?></td>
                <td class=""><?= $tabledata['role'] ?></td>
                <?php
                $my_id=$tabledata['id'];
                if(!empty($_GET["msg"]) && $_GET["msg"] == "edit_done" && $_GET["id"] == "$my_id"){
                  ?>
                  <?php
                }
                
                ?></td>
                <th class="">
                 
                    <!-- Button Edit item -->
                    <a href="edituser.php?id=<?= $tabledata['id'] ?>" title="Edit <?= $tabledata['name'] ?>" class="btn btn-sm btn-success"> Edit </a>
                    
                    <!-- Button Remove item -->
                    <button type="button" title="Delete <?= $tabledata['name'] ?>" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#del<?= $tabledata['id'] ?>">
                      X
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del<?= $tabledata['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deleting item</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div href="" class="modal-body btn btn-sm btn-danger">
                            Are you Sure You Want Delete <b><?= $tabledata['name'] ?></b> ?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a href="deleteuser.php?id=<?= $tabledata['id'] ?>" type="submit" class="btn btn-danger"> Delete </a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </a>
                </th>


              <?php
            }
            mysqli_close($connect);

              ?>

          </tbody>
          <?php
          if (!empty($_GET["msg"]) && $_GET["msg"] == "deleted") {
          ?>
            <div class="alert alert-success" role="alert">
              <strong>Item Deleted</strong>
            </div>
          <?php

          }
          ?> 
          <?php
          if (!empty($_GET["msg"]) && $_GET["msg"] == "add_ok") {
          ?>
            <div class="alert alert-success" role="alert">
              <strong>User Account Created And We send To the E-mail Your <b>password</b></strong>
            </div>
          <?php

          }
          ?>
        </table>
      </div>
    </div>
  </div>
  <?php

  if (!empty($_GET["msg"]) && $_GET["msg"] == "no_delet") {
  ?>

    <div class="container">
      <div class="text-danger text-center mt-5">
        <h2 class="mt-5 wow animate__jello slow">
          you are not <b class="text-uppercase">admin</b> to open this page .
        </h2>
      </div>
    </div>

  <?php
  }

  ?>

  <?php 
  
    require_once("footer.php");
  
  ?>