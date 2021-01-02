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