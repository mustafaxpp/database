<?php 

  require_once("header.php");

?>


  <!-- Add item button -->
  <div class="container mt-5 ">
    <div class="row">
      <div class="col-5">
        <form action="peoducts.php" class="form-signin" method="post">
          <h1 class="h3 mb-3 font-weight-normal mt-5">Add New Category</h1>
          <?php
          if (!empty($_GET['msg']) && $_GET['msg'] == "done") {
          ?>
            <div class="alert alert-success" role="alert">
              <strong>Your item Added Succesfully</strong>
            </div>
          <?php
          }
          ?>
          <label for="inputEmail" class="sr-only"> Add Category name </label>
          <input type="text" name="productname" id="inputEmail" class="form-control wow fadeInDown slow mb-2" placeholder="Enter product name" autofocus>
          <input type="text" name="productnamear" id="inputEmail" class="form-control wow fadeInDown slow" placeholder="اسم المنتج باللغة العربية" autofocus>
          <?php

          if (!empty($_GET["error"]) && $_GET["error"] == "empty") {
          ?>
            <small class="mb-4 text-danger wow fadeInUp slow"> Category name required </small><br>

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
              <th>Category_Id</th>
              <th>Category_Name</th>
              <th>اسم الفئة</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

            <?php
            require_once("connection.php");
            $query = "select * from categories";
            $rslt = mysqli_query($connect, $query);
            while ($tabledata = mysqli_fetch_array($rslt)) {


            ?>
              <tr>
                <td class=""><?= $tabledata['id'] ?></td>
                <td class=""><?= $tabledata['name'] ?>
                <td class=""><?= $tabledata['name_ar'] ?>
                <?php
                $my_id = $tabledata['id'];
                if(!empty($_GET["msg"]) && $_GET["msg"] == "edit_done" && $_GET["id"] == "$my_id"){
                  ?>
                  <small class="text-danger"> This item Editied</small>
                  <?php
                }
                
                ?></td>
                <th class="">
                 
                    <!-- Button Edit item -->
                    <a href="edit.php?id=<?= $tabledata['id'] ?>" title="Edit <?= $tabledata['name'] ?>" class="btn btn-sm btn-success"> Edit </a>
                    
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
                            <a href="delete.php?id=<?= $tabledata['id'] ?>" type="submit" class="btn btn-danger"> Delete </a>
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