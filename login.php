<?php 

include_once 'valid.php';



?>
<!doctype html>
<html lang="en">
  <head>

  <link href="assets/img/download.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="assets/css/stylelogin.css"/>
    <title>Haco Shipyard</title>
  </head>

  <body>
  <header>
	  <center>
	  <img src="assets/img/logo.png" width="170" height="170"/>
	  <hr>
</center>
  </header>
  <form action="" method="POST">
<div class="login-box">
  <div class="form-group">
    <label>Username</label>
    <input class="form-control" type="text"
	 placeholder="Enter your username" name="username"  required>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input class="form-control" type="password"
	 placeholder="Enter your password" name="password"  required>
  </div>
  <center>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <button type="reset" class="btn btn-primary">Reset</button>
  </center>
  </div>
</form>
<footer>
<center>	
<span class="copyright">&copy</span>
	<small class="copy">ALL RIGHTS ARE RESERVED ! @HACO 2022</small>
	</center>
</footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>