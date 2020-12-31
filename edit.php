<?php  include('header.php'); ?>
<?php 


    include ('userClass.php');

 $user= new user();
 $user->database_con();
 $user->editUser();

    
?>

  
    
<?php  include('footer.php'); ?>

 
  