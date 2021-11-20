<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
    $vid=$_GET['viewid'];
    $query=mysqli_query($con,"delete from customer where UID='$vid'");
    if ($query) {
    
        echo ("<script>window.alert('Succesfully deleted');window.location.href='dashboard.php';</script>");
     }
     else
       {
          echo '<script>alert("Something Went Wrong. Please try again.")</script>';
       }
  }
  ?>