<?php
session_start();

include 'header.php';

?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <style>
      .product{
          font-weight:bold;
          font-size:25px;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
        <a class="navbar-brand" href="#">Cafeteria</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
                <a class="nav-link" href="#">Home </a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="product.php">Products </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Manual Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Checks</a>
            </li>
            
            </ul>

            <div class="form-inline my-2 my-lg-0">
            <p class="name-in-header"><?php echo $_SESSION['name']  ?></p>
            </div>
        </div>
    </div>
    </nav>                <!--   end of navbar -->
    <div class="container mt-5 mb-3">
        <div class="row ">
            <div class="col-6 ml-5 product" >All Products</div>
            <div class="col-3 py-3">
                <a href="addproduct.php"> Add Products</a>
            </div>
            <div class="col-3"></div>

        </div>
    </div>
 </body>
</html>
<?php
include('footer.php');
?>