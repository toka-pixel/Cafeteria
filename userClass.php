<?php
  class user{

    public $db;
    // public $data=array();


    function  __constructor(){
        $this->db=$db;
    }


    // connect to database
    function database_con(){
        
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

    
     //  check login for admin is exit
     function loginAdmin($name,$pass){

      $selQry="select * from admin where `userName`=:sname and `userPass`=:spass ";
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