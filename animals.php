<?php
session_start();
error_reporting(0);

include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Zoo | Animal Detail</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.js"></script>
<!--lightbox-->
<link rel="stylesheet" type="text/css" href="css/jquery.lightbox.css">
<script src="js/jquery.lightbox.js"></script>
<script>
  // Initiate Lightbox
  $(function() {
    $('.gallery a').lightbox(); 
  });
</script>
<!--lightbox-->
</head>
<body>
<?php include_once('includes/header.php');?>
		<div class="banner-header">
			<div class="container">
				<h2>Animal Detail</h2>
			</div>
			</div>
	<div class="content">
	<!--gallery-->
			<div class="gallery-section">
					<div class="container">
					<div class="welcome-grid">
				
			<?php 
			if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 4;
        $offset = ($pageno-1) * $no_of_records_per_page;
        //$total_pages_sql = "SELECT COUNT(*) FROM animal";
$ret1=mysqli_query($con,"select COUNT(*) from animal");
$total_rows = mysqli_fetch_array($ret1)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);
$query=mysqli_query($con,"select * from animal LIMIT $offset, $no_of_records_per_page");
 while ($row=mysqli_fetch_array($query)) {
 ?>
								<div class="col-md-3 welcome-grid" >
									<img src="admin/images/<?php echo $row['Image'];?>" width='220' height='200' alt=" " class="img-responsive" />
									<div class="wel-info">
										<h4><a href="animal-detail.php?anid=<?php echo $row['ID'];?>"><?php echo $row['Name'];?>(<?php echo $row['BreedType'];?>)</a></h4>
										
									</div>
								<br></div><?php }?>
				
				<div class="clearfix"> </div>
			</div>
	<div align="center">
    <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
</div>
		</div>
	</div>
<!--gallery-->
<!--specials-->
		<?php include_once('includes/special.php');?>
			</div>
		<?php include_once('includes/footer.php');?>
</body>
</html>