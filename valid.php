<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "hacobase";

session_start();

$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);


if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $query = "SELECT * FROM login WHERE username = '$username' AND password ='$password' ";
  
    $res = mysqli_query($con,$query);

    if(mysqli_num_rows($res) > 0){

      while($row = mysqli_fetch_assoc($res)){

        if ($row["role"]=="admin"){
          $_SESSION["user"]=$row["username"];
          $_SESSION["role"]=$row["role"];
          header("location: home.php");
      
        } else if($row["role"]=="user"){
          $_SESSION["user"]=$row["username"];
          $_SESSION["role"]=$row["role"];
          header("location: homeu.php");
    
          
        }else{
          echo "<script>alert('Woops! Username or Password incorrect')</script>";
          echo "<script>location.replace('login.php')</script>";
    
        }

      }
    }
  

  }
?>