<?php
  class user{

    public $db;

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
         Define("DB_PASS","REHAb123455%");

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

        $selQry="select * from user where `userName`=:sname and `userPass`=:spass ";


       }


      //  check login is exit
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
      /////////////////////////////////////////////////////////////////////////////////////////
      function addUser()
      {
        if(isset($_POST['Name']))
        {
        $upfile=$_FILES['picture'];
       
       // echo "<hr>";
       $filename= $upfile["name"];
       
       // echo "<hr>";
       
       // echo "<hr>";
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

           
                  
                        $id = $_POST['id'];
                        $password = $_POST['password'];
                        if($password)
                        {
                            $password = $_POST['password'];
                            

                            $sql = "UPDATE `user` SET  `userName`='$name' ,`userEmail`='$email',
                            `userPass`='$password' 
                            WHERE `userId`='$id' ";

                        }   
                        else 
                        {
                            $sql = "UPDATE `user` SET  `userName`='$name' ,`userEmail`='$email'  
                            WHERE `userId`='$id' ";
                        }
                        $stmt=$this->db->prepare($sql);

                        $result = $stmt->execute();

                       

                        if($result)
                        {
                            $success = "Updated Successfully ";
                            header("refresh:3;url=users.php");
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
        echo("<a style='margin-left:1200px' type='button' class='btn btn-primary btn-lg' href='addUser.html'>add user</a>");
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
    
    $sql2 = "DELETE FROM `user` WHERE `userId`='$id' ";
    $stmt=$this->db->prepare($sql2);
    $stmt->execute();
    echo'<h1 class="text-center col-12 bg-danger py-3 text-white my-2"> User  Have Been Deleted </h1>';
     header("refresh:3;url=users.php"); 
      }
      ///////////////////////////////////////////////////////////////////////////////////////////
    
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
      echo "<table border='15' style='border: 5px solid #7878bb;text-align:center;align:center;width:900px;'> <tr> 
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
                       
                       
                        
                    </tr>";
       foreach($rows as $row) {

           echo "<tr> <td>" . $row["prodName"] . "</td>" .
               "<td>" . $row["prodPrice"] . "</td>".
               "<td>" . $row["prodImg"] . "</td>".
               "<td>
                  <a href='editproduct.php?id=" .$row["prodId"]." ' >Edit</a>
                  <a href='#' >Delete</a>
                </td>

                </tr>";
                // "<td> href='update.php?id=" .$item["id"]." '
                //     <a href='update.php?id=" .$item["id"]." ' class='btn btn-outline-success' >Edit</a>
                //   <a href='#' onclick='delete_user({$item["id"]})' class='btn btn-outline-danger' >Delete</a></td>"
               

       }
       echo "</table>"; 
       
     }
   
    



    

     

  }


?>