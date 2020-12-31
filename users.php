<?php
session_start();

include 'header.php';

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light ">
  <div class="container">
  <a class="navbar-brand" href="#">Cafeteria</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Products</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Users</a>
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
</nav>


<!-- users -->
<?php  
include ('userClass.php');

 $user= new user();
 $user->database_con();
 
 $user->addUser();
  $user->displayUser();


 ?>


<?php
include('footer.php');
?>