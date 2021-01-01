<?php
session_start();
    
include "config.php";





    if(  isset( $_GET['quantity'] )  )
    {
        
        
      
        $productId = $_GET['productId'];
        $prdoctQuantity= $_GET['quantity'];

       

        $notes = $_GET['notes'];
        $roomId = $_GET['userRoom'];

        $productPrice = $_GET["productPrice"];
        $totalPrice = 0;

          // Count Total Price
          for($eachProduct = 0; $eachProduct < count($productId); $eachProduct++){
            $totalPrice += $productPrice[$eachProduct] * $prdoctQuantity[$eachProduct];
        }
       
        // $_SESSION['user_id']
        
      

        try{

            // $db->beginTransaction();
            $instQry = "insert into orders (orderDate, status,notes, totalPrice, idAdmin) 
            values (now(), ?,?, ?, ?)";
            $instmt=$db->prepare($instQry);
         
            $res = $instmt->execute('Processing', $notes,  $totalPrice , 1);
           
          
          

            $selectProduct = "insert into ordroomuser (idOrder, idRoom, idUser) 
            values (LAST_INSERT_ID(), ?, ?)";
            $stmt = $db->prepare($selectProduct);

             $iid= $_SESSION['user_id'];
           
                $res = $stmt->execute($roomId,  $iid);
           

                for($eachProduct = 0; $eachProduct < count($productId); $eachProduct++){
                    $insertProducts = "insert into prodorders (idOrder, idProd, quantity) 
                    values ( LAST_INSERT_ID(),? , ?)";
                    $insertProductsStmt = $db->prepare($insertProducts);
                    $insertProductRes = $insertProductsStmt->execute( $productId[$eachProduct] ,$productQuantity[$eachProduct] );
                }
                // $db->commit();

              
                header('location: homeUser.php');
             
           
        }
        catch(PDOException $exception){
              echo "Connection error: " . $exception->getMessage();
            
           }



    }






?>