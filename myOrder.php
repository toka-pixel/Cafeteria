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
        <a class="nav-link" href="myOrder.php">My orders</a>
      </li>
     
    </ul>
   

    <div class="form-inline my-2 my-lg-0">
    

      <p class="name-in-header"><?php echo $_SESSION['name']  ?></p>

  </div>
  </div>
</nav>
<?php 
include ('userClass.php');

 $user= new user();
 $user->database_con();
 $user->myOrders();
  $user->displayOrder();
 ?>


<?php
include('footer.php');
?>