<?php

 $dsn="mysql:dbname=comp;dbhost=127.0.0.1;dbport=3306";
 Define("DB_USER","root");
 Define("DB_PASS","");
 
 $db= new PDO($dsn,DB_USER,DB_PASS);

  

// catch(PDOException $exception){
//     echo "Connection error: " . $exception->getMessage();
// }
?>
