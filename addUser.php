<!DOCTYPE html>
<html>
<head>
	<title></title>
  <style>
  
</style>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src='jquery.js'></script>
	<script type="text/javascript" src="bootstrap-4.5.3-dist/js/bootstrap.bundle.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.5.3-dist/css/bootstrap.css">
<!-- 	<link rel="stylesheet" type="text/css" href="php2form.css"> -->
</head>
<body>
  <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Add User</h1>
  <div class="col-md-6 offset-md-3">
<form action="users.php" method="POST" enctype="multipart/form-data" class="my-2 p-3 border">
	<div class="form-group">
    <label for="exampleInputName">Name</label>
    <input type="text" class="form-control" id="exampleInputName" required="" name="Name">
   <!--  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
  </div>

   <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" required="" name="password">
  </div>
  <div class="form-group">
    <label for="Password1">confirm Password</label>
    <input type="password" class="form-control" id="Password1" required="" name="confirmPassword">
  </div>
   <div class="form-group">
    <label for="room">room no.</label>
    <?php
session_start();
include ('userClass.php');

 $user= new user();
 $user->database_con();
 $user->selectRoom_es();
?>
  </div>
  <div class="form-group">
    <label for="exampleInputName">Ext.</label>
    <input type="text" class="form-control" id="exampleInputExt" required="" name="ext">
   
  </div>
   <div class="form-group">
    <label for="picture">profile picture</label>
    <input type="file" class="form-control" id="picture" required="" name="picture">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="reset" class="btn btn-primary">reset</button>
</form>
</div>


</body>
</html>