<?php  include('header.php'); ?>
<?php
if ($_POST){

    // var_dump($_POST);
       $productname=$_POST['productname'];
       $productprice=$_POST['productprice'];
       $avail=$_POST['availlabilty'];
       $idprod=$_POST['productid'];
       include ('userClass.php');

       $user= new user();
       $user->database_con();
   
    $selQry=" UPDATE `products` SET `prodName`='$productname',`prodPrice`='$productprice',`availibilty`='$avail' where `prodId`='$idprod' " ;
    $stmt=$user->db->prepare($selQry);
    // $stmt->bindParam(":sproductname",$productname);
    // $stmt->bindParam(":sproductprice",$productprice);
    // $stmt->bindParam(":savail",$avail);
    // $stmt->bindParam(":sid",$idprod);
    $result=$stmt->execute();
    // $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($rows);
    if($result)
    {
        $success = "Updated Successfully ";
        header("refresh:3;url=product.php");
    }
    echo '<h1 class="text-center col-12 bg-info py-3 text-white my-2">Updated Successfully</h1>';
   
   }
?>
<?php  include('footer.php'); ?>
<!-- class='table table-striped' style='text-align:center' -->
<!-- border='15' style='border: 5px solid #7878bb;text-align:center;align:center;width:900px;' -->