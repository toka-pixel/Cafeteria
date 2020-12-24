<?php
session_start();

include 'header.php';

?>
<?php
if(!isset($_GET["id"]) or !is_numeric($_GET["id"]))
{
    header("location:product.php");
}
$id=$_GET["id"];
// echo $id;
include ('userClass.php');
$user= new user();
 $user->database_con();
 $selQry="select * from `products` where `prodId`=$id LIMIT 1" ;
 $stmt=$user->db->prepare($selQry);
 $stmt->execute();
 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
if($rows)
{
    foreach($rows as $row) {
    }
    
}
else
{
    header("location:product.php");  

}

?>
<h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About Product</h1>
<div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 offest-md-3">
                <form class="my-2 p-3 border" method="POST" action="<?php $_SERVER["PHP_SELF"]?>">
                    <div class="form-group">
                        <label for="exampleInputName1">ProductName</label>
                        <input type="text" name="productname" value="<?php echo $row['prodName']  ?>" class="form-control" id="exampleInputName1" >
                        <input type="hidden" value="<?php echo $id; ?>" name="productid" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName1">ProductPrice</label>
                        <input type="number" step="any" name="productprice" value="<?php echo $row['prodPrice']  ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Availabilty</label>
                        <input type="text" name="availlabilty" value="<?php echo $row['availibilty']  ?>"class="form-control" id="exampleInputPassword1">
                    </div>
                
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
        </div>
        <div class="col-md-3"></div>
</div>
<?php
if ($_POST){

 var_dump($_POST);
    $productname=$_POST['productname'];
    $productprice=$_POST['productprice'];
    $avail=$_POST['availlabilty'];
    $idprod=$_POST['productid'];

 $selQry=" update  `products` set `proName`=:sproductname,`prodPrice`=:sproductprice,`availibilty`=:savail where `prodId`=:sid " ;
 $stmt=$user->db->prepare($selQry);
 $stmt->bindParam(":sproductname",$productname);
 $stmt->bindParam(":sproductprice",$productprice);
 $stmt->bindParam(":savail",$avail);
 $stmt->bindParam(":sid",$idprod);
 $stmt->execute();
 $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
 var_dump($rows);
//  echo "hello update";
}
 

?>



<?php
include('footer.php');
?>