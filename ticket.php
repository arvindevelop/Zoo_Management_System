<?php
error_reporting(0);
include('admin/includes/config.php');
if(isset($_POST['submit']))
  {
    $noadult=$_POST['noadult'];
    $nochildren=$_POST['nochildren'];
    $isforeigner=$_POST['foreigner'];
    $aprice=$_POST['aprice'];
    $cprice=$_POST['cprice'];
    $foreignfare=$_POST['fprice'];
    $ticketid=mt_rand(100000000, 999999999);

    if($isforeigner != 1)
         $foreignfare = 0;
   
    $query=mysqli_query($con, "insert into  customer(TicketID,NoAdult,NoChildren,AdultUnitprice,ChildUnitprice,Foreignerfare) value('$ticketid','$noadult','$nochildren','$aprice','$cprice','$foreignfare')");
    if ($query) {
        $user_id = mysqli_insert_id($con);
     //echo '<script>alert("Ticket information has been added.")</script>';
     echo "<script>location.href='payment.php?viewid=$user_id'</script>";
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
    <title>ZMS | Buy Ticket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <style>
        .page-container{
            margin-top:150px;
        }
        .main-content{
            width:50%;
            text-align:left;
            margin:auto;
        }
        .main-content-inner{
            height:400px;
        }
        .card{
            background-color:#f5f5f5;
            height:370px;
            padding-top:20px;
        }
        .row{
            margin:auto;
        }
        .card-body{
            padding:20px;
        }
        @media (max-width: 768px){
            .main-content{
            width:100%;
        }
        }
    </style>
    
</head>

<body>
    <?php include_once('includes/header.php');?>
    
    <!-- page container area start -->
    <div class="page-container">
        <!-- main content area start -->
        <div class="main-content">
            <div class="main-content-inner">
                <div class="row">
          
                    <div class="col-lg-12 col-ml-12">
                        <div class="row">
                            <!-- basic form start -->
                            <div class="col-12 mt-5 main-cont">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="header-title text-center" style="margin-bottom:40px;font-weight:bold;">Buy Zoo Ticket</h3>


                                        <form method="post" action="" name="">
                                             <div class="form-group">
                                                <label for="exampleInputEmail1">Adult</label>
                                                <input type="text" class="form-control" id="noadult" name="noadult" aria-describedby="emailHelp" placeholder="No. of Adult" value="" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Children</label>
                                                <input type="text" class="form-control" id="nochildren" name="nochildren" aria-describedby="emailHelp" placeholder="No. of Childrens" value="" required="true">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Foreigner</label>
                                                <input type="checkbox" id="foreigner" name="foreigner" aria-describedby="emailHelp" value=1>
                                            </div>
                                            <?php

                                            $ret=mysqli_query($con,"select * from ticket where TicketType='Adult'");
                                            $cnt=1;
                                            while ($row=mysqli_fetch_array($ret)) {

                                            ?>
                                                                                        <input type="hidden" name="aprice" value="<?php  echo $row['Price'];?>">
                                                                                        <?php } ?>

                                                                                        <?php

                                            $ret=mysqli_query($con,"select * from ticket where TicketType='Child'");
                                            $cnt=1;
                                            while ($row=mysqli_fetch_array($ret)) {

                                            ?>
                                                                                        <input type="hidden" name="cprice" value="<?php  echo $row['Price'];?>">
                                                                                    
                                                                                <?php } ?>

                                                                                <?php

                                            $ret=mysqli_query($con,"select * from ticket where TicketType='Foreigner'");
                                            $cnt=1;
                                            while ($row=mysqli_fetch_array($ret)) {

                                            ?>
                                            <input type="hidden" name="fprice" value="<?php  echo $row['Price'];?>">
                                          
                                      <?php } ?>
                                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4" name="submit">Do Payment</button>
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
        <?php include_once('includes/special.php');?>
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