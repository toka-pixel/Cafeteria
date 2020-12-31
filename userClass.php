<?php
  class user{

    public $db;
    // public $data=array();


    function  __constructor(){
        $this->db=$db;
    }


    // connect to database
    function database_con(){
        // connection toka and esraa
        // $dsn="mysql:dbname=cafeteria;dbhost=127.0.0.1;dbport=3306";
        //  Define("DB_USER","root");
        //  Define("DB_PASS","");
        // connection eman
        $dsn="mysql:dbname=cafeteria;dbhost=127.0.0.1;dbport=3306";
         Define("DB_USER","root");
         Define("DB_PASS","");

         $this->db= new PDO($dsn,DB_USER,DB_PASS);
 
         try{
             return  true;
         }
         catch(PDOException $exception){
             die('ERROR: ' . $exception->getMessage());
         }
 
       }


      //  forgot password
       function forgotPassword($name,$pass){ 
          
        $selQry="UPDATE user SET `userPass`=:spass  WHERE `userName`=:sname";
       
        $stmt=$this->db->prepare($selQry);

        $stmt->bindParam(":sname",$name);
       $stmt->bindParam(":spass",$pass);

       $stmt->execute();
       $count=$stmt->rowCount();
       
       if($count==1){
        return true;
      }

      else{
       return false;
      }
        

       }


      //  get user id

      function userid($name,$pass){

        $selQry="select userId from user where `userName`=:sname and `userPass`=:spass ";
        $stmt=$this->db->prepare($selQry);

        $stmt->bindParam(":sname",$name);
       $stmt->bindParam(":spass",$pass);

       $stmt->execute();
      
        return  $stmt->fetchColumn();
      
        
       }



      //  check login user is exit
       function login($name,$pass){

        $selQry="select * from user where `userName`=:sname and `userPass`=:spass ";
        $stmt=$this->db->prepare($selQry);

        $stmt->bindParam(":sname",$name);
       $stmt->bindParam(":spass",$pass);

       $stmt->execute();
       $count=$stmt->rowCount();

       if($count==1){
         return true;
       }

       else{
        return false;
       }
      
        
       }

      //  select img user

      function imguser($name,$pass){
        $selQry="select userimg from user where `userName`=:sname and `userPass`=:spass ";
        $stmt=$this->db->prepare($selQry);

        $stmt->bindParam(":sname",$name);
       $stmt->bindParam(":spass",$pass);
       $stmt->execute();

       $items=$stmt->fetchAll(PDO::FETCH_ASSOC);

      return   $items['userimg'];
      }
<<<<<<< HEAD
    


      // show products in home user

      function showproducts(){
        $data=array();
        $selectQry='select * from products';
        $selectstmt=$this->db->prepare($selectQry);
        $selectstmt->execute();
        $rows=$selectstmt->fetchAll(PDO::FETCH_ASSOC);

        

         $data=$rows;

        return $data;
      }
       


      function showRommsUser(){
        $data=array();
        $selectQry='select * from room';
        $selectstmt=$this->db->prepare($selectQry);
        $selectstmt->execute();
        $rows=$selectstmt->fetchAll(PDO::FETCH_ASSOC);

        

         $data=$rows;

        return $data;
      }


      // return specific product in home user

      function specificproduct($id){


               $selQry="select * from products where `prodId`=:sid";
               $stmt=$this->db->prepare($selQry);
               $stmt->bindParam(":sid",$id);
               $stmt->execute();
               $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
               $num = $stmt->rowCount();
         
        if($num==1) 
        {
           return $items;
          return true;
        }
       

       
      }


      function get_room_in_check_box(){
        $data=array();
        $selectQry='select roomNo from room';
        $selectstmt=$this->db->prepare($selectQry);
        $selectstmt->execute();
        $rows=$selectstmt->fetchAll(PDO::FETCH_ASSOC);

        

         $data=$rows;

        return $data;
      }




      // get all ids of products

      function all_ids_products(){
        $data=array();
        $selectQry='select prodId from products';
        $selectstmt=$this->db->prepare($selectQry);
        $selectstmt->execute();
        $rows=$selectstmt->fetchAll(PDO::FETCH_ASSOC);

        

         $data=$rows;

        return $data;
      }
=======
      /////////////////////////////////////////////////////////////////////////////////////////
      function addUser()
      {
        if(isset($_POST['Name']))
        {
        $upfile=$_FILES['picture'];
       
       $filename= $upfile["name"];
       
       $userName= $_REQUEST["Name"];
       // echo "<hr>";
       // print_r($userName) ;
        $userEmail= $_REQUEST["email"];
       $userPass= $_REQUEST["password"];
       $userRoom= $_REQUEST["room"];
       $userExt= $_REQUEST["ext"];
       $myImg="<img src=img/".$filename." height='50px' width='50px'/>";
       $selQry="Insert into `user`(`userName`,`userEmail`,`userPass`,`roomNumber`,`userImg`,`idRoom`,`ext`) values (:sname,:semail,:spassword,:roomNo,:img,1,:ext)";
      $stmt=$this->db->prepare($selQry);

        $stmt->bindParam(":semail",$userEmail);
        $stmt->bindParam(":spassword",$userPass);
        $stmt->bindParam(":sname",$userName);
       $stmt->bindParam(":roomNo",$userRoom);
        $stmt->bindParam(":ext",$userExt);
        $stmt->bindParam(":img",$myImg);
         $stmt->execute();
        
       } 
      }
      ///////////////////////////////////////////////////////////////////////////////////////////
      public function editUser()
      {
        $id = $_GET['id'];
        // echo $id;
         if(!isset($_GET['id']) or !is_numeric($_GET['id']))
    {
        header("Location:users.php");
    }
    $selQry="SELECT * FROM `user` WHERE `userId`='$id' ";
    // echo $selQry;
      $stmt=$this->db->prepare($selQry);
>>>>>>> 8b55c7597ba5abcbf352e5c53a867c25ba5ca925

    $result = $stmt->execute();
    
    $row=$stmt->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($row) ;
    // echo ($row[0]["userName"]);
    
    
     if(!$row)
    {
        header("Location:users.php");
      
    }
    
    echo "<h1 class='text-center col-12 bg-success py-3 text-white my-2'>Edit Info About User</h1>
    <div class='col-md-6 offset-md-3'>
        <form class='my-2 p-3 border' method='POST' action='update.php'>
            <div class='form-group'>
                <label for='exampleInputName1'>Full Name</label>
                <input type='text' name='name' value='".$row[0]['userName']."' class='form-control' 
                id='exampleInputName1 '>
                <input type='hidden' value='".$id."' name='id' />
            </div>
            <div class='form-group'>
                <label for='exampleInputName1'>Email address</label>
                <input type='email' name='email' value='".$row[0]['userEmail']."' class='form-control' 
                id='exampleInputEmail1' aria-describedby='emailHelp'>
            </div>
            <div class='form-group'>
                <label for='exampleInputPassword1'>Password</label>
                <input type='password' name='password' class='form-control' id='exampleInputPassword1'>
            </div>
            <div class='form-group'>
                <label for='room'>room no.</label>
    <select id='room' class='form-control' required='' name='room'>
      <option disabled='' selected=''>select room no.</option>
      <option>5</option>
      <option>44</option>
      <option>445</option>
    </select>
            </div>
            <div class='form-group'>
                <label for='exampleInputroom'>Ext.</label>
                <input type='number' name='ext' value='".$row[0]['ext']."' class='form-control' 
                id='exampleInputroom' >
            </div>
           
                
           
         
            <button type='submit' class='btn btn-success' name='submit'>Update</button>
        </form>
    </div>";
      }
     //////////////////////////////////////////////////////////////////////////////////////////
      public function updateUser()
      {
       
        if(isset($_POST['submit']))
        {
            $name =     $_POST['name'];
            $email =    $_POST['email'];
            $roomNo=$_POST['room'];

            $ext=$_POST['ext'];

           
                  
                        $id = $_POST['id'];
                        $password = $_POST['password'];
                        if($password)
                        {
                            $password = $_POST['password'];
                            

                            $sql = "UPDATE `user` SET  `userName`='$name' ,`userEmail`='$email',
                           `userPass`='$password',`ext`= '$ext',`roomNumber`='$roomNo'

                            WHERE `userId`='$id' ";

                        }   
                        else 
                        {
                            $sql = "UPDATE `user` SET  `userName`='$name' ,`userEmail`='$email',`ext`= '$ext',`roomNumber`='$roomNo'
                            
                            WHERE `userId`='$id' ";
                        }
                        $stmt=$this->db->prepare($sql);

                        $result = $stmt->execute();

                       

                        if($result)
                        {
                            $success = "Updated Successfully ";
                            header("refresh:1;url=users.php");
                        }
                    
                
            
        }
         echo '<h1 class="text-center col-12 bg-info py-3 text-white my-2">Updated Successfully</h1>';

       

      }
      //////////////////////////////////////////////////////////////////////////////////////////
       function displayUser()
      {
        

        $selQry="select * from user";
      $stmt=$this->db->prepare($selQry);

      // $stmt->bindParam(":sname",$name);
     // $stmt->bindParam(":spass",$pass);

     $stmt->execute();
     $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);   #stmt fetch
        
        // print_r($rows);
        // echo "<br>";
        echo'<h1 class="text-center col-12 bg-info py-3 text-white my-2"> All Users</h1>';
        echo("<a style='margin-left:1200px;margin-bottom:10px' type='button' class='btn btn-primary btn-lg' href='addUser.html'>add user</a>");
        echo "<table class='table table-striped' style='text-align:center'> <tr> 
                        
                        <th>
                            Profile Picture
                        </th>
                          <th>
                            Name
                        </th>
                          <th>
                            room no.
                        </th>
                        </th>
                          
                        
                        <th>
                            ext.
                        </th>
                        
                        <th>
                            Action
                        </th>
                    </tr>";
       foreach($rows as $row) {

           echo "<tr> 
               <td style='margin-top:20px'>" . $row["userImg"] . "</td>" .
               "<td>" . $row["userName"] . "</td>" .
               "<td>" . $row["roomNumber"] . "</td>" .
               
          
               "<td>".$row["ext"]. "</td>
                <td>
                            <a class='btn btn-danger' href='delete.php?id=".$row['userId']." '> Delete<i class='fa fa-close'></i> </a>
                            <a class='btn btn-success' href='edit.php?id=".$row['userId']." '> Edit<i class='fa fa-close'></i> </a>
                        </td>
               </tr>";
               

       }
       echo "</table>";
      }
      ////////////////////////////////////////////////////////////////////////////////////////////
      public function deleteUser()
      {
        $id = $_GET['id'];
         if(!isset($_GET['id']) or !is_numeric($_GET['id']))
    {
        header("Location:users.php");
    }
    $selQry="SELECT * FROM `user`  WHERE `userId`='$id' LIMIT 1 ";
      $stmt=$this->db->prepare($selQry);

    $result =  $stmt->execute();
    $check = mysqli_num_rows($result);
     if(!$check)
    {
        header("Location:users.php");
    }
    $sql1="DELETE FROM ordroomuser WHERE `idUser`='$id'";
    $sql2 = "DELETE FROM `user` WHERE `userId`='$id' ";
    $stmt1=$this->db->prepare($sql1);
    $stmt1->execute();
    $stmt=$this->db->prepare($sql2);
    $stmt->execute();
    echo'<h1 class="text-center col-12 bg-danger py-3 text-white my-2"> User  Have Been Deleted </h1>';
     header("refresh:3;url=users.php"); 
      }
      ///////////////////////////////////////////////////////////////////////////////////////////
      public function selectUserNames()
      {
         $selQry="select userName,userId from user";
      $stmt=$this->db->prepare($selQry);
     $stmt->execute();
     $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);   #stmt fetch
        
        // print_r($rows);
        echo "<form method='post' action='".$_SERVER['PHP_SELF']."'><select class='custom-select' style='width:300px;margin:30px;margin-left:520px;' name='UName'><option selected disabled>select user Name</option>";
        foreach($rows as $row) {
          
          echo "<option value='".$row["userId"]."'>".$row["userName"]."</option>";

          
        }
        echo "</select><br><input style='margin-left:50px;' type='date' name='start'><input style='margin:0 15px;' type='date' name='end'><button type='submit' class='btn btn-primary'>display</button></form><br>";
        // echo("<input type='datetime-local' name='start'><input type='datetime-local' name='end'>");
        // echo $_POST['UName'];
      }
      ///////////////////////////////////////////////////////////////////////////////////////////////
      public function displayOrderHistory()
      {
        if(isset($_POST['UName'])){
        $UName=$_POST['UName'];
        $selQry1="select userName from user where userId=$UName";
      $stmt1=$this->db->prepare($selQry1);
     $result1=$stmt1->execute();
     $rowss=$stmt1->fetchAll(PDO::FETCH_ASSOC);
     
        if(isset($_POST['start'])&&isset($_POST['end'])&&!empty($_POST['start'])&&!empty($_POST['end'])){
        
        $sql2 = "SELECT DISTINCT `orderDate`,`totalPrice` FROM `orders`,`ordroomuser` WHERE `idUser`=$UName and `orderDate` >= '".$_POST['start']."' and `orderDate` <= '".$_POST['end']. "'";
    

      }
       else{$sql2 = "SELECT DISTINCT `orderDate`,`totalPrice` FROM `orders`,`ordroomuser` WHERE `idUser`=$UName";
    }
        $stmt=$this->db->prepare($sql2);
     $result=$stmt->execute();
     // var_dump($result);
     $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
     // var_dump($items);
    echo "<center><b><span style='color:#007bff'>Checks for:</span> ".$rowss[0]["userName"]."<br><span style='color:#007bff'>From: </span>".$_POST['start']."<span style='color:#007bff'>TO: </span>".$_POST['end']."</p></center><table class='table table-striped' style='text-align:center'> <tr> 
                        
                        <th>
                            Order Date
                        </th>
                          <th>
                           Amount
                        </th>
                          
                    </tr>";
       
       
   
        }else{
          $sql2 = "SELECT DISTINCT `orderDate`,`totalPrice` FROM `orders`";
     $stmt=$this->db->prepare($sql2);
     $result=$stmt->execute();
     // var_dump($result);
     $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
      // var_dump($items);
     
      echo "<center style='color:#007bff;font-size:20px;margin-bottom:8px;'><b>Checks for all Users</b></center><table class='table table-striped' style='text-align:center'> <tr> 
                        
                        <th>
                            Order Date
                        </th>
                          <th>
                           Amount
                        </th>
                          
                    </tr>";
       
        }
        foreach($items as $row) {

           echo "<tr> 
               <td style='margin-top:20px'>" . $row["orderDate"] . "</td>" .
               "<td>" . $row["totalPrice"] . " "."<b>EGP</b></td></tr>" ;     

       }
       echo "</table>";
      }
      ///////////////////////////////////////////////////////////////////////////////////////////////
      public function myOrders()
      {
        echo'<h1 class="text-center col-12 bg-primary py-3 text-white my-2"> My Orders </h1>';
       echo "<form method='post' action='".$_SERVER['PHP_SELF']."'><input style='margin-left:50px;margin-top:30px;' type='date' name='start'><input style='margin:0 15px;' type='date' name='end'><button type='submit' class='btn btn-primary'>display</button></form>";
       $usName= $_SESSION['name'];

       $pass= $_SESSION['password'];
      
       // echo $usName.$pass;
       
       

       if((isset($_POST['start'])&&isset($_POST['end']))&&(!empty($_POST['start'])&&!empty($_POST['end']))){
         $sDate=$_POST['start'];
       $eDate=$_POST['end'];
       
        $selQry="SELECT `orderId`,`orderDate`,`status`,`totalPrice` FROM `orders` WHERE `orderDate` >=:sDate 
        and `orderDate` <=:eDate and `orderId` IN (SELECT `idOrder` FROM ordroomuser 
      WHERE `idUser`=(select `userId` from user where `userName`=:sname and `userPass`=:spass))";
       
      $stmt=$this->db->prepare($selQry);
      

      $stmt->bindParam(":sname",$usName);
     $stmt->bindParam(":spass",$pass);
     $stmt->bindParam(":sDate",$sDate);
     $stmt->bindParam(":eDate",$eDate);
      $result=$stmt->execute();
     // echo $result;
     $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
       // var_dump($items);
     //totalprice
$selQry2="SELECT sum(`totalPrice`) AS `Total` FROM `orders` WHERE `orderDate` >=:sDate 
        and `orderDate` <=:eDate and `orderId` IN (SELECT `idOrder` FROM ordroomuser 
      WHERE `idUser`=(select `userId` from user where `userName`=:sname and `userPass`=:spass))";

     $stmt2=$this->db->prepare($selQry2);
      $stmt2->bindParam(":sname",$usName);
     $stmt2->bindParam(":spass",$pass);
     $stmt2->bindParam(":sDate",$sDate);
     $stmt2->bindParam(":eDate",$eDate);
     $stmt2->execute();
     // echo $result;
     $item=$stmt2->fetchAll(PDO::FETCH_ASSOC);

       echo "<center><b><span style='color:#007bff;font-size:20px'>My Orders</span><br><span style='color:#007bff'>From: </span>".$_POST['start']."<span style='color:#007bff'>TO: </span>".$eDate."</p></center>";
      

       }else{
       $selQry="SELECT `orderId` ,`orderDate`,`status`,`totalPrice` FROM `orders` WHERE `orderId` IN (SELECT `idOrder` FROM ordroomuser 
      WHERE `idUser`=(select `userId` from user where `userName`=:sname and `userPass`=:spass))";
       $selQry2="SELECT sum(`totalPrice`) AS `Total` FROM `orders` WHERE `orderId` IN (SELECT `idOrder` FROM ordroomuser 
      WHERE `idUser`=(select `userId` from user where `userName`=:sname and `userPass`=:spass))";
      $stmt=$this->db->prepare($selQry);

      $stmt->bindParam(":sname",$usName);
     $stmt->bindParam(":spass",$pass);

     $result=$stmt->execute();
     $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
       // var_dump($items);
     //totalPrice
     $stmt2=$this->db->prepare($selQry2);
      $stmt2->bindParam(":sname",$usName);
     $stmt2->bindParam(":spass",$pass);
     $result=$stmt2->execute();
     $item=$stmt2->fetchAll(PDO::FETCH_ASSOC);
       
       echo "<center style='color:#007bff;font-size:20px;margin-bottom:8px;'><b>My Orders</b></center>";
       
       }
       echo "<table class='table table-striped' style='text-align:center'> <tr> 
                        
                        <th>
                            Order Date
                        </th>
                        <th>
                            Status
                        </th>
                          <th>
                           Amount
                        </th>
                        <th>
                           Actions
                        </th>
                          
                    </tr>";
       foreach($items as $row) {

           echo "<tr> 
               <td style='margin-top:20px'>" . $row["orderDate"] . "</td><td>" . $row["status"] . "</td>" .
               "<td>" . $row["totalPrice"] . " "."<b>EGP</b></td>
               <td>";
               if($row["status"]=='processing'){
               echo "<a class='btn btn-danger' href='cancelOrder.php?id=".$row['orderId']." '> Cancel<i class='fa fa-close'></i> </a>";}
            echo "<a style='margin-left:20px;' onclick='cc()' class='btn btn-success' href='myOrder.php?id2=".$row['orderId']." '> Display<i class='fa fa-close'></i> </a></td></tr>" ;     

       }
       echo "</table>";
       if(isset($item)){
       echo("<div style='width:500px;margin-left:100px;'><span style='font-size:20px;font-weight:bold;color:red;'>Total=</span>"." ".$item[0]["Total"]." "."<b>EGP</b></div>");}
        
      }
      ///////////////////////////////////////////////////////////////////////////////////////
      function displayOrder()
       {
        if(isset($_GET['id2'])){
         $ss=$_GET['id2'];
         echo $ss;
        }
       }
      //////////////////////////////////////////////////////////////////////////////////////////////////
      public function CancelOrder()
      {
        
        $id = $_GET['id'];
        
         if(!isset($_GET['id']) or !is_numeric($_GET['id']))
    {
        header("Location:myOrder.php");
    }
    $selQry="SELECT * FROM `orders`  WHERE `orderId`='$id' LIMIT 1 ";
      $stmt=$this->db->prepare($selQry);

    $result =  $stmt->execute();
     
     if(!$result)
    {
        header("Location:myOrder.php");
    }
    $sql3="DELETE FROM `prodorders` WHERE `idOrder`='$id'";
    $sql1="DELETE FROM ordroomuser WHERE `idOrder`='$id'";
    $sql2 = "DELETE FROM `orders` WHERE `orderId`='$id' ";
    // echo $sql2;
    $stmt3=$this->db->prepare($sql3);
    $stmt1=$this->db->prepare($sql1);
    $stmt2=$this->db->prepare($sql2);
    $stmt3->execute();
    $stmt1->execute();
    $stmt2->execute();
    // echo $res;
    echo'<h1 class="text-center col-12 bg-danger py-3 text-white my-2"> Order Canceled </h1>';
     header("refresh:1;url=myOrder.php"); 
      }

      //////////////////////////////////////////////////////////////////////////////////////////////////
    
     //  check login for admin is exit
     function loginAdmin($name,$pass){

      $selQry="select * from admin where `adminName`=:sname and `adminPass`=:spass ";
      $stmt=$this->db->prepare($selQry);

      $stmt->bindParam(":sname",$name);
      $stmt->bindParam(":spass",$pass);

     $stmt->execute();
     $count=$stmt->rowCount();

     if($count==1){
       return true;
     }

     else{
      return false;
     }
    
      
     }
     

     /////////////////product//////////////
     ///////////add product////////////
     function addproduct()
     {
       
      if(isset($_POST['product']))
      {
        // var_dump($_POST);
        $upfile=$_FILES['picture'];
        $filename=$upfile['name'];
        // $myImg="<img src="img/".$filename." height='100px' width='100px'/>";
        $myImg="<img src=img/".$filename." height='100px' width='100px'/>";
        
        $productname=$_POST['product'];
        $productprice=$_POST['price'];
 
        $selqry="insert into `products`(`prodName`,`prodPrice`,`prodImg`,`idCat`)values (:sproduct,:sprice,:simg,1)";
        $stmt=$this->db->prepare($selqry);
        $stmt->bindParam(":sproduct",$productname);
        $stmt->bindParam(":sprice",$productprice);
        $stmt->bindParam(":simg",$myImg);
        $stmt->execute();
      }

     }
     //////////////////display products/////////////////////
     function displayproduct ()
     {
      $selQry="select * from products";
      $stmt=$this->db->prepare($selQry);
      $stmt->execute();
      $rows=$stmt->fetchAll(PDO::FETCH_ASSOC); 
      echo "<table class='table ' style='text-align:center' > <thead class='thead-dark'><tr> 
                        <th>
                            Product
                        </th>
                          <th>
                            Price
                        </th>
                        <th>
                        Image
                         </th>
                         <th>
                         Action
                          </th>
                       
                       
                        
                    </tr></thead>";
       foreach($rows as $row) {

           echo "<tr> <td>" . $row["prodName"] . "</td>" .
               "<td>" . $row["prodPrice"] . "</td>".
               "<td>" . $row["prodImg"] . "</td>".
               "<td>
                  <a  class='btn btn-success' href='editproduct.php?id=" .$row["prodId"]." ' >Edit<i class='fa fa-close'></i></a>
                  <a class='btn btn-danger' href='deleteproduct.php?id=" .$row["prodId"]."' >Delete<i class='fa fa-close'></i></a>
                </td>

                </tr>";
                // "<td> href='update.php?id=" .$item["id"]." '
                //     <a href='update.php?id=" .$item["id"]." ' class='btn btn-outline-success' >Edit</a>
                //   <a href='#' onclick='delete_user({$item["id"]})' class='btn btn-outline-danger' >Delete</a></td>"
               

       }
       echo "</table>"; 
       
     }
     //////////deleteproduct///////////
     public function deleteproduct()
      {
        $id = $_GET['id'];
         if(!isset($_GET['id']) or !is_numeric($_GET['id']))
    {
        header("Location:product.php");
    }
    $selQry="SELECT * FROM `products`  WHERE `prodId`='$id' LIMIT 1 ";
      $stmt=$this->db->prepare($selQry);

    $result =  $stmt->execute();
    $check = mysqli_num_rows($result);
     if(!$check)
    {
        header("Location:product.php");
    }
    
    $sql2 = "DELETE FROM `products` WHERE `prodId`='$id' ";
    $stmt=$this->db->prepare($sql2);
    $stmt->execute();
    echo'<h1 class="text-center col-12 bg-danger py-3 text-white my-2"> Product  Have Been Deleted </h1>';
     header("refresh:3;url=product.php"); 
      }
   
     

     

  }


?>