<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="../index.php">Home</a></li>
                                <li><a href="dashboard.php">Dashboard</a></li>
                                <li>
                                    <h4 class="user-name dropdown-toggle" style="color:black;" data-toggle="dropdown">Customer<i class="fa fa-angle-down"></i></h4>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="add-normal-ticket.php">Add Ticket</a>
                                    </div>
                                </li>
                                <li>
                                    <h4 class="user-name dropdown-toggle" style="color:black;" data-toggle="dropdown">Animal details<i class="fa fa-angle-down"></i></h4>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="add-animals.php">Add Animals</a>
                                        <a class="dropdown-item" href="manage-animals.php">Manage Animals</a>
                                    </div>
                                </li>
                                <li><a href="manage-ticket.php">Manage Type Ticket</a></li>
                                <li><a href="normal-search.php">Search Ticket</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <?php
$adid=$_SESSION['zmsaid'];
$ret=mysqli_query($con,"select Name from admin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['Name'];

?>
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><?php echo $name; ?> <i class="fa fa-angle-down"></i></h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="profile.php">Profile</a>
                                <a class="dropdown-item" href="logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>