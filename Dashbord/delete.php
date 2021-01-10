<?php 

  require_once("header.php");

?>
    
    <title>Products Names</title>
  </head>
  <body>
  <div class="container mb-5">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top ">
      <a class="navbar-brand text-uppercase" href="index.php">Moustafa <span class="text-primary">Store</span></a>
      <button class="navbar-toggler hidden-md-up" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="peoducts.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Store</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link " href="delete.php">Deleted items</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>

    <!-- main Body Section -->
    <h1 class="text-center text-primary pt-5"> Welcome to Deleted items </h1>

    <?php 
    
    if(!empty ($_GET["id"])){

        $del_id = $_GET["id"];
        require_once("connection.php");
        $query = "delete from categories where id = $del_id";
        $rslt = mysqli_query($connect , $query);
        mysqli_close($connect);
        header("location:index.php?msg=deleted");
        
    }else {
        
        header("location:index.php?msg=no_delet");
    }
    ?>

<?php 
  
  require_once("footer.php");

?>