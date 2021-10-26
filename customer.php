<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $noadult=$_POST['noadult'];
    $nochildren=$_POST['nochildren'];
    $aprice=$_POST['aprice'];
    $cprice=$_POST['cprice'];
    $ticketid=mt_rand(100000000, 999999999);
   
        $query=mysqli_query($con, "insert into  tblticindian(TicketID,NoAdult,NoChildren,AdultUnitprice,ChildUnitprice) value('$ticketid','$noadult','$nochildren','$aprice','$cprice')");
    if ($query) {
    
     echo '<script>alert("Ticket information has been added.")</script>';
  }
  else
    {
       echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }
  
  ?>

<!doctype html>
<html>

<head>
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <title>Add Normal Zoo Ticket - Zoo Management System</title>
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</head>

<body>
<?php include('includes/header.php');?>
    <!-- page container area start -->
    <div class="page-container">
        <!-- main content area start -->
        <div class="main-content">
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                            <!-- basic form start -->
                            <div class="mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add Normal Zoo Ticket</h4>
                                        <form method="post" action="" name="">
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Adult</label>
                                                <input type="text" class="form-control" id="noadult" name="noadult" aria-describedby="emailHelp" placeholder="No. of Adult" value="" required="true">
                                            </div>
                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Children</label>
                                                <input type="text" class="form-control" id="nochildren" name="nochildren" aria-describedby="emailHelp" placeholder="No. of Childrens" value="" required="true">                                                
                                            </div>
                                            <?php
$ret=mysqli_query($con,"select * from tbltickettype where TicketType='Normal Adult'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                                             <input type="hidden" name="aprice" value="<?php  echo $row['Price'];?>">
                                             <?php } ?>
                                             <?php
$ret=mysqli_query($con,"select * from tbltickettype where TicketType='Normal Child'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
?>
                                            <input type="hidden" name="cprice" value="<?php  echo $row['Price'];?>">
                                      <?php } ?>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">PATMENT</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
</body>

</html>
<?php }  ?>