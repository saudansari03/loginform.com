<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include 'components/db.php';
  $username = $_POST["username"];
  $password = $_POST["password"];
  $cpassword = $_POST["cpassword"];
  $exists = false;
  if(($password == $cpassword) && $exists==false){
    $sql = "INSERT INTO `users` (`username`, `password`) VALUES ('$username', '$password')";
    $result = mysqli_query($conn,$sql);
    if($result){
      $showAlert = true;
    }
  }
  else{
    $showError = "Passwords do not match";
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signup page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
      .container{
        display:flex;
        flex-direction:column;
        align-items:center;      
      }
    </style>
  </head>
  <body>
    <?php require 'components/nav.php'
    ?>
    <?php
    if($showAlert){
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
      <strong>Congrats!!</strong> Your account has been created. Now you can enjoy the game
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }
    if($showError){
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Some error has been occured</strong> '. $showError .'
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    ';
    }
?>
      <div class=container>
        <h1 class="text-center">SignUp To Become A Member Of My Website.</h1>
<form action="signup.php" method="POST">
        <div class="my-4 col-md-10" >
    <label for="username" class="form-label">Username</label>
    <input placeholder="Enter Username" type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" required>
    <div id="emailHelp" class="form-text">We'll never share your username and password with anyone else.</div>
  </div>
  <div class="my-4 col-md-10">
    <label for="password" class="form-label">Password</label>
    <input placeholder="Enter Password" type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="my-4 col-md-10">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input placeholder="Confirm Password" type="password" class="form-control" id="cpassword" name="cpassword" required>
    <div id="emailHelp" class="form-text">Make sure to type the same password as you wrote above.</div>
  </div>
  <button type="submit" class="btn btn-primary col-md-10">Sign Up</button>
</form>
        </div>
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  </body>
</html>