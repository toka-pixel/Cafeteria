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
      .stycat{
          width:180px;
      }
    </style>
  </head>
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
                <a class="nav-link" href="users.php">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Manual Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="checks.php">Checks</a>
            </li>
            
            </ul>

            <div class="form-inline my-2 my-lg-0">
            <p class="name-in-header"><?php echo $_SESSION['name']  ?></p>
            </div>
        </div>
    </div>
    </nav>   <!-- end navbar -->  
    <div class="container mt-4 ">
        <div class="row">
            <div class="col product ml-4">Add Product</div>
        </div>
    </div> <!-- end add product -->
    <div class="container my-4">
         <form class="needs-validation" novalidate method="post" action="product.php" enctype="multipart/form-data">
           <div class="row mb-3 ">
             <div class="col-4">
               <label>Product</label>
             </div>
             <div class="col-4">
               <input type="text" name="product">
             </div>
             <div class="col-4">
               
             </div>
           </div>
           <div class="row mb-3">
            <div class="col-4">
              <label>Price</label>
            </div>
            <div class="col-2">
              <input type="number" step="any" name="price">
            </div>
            <div class="col-2">
              <p>EGP</p>
            </div>
            <div class="col-4">
              
            </div>

          </div>
          <div class="row mb-3">
            <div class="col-4">
            <label for="exampleFormControlSelect1">Category</label>
            </div>
            <div class="col-2 ">
              <select class="stycat" id="" name="category" >
                <option selected>Choose...</option>
                <option value="Hot Drinks">Hot Drinks</option>
                <option value="Cold Drinks">Cold Drinks</option>
              </select>
            </div>
            <div class="col ">
                <a href="addcategory.php">Add Category</a>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <label>Product Picture</label>
            </div>
            <div class="col">
              <input type="file" name="picture">
            </div>
          </div>
          <div class="row">
               <div class="col-1">
                  
               </div>
              <div class="col-1">
                  <button type="submit" class="btn btn-primary" >Save</button>
               </div>
               <div class="col-2">
                  <button type="reset" class="btn btn-primary" >Reset</button>
               </div>
          </div>
         </form>
      </div>
       <?php
        //  include ('userClass.php');
        //  $user= new user();
        //  $user->database_con();
        //  var_dump($_post);
      
      ?> 
          <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
          </script>
 </body>
</html>
<?php
include('footer.php');
?>