<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
  <a class="navbar-brand" style="padding-left:2%;font-family: 'Lobster', cursive;font-size:1.8em;color:purple;" href="#"><strong>ZMS</strong></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-right:5%;">
    <ul class="navbar-nav ml-auto text-white" style="font-size:18px;">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php"><strong>Home</strong> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Customer
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add-normal-ticket.php">Add Ticket</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Animal Details
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="add-animals.php">Add Animals</a>
          <a class="dropdown-item" href="manage-animals.php">Manage Animals</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="manage-ticket.php">Manage Type Ticket</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="normal-search.php">Search Ticket</a>
      </li>
      <?php
$adid=$_SESSION['zmsaid'];
$ret=mysqli_query($con,"select Name from admin where ID='$adid'");
$row=mysqli_fetch_array($ret);
$name=$row['Name'];

?>

      <li class="nav-item dropdown" style="background-color:green; border-radius:8px;">
        <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <b><?php echo $name; ?></b>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">   
          <a class="dropdown-item" href="profile.php">Profile</a>
          <a class="dropdown-item" href="logout.php">Log Out</a>
        </div>
      </li>
    </ul>
  </div>
</nav>