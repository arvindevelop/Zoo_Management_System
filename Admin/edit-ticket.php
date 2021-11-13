<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $tid=$_GET['editid'];
    $tpype=$_POST['tickettype'];
    $tprice=$_POST['tprice'];
    
    $query=mysqli_query($con, "update ticket set TicketType='$tpype',Price='$tprice' where ID='$tid'");
    if ($query) {
  
    echo '<script>alert("Ticket detail has been Updated.")</script>';
  }
  else
    {
      
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

  
  ?>

<!doctype html>
<html>

<head>
    <title>Update Ticket Type- Zoo Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
</head>

<body>
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- main content area start -->
        <div class="main-content">
            <!-- page title area start -->
           <?php include_once('includes/pagetitle.php');?>
            <!-- page title area end -->
            <div class="main-content-inner">
                <div class="row">
             
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Update Ticket Type</h4>


                                        <form method="post" action="" name="">
                                            <?php
 $tid=$_GET['editid'];
$ret=mysqli_query($con,"select * from ticket where ID='$tid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Ticket Type</label>
                                                <input type="text" class="form-control" id="tickettype" name="tickettype" aria-describedby="emailHelp" value="<?php  echo $row['TicketType'];?>" required="true" readonly>
                                            </div>
                                         <div class="form-group">
                                                <label for="exampleInputEmail1">Ticket Cost</label>
                                                <input type="text" class="form-control" id="tprice" name="tprice" aria-describedby="emailHelp" value="<?php  echo $row['Price'];?>" required="true">
                                                
                                            </div>
                                            

                                      <?php } ?>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- basic form end -->  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    <!-- jquery -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>

    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
<?php }  ?>