<?php
session_start();
include('includes/config.php');
error_reporting(0);
if (strlen($_SESSION['zmsaid']==0)) {
  header('location:logout.php');
  } else{
if(isset($_POST['submit']))
  {
    $aniid=$_GET['editid'];
        $aimg=$_FILES["image"]["name"];
$extension = substr($aimg,strlen($aimg)-4,strlen($aimg));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Image has Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else
{

$aimg=md5($aimg).time().$extension;
 move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$aimg);
    $query=mysqli_query($con, "update animal set Image='$aimg' where ID='$aniid'");
    if ($query) {
  
    echo '<script>alert("Animal image has been Updated.")</script>';
  }
  else
    {
      
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

  }
  ?>
<!doctype html>
<html>

<head>
    <title>Add Animal Detail - ZMS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>
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
                                        <h4 class="header-title">Update Animal Detail</h4>
                                        <form method="post" enctype="multipart/form-data">
                                            <?php
 $aniid=$_GET['editid'];
$ret=mysqli_query($con,"select * from animal where ID='$aniid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Animal Name</label>
                                                <input type="text" class="form-control" id="aname" name="aname" aria-describedby="emailHelp" placeholder="Enter animal Name" value="<?php  echo $row['Name'];?>" readonly="true">
                                            </div>
                                       
                                           <div class="form-group">
                                                <label for="exampleInputEmail1">Old Animal Image</label>
                                                <img src="images/<?php  echo $row['Image'];?>" width="100" height="100">
                                            </div>
                                          <div class="form-group">
                                                <label for="exampleInputEmail1">New Animal Image</label>
                                                <input type="file" class="form-control" id="image" name="image" aria-describedby="emailHelp" value="" required="true">
                                                
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