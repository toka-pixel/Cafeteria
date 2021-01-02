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
        <div class="row text-center">
            <div class="col product ml-4">Add Category</div>
        </div>
    </div> <!-- end add product --> 
    <div class="container my-4">
         <form class="needs-validation" novalidate method="post" action="" enctype="multipart/form-data">
           <div class="row mb-3 ">
           <div class="col-3">
               
               </div>
             <div class="col-3">
               <label>Id Category</label>
             </div>
             <div class="col-3">
               <input type="number" name="idcategory">
             </div>
             <div class="col-3">
               
             </div>
           </div>
           <div class="row mb-3 ">
           <div class="col-3">
               
               </div>
             <div class="col-3">
               <label>Name Category</label>
             </div>
             <div class="col-3">
               <input type="text" name="namecategory">
             </div>
             <div class="col-3">
               
             </div>
           </div>
           <div class="row my-3">
               <div class="col-5">
                  
               </div>
              <div class="col-5">
                  <button type="submit" class="btn btn-primary" >Submit</button>
               </div>
               <div class="col-2">
                  <!-- <button type="reset" class="btn btn-primary" >Reset</button> -->
               </div>
          </div>
        </form>
    </div>
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
         include ('userClass.php');
         $user= new user();
         $user->database_con();
         $user->addcategory();
       
      
      ?> 
 
<?php
include('footer.php');
?>