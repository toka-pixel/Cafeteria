<?php
  class user{

    public $db;

    function  __constructor(){
        $this->db=$db;
    }


    // connect to database
    function database_con(){
        // connection toka
        // $dsn="mysql:dbname=cafeteria;dbhost=127.0.0.1;dbport=3306";
        //  Define("DB_USER","root");
        //  Define("DB_PASS","");
        // connection eman
        // $dsn="mysql:dbname=cafeteria;dbhost=127.0.0.1;dbport=3306";
        //  Define("DB_USER","root");
        //  Define("DB_PASS","");

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
       
       echo "<hr>";
       $filename= $upfile["name"];
       
       echo "<hr>";
       
       echo "<hr>";
       $userName= $_REQUEST["Name"];
       // echo "<hr>";
       // print_r($userName) ;
        $userEmail= $_REQUEST["email"];
       $userPass= $_REQUEST["password"];
       $userRoom= $_REQUEST["room"];
       $myImg="<img src=".$filename." height='100px' width='100px'/>";
       $selQry="Insert into `user`(`userName`,`userEmail`,`userPass`,`roomNumber`,`userImg`,`idRoom`) values (:sname,:semail,:spassword,:roomNo,:img,1)";
      $stmt=$this->db->prepare($selQry);

        $stmt->bindParam(":semail",$userEmail);
        $stmt->bindParam(":spassword",$userPass);
        $stmt->bindParam(":sname",$userName);
       $stmt->bindParam(":roomNo",$userRoom);
        $stmt->bindParam(":img",$myImg);
         $stmt->execute();
        
       } 
      }
      ///////////////////////////////////////////////////////////////////////////////////////////
      
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
        echo "<br>";
        echo("<a  href='addUser.html'>add user</a>");
        echo "<table border='15' style='border: 5px solid #7878bb;text-align:center;align:center;width:900px;'> <tr> 
                        <th>
                            ID
                        </th>
                          <th>
                            Name
                        </th>
                          <th>
                            Email
                        </th>
                        </th>
                          <th>
                            password
                        </th>
                        <th>
                            room no.
                        </th>
                        <th>
                            profile picture
                        </th>
                        <th>
                            Profile Picture
                        </th>
                    </tr>";
       foreach($rows as $row) {

           echo "<tr> <td>" . $row["userId"] . "</td>" .
               "<td>" . $row["idRoom"] . "</td>" .
               "<td>" . $row["userName"] . "</td>" .
               "<td>" . $row["userEmail"] . "</td>" .
               "<td>" . $row["roomNumber"] . "</td>" .
                "<td>" . $row["ext"] . "</td>" .
               "<td>".$row["userImg"]. "</td>
               
               </tr>";
               

       }
       echo "</table>";
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



    

     

  }


?>