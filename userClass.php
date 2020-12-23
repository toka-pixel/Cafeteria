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