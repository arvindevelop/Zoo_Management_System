<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{

?>

<!doctype html>
<html>

<head>
   
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <title>Manage Normal Ticket - Zoo Management System</title>
    <!-- <link rel="stylesheet" href="assets/css/responsive.css"> -->
    <!-- modernizr css -->
    <!-- <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script> -->
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
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">View Detail of Tickets</h4>
                                <div class="data-tables">
                                    <table class="table text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>S.NO</th>
                                                <th>Ticket ID</th>
                                                <th>Generating Ticket Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <?php
$ret=mysqli_query($con,"select * from tblticindian order by ID desc");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <tbody>
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['TicketID'];?></td>
                  <td><?php  echo $row['PostingDate'];?></td>
                  <td><a href="view-normal-ticket.php?viewid=<?php echo $row['ID'];?>">View</a>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
 </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- data table end -->
                   
                    
                </div>
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <?php include_once('includes/footer.php');?>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
    
    
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
</body>

</html>
<?php }  ?>