<<<<<<< HEAD
<?php
  

//   $key = array_search($_POST['id'],$_SESSION['shopping_cart']);
//   if ($key !== false) {
//  unset($_SESSION['shopping_cart'][$key]);

//   }
 

     
  
?>
=======
<?php  include 'header.php';
 ?>

<?php 

    
    
   
    include ('userClass.php');

 $user= new user();
 $user->database_con();
      // $stmt=$this->db->prepare($selQry);

     
$user->deleteUser();
    



?>



   
  
   
<?php  include('footer.php'); ?>
>>>>>>> 8b55c7597ba5abcbf352e5c53a867c25ba5ca925
