<?php 
// var_dump($_REQUEST) ;
$dsn="mysql:dbname=cafeteria;dbhost=127.0.0.1;dbport=3306";
    Define("DB_USER","root");
    Define("DB_PASS","");

    $db= new PDO($dsn,DB_USER,DB_PASS);
    //
    echo "<hr>";
    if(isset($_FILES['picture'])){
	// echo "ok";
	$upfile=$_FILES['picture'];
	// print_r($upfile) ;
if($upfile["name"]!=""){
// echo $upfile["name"];
            $filename= $upfile["name"];
            $filetmpname=$upfile["tmp_name"];
            $filesize=$upfile["size"];
            $ext=explode(".",$filename);
            $ext= end($ext);
            // echo $ext;

            $extensions=["png","jpg"];
            $errors=[];

            if(!in_array($ext,$extensions)){
                $errors[]="this type is not allowed";
            }

            if($filesize> 1000000000){
                $errors[]="this is file is to long, please choose another one";
            }

            if(empty($errors)){
                #upload file
//               #move_uploaded_file(Tempname, destpath)
                
                move_uploaded_file($filetmpname, $filename);
                // echo "<img src=".$filename." height=200 width=300 />";

            }else{
            	echo "<br>";
                print_r($errors);
            }


        }

}else{echo "no chosen file";}	echo "<hr>";
    // var_dump($db);
    if($db){
        echo "<p>Connected</p><hr>";
        
        
        $userName= $_REQUEST["Name"];
        $userEmail= $_REQUEST["email"];
       $userPass= $_REQUEST["password"];
       $userRoom= $_REQUEST["room"];
       $myImg="<img src=".$filename." height=200 width=300 />";
       $instQry="Insert into `user`(`userId`,`userName`,`userEmail`,`userPass`,`roomNumber`) values (105,:sname,:semail,:spassword,:roomNo)";
        $instmt=$db->prepare($instQry);
        $instmt->bindParam(":semail",$userEmail);
        $instmt->bindParam(":spassword",$userPass);
        $instmt->bindParam(":sname",$userName);
        $instmt->bindParam(":roomNo",$userRoom);
        $instmt->bindParam(":img",$myImg);
        $res=$instmt->execute();
        echo "test";
        var_dump($res);
        $rowCount=$instmt->rowCount();
        var_dump($rowCount);
        // $lid=$db->lastInsertId();
        // var_dump($lid);
        echo "<br>";
       
      




    }else{
        echo "not connected";
    }






 ?>