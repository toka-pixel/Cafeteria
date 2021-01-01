<?php
session_start();

include 'userClass.php';

$user= new user();
$user->database_con();

$addvalue=array();
if(isset($_GET['id'])){
    
    $id=$_GET['id'];
 
 
 
//     if(empty($addvalue)){
     
//       array_push($addvalue,$id);
//       print_r($addvalue);
  
//     }
//     else{

      
//       if(!in_array($id, $addvalue)){
//         array_push($addvalue,$id);

        $items=$user->specificproduct($id);

        
       

         foreach($items as $item){
   
          echo "<tr class='rowParent' id='".$item['prodId']."'>
          <td><input type='hidden' name='productId[]' value='".$item['prodId']."'></td>
          <td class='order-product-name'>".$item['prodName']."</td>
          <td class='order-product-quantity'>
          <input type='number' min='1' name='quantity[]' class='order-product-quantity-input' value='1'>
          <input type='hidden' class='hidden-price' name='productPrice[]' value='".$item['prodPrice']."'></td>
          <td class='order-product-total'><span class='total-price'>".$item['prodPrice']." EGP</span></td>
          <td class='order-product-delete'><img src='img/delete.png' style='width:17%' class='remove-product' id='".$item['prodId']."' ></a></td>
          </tr>";
      
            

         }
        
        // } 


     
      // }

    

   




  
      
  
        
  
  
    // $chartArray=array(
    //   $id=>array(
     
    //      'name'=>$name,
    //      'id'=>$id,
    //      'price'=>$price,
       
    //  ));
   
  
  
       
    //  if(empty($_SESSION['b'])){
  
    //   $_SESSION['b']=array();
    //   array_push($_SESSION['b'],$id);
  
    
    //  }
   
    //  if(empty($_SESSION['shopping_cart']) ){
              
               
             
    //             $_SESSION['shopping_cart']=$chartArray;
             
               
    //       }
        
    //        else{
            
    //           if(in_array($id,$_SESSION['b']))
    //                  {
                       
    //                  }
  
    //           else{
                   
                    
    //                 array_push($_SESSION['b'],$id);
                   
    //                 $_SESSION['shopping_cart']=array_merge($_SESSION['shopping_cart'],$chartArray);
                 
    //           }



    //       }      
  
         
    
    //    unset($_SESSION['shopping_cart']);
    //  unset($_SESSION['b']);
  


    // remove item from bill
  //   if ( isset($_GET['action']) && $_GET['action']=="remove"){
         

  //   $check=in_array($_GET['id'],$_SESSION['b']);
   
  //     if($check){
  //       unset($_SESSION['b'][$_GET['id']]);
  //     }

    
  // if(!empty($_SESSION["shopping_cart"])) {
  
  //     foreach($_SESSION["shopping_cart"] as $key => $value) {
     
      
  //       $values = (array_values($_SESSION["shopping_cart"])[$key]);

  //       if((array_values($_SESSION["shopping_cart"])[$key]['id']) ==$_GET["id"]){
  //         unset( array_values($_SESSION["shopping_cart"])[$key]['id'] );
          
            
  //       }

      
  //       if(empty($_SESSION["shopping_cart"]))
  //       unset($_SESSION["shopping_cart"]);
  //       }
       
  // }


  //   }
    


 


  
  
 

  

  //  echo    '<table class="table homeUser-products">';

    
  // if(isset($_SESSION['shopping_cart'])){
  //   foreach($_SESSION['shopping_cart'] as $key => $value) {
  //     echo "<tr>  ";
  //     echo "<td>"  . $value['name']."</td>";
  //     // echo "<td> " .'EGP  '.  $value['price']."</td>";
  //     echo "<td> " .'EGP  '.'<span class="quan">'.$value['price'] .'</span>'."</td>";
  //     echo "<td> <input type='number' class='inde' onclick='myfunction(this)' name='quantity' min='1' value='1' > </td>";
    
  //    echo "<td> ";
  //     echo "<input type='hidden' name='id' value=". $value['id'].">"; 
   
  //     echo "<a  action=remove&id=". $value["id"]. "class='remove'>delete</a>";
  //     echo "</td>";
    
     
  //     echo "</tr>";
  //     if(empty($_GET['quantity'])){
  //       $_GET['quantity']=0;
  //     }
  //   //   $totalprice+=$_GET['price']*$_GET['quantity'];
  //     }
    

  // } 
     
 
  // echo $totalprice;
        
     
// echo   "</table>";
    
}

?>
<script>

$(".order-product-quantity-input").change(function(){
            var totalProduct = $(this).next().val() * $(this).val();
            $(this).parent().next().children('span').html(totalProduct + " EGP");
            var totalOrder = 0;
            $(".order-product-quantity-input").each(function(){
              totalOrder += $(this).next().val() * $(this).val();
            })
            $(".totalPrice").html(totalOrder + " EGP");
          });



          $(".remove-product").click(function(){
            $(this).parent().parent().remove();
            var totalOrder = 0;
            $(".order-product-quantity-input").each(function(){
              totalOrder += $(this).next().val() * $(this).val();
            })
            $(".totalPrice").html(totalOrder + " EGP");

          });

// var x = document.getElementsByClassName("price");
//  function myfunction(e){
//   e.style.backgroundColor = "red";
//   var i;
// for (i = 0; i < x.length; i++) {
  
//   }
//  }


// document.getElementsByClassName("increase").addEventListener("click", function() {
//   document.getElementsByClassName("price").innerHTML = "Hello World";
// });
</script>

