<?php 
include_once 'valid.php';


if(isset($_GET['deleteid'])){
    $mat=$_GET['deleteid'];

    $sql="DELETE FROM persone WHERE mat=$mat";
    $res = mysqli_query($con,$sql);
    if($res){
        echo "<script>alert('Emplyoee deleted')</script>";
        header('location:home.php');
    }else{
        echo "<script> alert('Error')</script>";
    }

}




?>