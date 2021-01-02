<?php
session_start();



include 'header.php';
include 'userClass.php';


$user= new user();
$user->database_con();


if(  isset( $_GET['quantity'] )  )
{
  
    
  var_dump($_GET['quantity'] );
    $productId = $_GET['productId'];
    $prdoctQuantity= $_GET['quantity'];

   

    $notes = $_GET['notes'];
    $roomId = $_GET['userRoom'];

    $productPrice = $_GET["productPrice"];
    $totalPrice = 0;

      
      for($eachProduct = 0; $eachProduct < count($productId); $eachProduct++){
        $totalPrice += $productPrice[$eachProduct] * $prdoctQuantity[$eachProduct];
    }
   
    // $_SESSION['user_id']
    
  

    try{

      $user->user_insert_usert($notes,$totalPrice,$roomId,$_SESSION['user_id'], $productId,$prdoctQuantity);
          
            header('location: homeUser.php');
         
       
    }
    catch(PDOException $exception){
          echo "Connection error: " . $exception->getMessage();
        
       }



}



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
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <!-- <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form> -->

    <div class="form-inline my-2 my-lg-0">
    

      <p class="name-in-header"><?php echo $_SESSION['name']  ?></p>
  </div>
  </div>
</nav>


<!-- products -->

<div class="container">

 <div class="row">
   <div class="col-sm-12 col-md-5 " >

   <form    method="GET"  id="order-form"  style='padding-top: 25px;'>
   <table class="table homeUser-products" id="bill">
   <?php


// if ( isset($_GET['action']) && $_GET['action']=="remove"){
     
//     // $check=in_array($_POST['id'],$_SESSION['b']);
   
//     //   if($check){
//     //     unset($_SESSION['b'][$_POST['id']]);
//     //   }

//     $key = array_search($_GET['id'],$_SESSION['b']);
//       if ($key !== false) {
//      unset( $_SESSION['b'][$_GET['id']]);
 
//       }

//     //   $key2 = array_search($_POST['id'],$_SESSION['shopping_cart']);
//     //     if ($key2 !== false) {
//     //    unset($_SESSION['shopping_cart'][$key2]);
      
//     //     }

//   if(!empty($_SESSION["shopping_cart"])) {
  
//       foreach($_SESSION["shopping_cart"] as $key => $value) {
     
      
//         $values = (array_values($_SESSION["shopping_cart"])[$key]);

//         // print_r(  (array_values($_SESSION["shopping_cart"])[$key]['id'])   );
       
//         if((array_values($_SESSION["shopping_cart"])[$key]['id']) ==$_GET["id"]){
//           unset( array_values($_SESSION["shopping_cart"])[$key]['id'] );
//             // print_r($_SESSION['shopping_cart']); 
            
//         }

//         // if($_POST["id"] == $key){
//         // unset($_SESSION["shopping_cart"][$key]);
//         // // $status = "<div class='box' style='color:red;'>
//         // // Product is removed from your cart!</div>";
//         // }
//         if(empty($_SESSION["shopping_cart"]))
//         unset($_SESSION["shopping_cart"]);
//         }
       
//   }
//   }
//   $totalprice=0;
  
// if(isset($_SESSION['shopping_cart'])){
//   foreach($_SESSION['shopping_cart'] as $key => $value) {
//     echo "<tr>  ";
//     echo "<td>"  . $value['name']."</td>";
//     echo "<td>" .'EGP  '.  $value['price']."</td>";
//     echo "<td> <input type='number' name='quantity' min='1' value='1' > </td>";
  
//    echo "<td> ";
//     echo "<input type='hidden' name='id' value=". $value['id'].">"; 
//     echo " <input type='hidden' name='action'  value='remove' />";
//     echo "<a  href=homeUser.php?action=remove&id=". $value["id"]. "class='remove'>delete</a>";
//     echo "</td>";
  
   
//     echo "</tr>";
//     if(empty($_POST['quantity'])){
//       $_POST['quantity']=0;
//     }
//     $totalprice+=$value['price']*$_POST['quantity'];
//     }
  
   
   
// }
// echo $totalprice;
echo "</table>";

echo '<div class="form-group">
    <h5><span class="badge badge-danger mb-2 mt-5" id="orderNotes"> Notes</span></h5>
    <textarea class="form-control col-8" id="exampleFormControlTextarea1" rows="3" name="notes"></textarea>
  </div>';


echo "<h5><span class='badge badge-danger mb-3'>Room Number</span></h5>";
$rows=$user->showRommsUser();


echo "<label for='edit-user-room'></label>
<select class='custom-select col-6' id='edit-user-room' name='userRoom' aria-describedby='validationServer04Feedback' required>
  <option disabled value=''>Choose...</option>";

       foreach($rows as $row){

            echo "<option value='".$row['roomId']."'>".$row['roomNo']."</option>";
       }

echo "</select>
<div id='validationServer04Feedback' class='invalid-feedback'>
  Please select a valid Room Number..
</div>";







  ?>

<div class="col-11 mt-3 align-items-end">Total Price <span class="badge badge-secondary totalPrice"></span>
</div>

<div class="col-6"><button type="submit" style='margin-bottom: 48px;' name='add-order' id="add-order" class="btn btn-warning col-6 mt-5">confirm</button></div>


</form>
   </div>

   <div class="col-sm-12 col-md-7 homeUser-products" >
      <div class="row">
      <?php



$rows=$user->showproductsUsert();

  foreach($rows as $row){
   $idprod=$row['prodId'];
    echo 
    "<div class='col-sm-3 one-product'>";
   echo "<input type='hidden' name='id' value=".$row['prodId']." />
    <div class='image ' ><p class='buy' id='".$row['prodId']."  width='100px' height='100px' >".$row['prodImg']."</p></div>
    <div class='name'>".$row['prodName']."</div>
    <div class='price'><span class='label'><span name='".$row['prodPrice']."'>".$row['prodPrice']." EGP</span></span></div>
 
    
    
    </div>";
        

}


 

?>
      </div>    
   </div>
 </div>
</div>



     
<?php
include('footer.php');
?>

<script type='text/javascript'>

$('.buy').click(function (){
            
           
                        var orderProducts = [];
                        $("#bill tr").each(function(){
                            orderProducts.push($(this).attr("id"));
                        })
                        if(orderProducts.includes($(this).attr('id'))){
                            alert("You have already added this item");
                        }else{
            
                            orderProducts.push($(this).attr('id'));
                            $.ajax({
                                type : 'GET',
                                url : "add-home-user.php",
                                data : 'id='+$(this).attr('id'),
                                success : function(response) {
                                $('#bill').append(response);
            
                    }
                 
                    });


                    var totalOrder = 0;
            $(".order-product-quantity-input").each(function(){
              totalOrder += $(".order-product-quantity-input").next().val() * $(".order-product-quantity-input").val();
              console.log($(".order-product-quantity-input").next().val());
              console.log($(".order-product-quantity-input").val());
            })
            $(".totalPrice").html(totalOrder +  " EGP");
            console.log( $(this).parent().parent().children('span :eq(2)').html() );
    }

    
	});


  $("#add-order").click(function(event){
        event.preventDefault();
        var count = 0;
        $(".rowParent").each(function(){
            count ++;
        })

        if(count > 0){
            $("#order-form").submit();
        }else{
            alert("No Products Selected");
        }

    });


    $(".order-product-quantity-input").on('input',function(){
            var totalPrice = parseInt($(this).next().val()) * $(this).val();
            $(".total-price").html(totalPrice  );
            console.log(totalPrice);


    });






  //       $('.buy').click(function (){

  //       $.ajax({
  //      type : 'GET',
	// 	   url : "add-home-user.php",
	// 	   data : 'id='+$(this).attr('id'),
	// 	  success : function(response) {
	// 		$('#bill').html(response);

  //       }
     
	// 	});
  // });

 
  </script>