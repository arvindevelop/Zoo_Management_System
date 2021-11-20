<?php  
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{

?>

<!doctype html>
<html>

<head>
    <title>ZMS | Search Ticket</title>
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
                    <!-- data table start -->
                    <div class="col-12 mt-5">
                        <div class="card">
                            <div class="card-body">
                                <form id="basic-form" method="post">
                                <div class="form-group">
                                    <label>Search by Ticket ID</label>
                                    <input id="searchdata" type="text" name="searchdata" required="true" class="form-control" placeholder="Ticket ID"></div>
                                
                                <br>
                                <button type="submit" class="btn btn-primary" name="search" id="submit">Search</button>
                            </form>  
                            <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>  
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
$ret=mysqli_query($con,"select * from customer  where TicketID like '$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <tbody>
          <tr data-expanded="true">
            <td><?php echo $cnt;?></td>
              
                  <td><?php  echo $row['TicketID'];?></td>
                  <td><?php  echo $row['PostingDate'];?></td>
                  <td><a href="view-normal-ticket.php?viewid=<?php echo $row['UID'];?>">View</a>
                </tr>
                 <?php 
$cnt=$cnt+1;} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   

<?php }} ?>
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
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>
<?php }  ?>