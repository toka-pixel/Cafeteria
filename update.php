<?php  
session_start();
include('header.php'); ?>

<?php 
include ('userClass.php');

 $user= new user();
 $user->database_con();
 $user->updateUser();
 ?>


 

    
<?php include('footer.php'); ?>

 
  