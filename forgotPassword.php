<?php
session_start();


 include ('userClass.php');

 $user= new user();
 $user->database_con();

if(isset($_GET['name'])&& isset($_GET['confirmpassword'])){


    $name=$_GET['name'];
    $pass=$_GET['confirmpassword'];

    

    // echo $_SESSION['userimg'];
    $_SESSION['name']=$name;
    $_SESSION['confirmpassword']=$pass;
   
   
    $check=$user->forgotPassword($name,$pass);
    
  
    if($check){
       
        header('Location: homeUser.php');
       
    }
    else{


    echo "<script type='text/javascript'>alert('username is not valid');</script>";

           
    }

}









?>

<!DOCTYPE html>
<html>

<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="css/loginUser.css">
   
    <style>
        .forgot{
            margin-top: 29px;
        }
        #login{
            background: #5e60ce;
    padding: 10px 10x;
    padding: 10px 47px;
    color: white;
    font-weight: bold;
    border-radius: 25px;
    margin-top: 38px;
   
    text-decoration: none;
  
        }
        .not-found{
            color:red;
            display:none;
        }
        .card1{
            padding-left: 31%;
        }
    </style>
</head>

<body>
    <div class="page-wrapper bg-gra-01">
        <div class="card">
            <div class="card1">
                <!-- <div class="card-heading card2"></div> -->
                <div class="card-body card2">
                    <div class="card-body1">
                        <h2 class="title" style="padding-top: 125px;">FORGOT PASSWORD</h2>

                        <!-- <hr> -->
                        <div id="sign">
                            <form  method="GET">
                                <div class="input-group">

                                    <input class="input--style-3"  type="text" placeholder=" UserName" name="name"
                                        required>
                                </div>



                                <div class="input-group">

                                    <input class="input--style-3"  type="Password" placeholder="Confirm Password" name="confirmpassword"
                                        required style="margin-bottom: 39px;">
                                </div>


                                <!-- <div class="p-t-10">
                                   <a id="login" href="home.html">Log IN </a>
                                </div> -->
                                <button class="btn" id="btnLogin" type="submit" >Log IN</button>
                               
                                <div class="forgot">
                                    <span>Forgot</span>
                                    <a href="loginUser.php" name="forgot">Sign In</a>


                                </div>
                                <!-- <div class="signUp">

                                    <a href="reg1.html">Sign Up</a>?
                                </div> -->
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    

</body>

</html>