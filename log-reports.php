<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "db.php";

 
?>
  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Sales</title>
  
 
  <link href="img/favicon.png" rel="shortcut icon">
  
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap-slider.css">
  
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
   
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  
  <link href="css/style.css" rel="stylesheet">
 

</head>

<body class="body-wrapper">

<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="index.php">
						Car Sales
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<a class="nav-link" href="index.php">Home</a>
							</li>
							 <li class="nav-item active">
								<a class="nav-link" href="admin.php">Admin</a>
							</li>
							 
						</ul>
						 
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
<section class="dashboard section">
  <!-- Container Start -->
  <div class="container">
    <!-- Row Start -->
    <div class="row">
      <div class="col-md-10 offset-md-1 col-lg-3 offset-lg-0">
        <div class="sidebar">
          <!-- User Widget -->
          <div class="widget user-dashboard-profile">
           
            <h5 class="text-center">Welcome Admin</h5>
           
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
				 
              <li><a href="admin.php"><i class="fa fa-user"></i> All Records<span><?php $cnt=0;
	$sql="select * from cardata";
	$result=$conn->query($sql);

	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			$cnt=$cnt+1;
		}
	}
echo $cnt;	?></span></a></li>
              <li class="active"><a href="log-reports.php"><i class="fa fa-bookmark-o"></i> Log Reports <span><?php $cnt=0;
	$sql="select * from logreports";
	$result=$conn->query($sql);

	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			$cnt=$cnt+1;
		}
	}
echo $cnt;	?></span></a></li>
               
            </ul>
          </div>

          <!-- delete-account modal -->
          						  <!-- delete account popup modal start-->
                <!-- Modal -->
                <div class="modal fade" id="addcar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
						 
							<h5 class="text-center">Add New Record</h5>
							<form method="post">
								<input type="text" placeholder="Enter Brand Name" name="brand" class="border p-3 w-100 my-2" required>
								<input type="text" placeholder="Enter Model Name" name="model" class="border p-3 w-100 my-2" required>
								<input type="text" placeholder="Enter Color" name="color" class="border p-3 w-100 my-2" required>
								<input type="text" placeholder="Enter Address" name="address" class="border p-3 w-100 my-2" required>
								<input type="number" placeholder="Enter Price" name="price" class="border p-3 w-100 my-2" required>
								
                                 
                              
                            </select>
                      </div>
                      <div class="modal-footer border-top-0 mb-3 mx-5 justify-content-lg-between justify-content-center">
                        
                        <input type="submit" class="btn btn-success" value="ADD RECORD" name="addnew">
						<button type="button" class="btn btn-primary" data-dismiss="modal">CANCEL</button>
                      </div>
					  </form>
                    </div>
                  </div>
                </div>
                <!-- delete account popup modal end-->
          <!-- delete-account modal -->

        </div>
      </div>
	 
			
      <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0">
        <!-- Recently Favorited -->
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">Log Reports</h3>
          <table class="table table-responsive product-dashboard-table table-bordered">
           <thead>
							<tr style="background-color:green">
								 
								<th> Log ID</th>
								<th class="text-center">Car ID</th>
								<th class="text-center">Status</th>
								<th class="text-center">Record Data</th>
								<th class="text-center">Date</th>
							</tr>
						</thead>
						<tbody>
						 <?php
						  include "db.php";
						  
						  $input_date=date('Y-m-d');
						  $date = new DateTime($input_date);
						  $date->modify('-7 day');
						  $lastdate=$date->format('Y-m-d');
						  //$sql="SELECT * from logreports where datetime='2020-05-25'";
						  $sql="SELECT * from logreports where datetime BETWEEN '$lastdate' AND '$input_date'";
						 // echo $sql;
						  $result=$conn->query($sql);

							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{?>
				
							<tr>
									<td><span class="add-id"><center><strong><?php echo $row["logid"]; ?></strong></center></span></td>
									<td><span class="location"><center><strong><?php echo $row["carid"]; ?></strong></center></span></td>
									<td><span class="location"><strong><?php echo $row["status"]; ?></strong></span></td>
									<td><span class="location"><strong><?php echo $row["record"]; ?></strong></span></td>
									<td><span class="location"><strong><?php echo $row["datetime"]; ?></strong></span></td>
							</tr>
							<?php 
							}
		}
	  ?>
            </tbody>
          </table>

        </div>


      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
</section>

<!-- Footer Bottom -->
<footer class="footer-bottom">
  <!-- Container Start -->
  
</footer>

<!-- JAVASCRIPTS -->
<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/popper.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap-slider.js"></script>
  <!-- tether js -->
<script src="plugins/tether/js/tether.min.js"></script>
<script src="plugins/raty/jquery.raty-fa.js"></script>
<script src="plugins/slick-carousel/slick/slick.min.js"></script>
<script src="plugins/jquery-nice-select/js/jquery.nice-select.min.js"></script>
<script src="plugins/fancybox/jquery.fancybox.pack.js"></script>
<script src="plugins/smoothscroll/SmoothScroll.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
<script src="plugins/google-map/gmap.js"></script>
<script src="js/script.js"></script>
<?php
include "db.php";
 $brand="";
 $color="";
 $address=""; 
 $price="";
if(isset($_POST["addnew"]))
{
	$brand=$_POST["brand"];
	$color=$_POST["color"];
	$address=$_POST["address"];
	$price=$_POST["price"];
	
	 if($brand=="Audi" or $brand=="Honda" or $brand=="Ford" or $brand=="Suzuki")
	 {
		 if($color=="Red" or $color=="Green" or $color=="Blue" or $color=="Black")
		 {
			 if( $address=="Mascot" or $address=="Perth" or $address=="Sydney" or $address=="Thirroul" or $address=="Wollongong")
			 {
				 $rec=$brand." ".$color;
				$sql="INSERT INTO `cardata`(`brand`, `color`, `address`, `price`) VALUES ('$brand','$color','$address','$price')";
				$conn->query($sql);
				$cnt=0;
				$sql="select * from cardata";
				$result=$conn->query($sql);

				if($result->num_rows>0)
				{
					while($row=$result->fetch_assoc())
					{
						$cnt=$cnt+1;
					}
				}
				$date = date('Y-m-d');
				$sql="INSERT INTO `logreports`(`carid`, `status`,`record`, `datetime`) VALUES ('$cnt','Record Added','$rec','$date')";
				if($conn->query($sql))
				{
					echo "
					<script>
							alert('Added Success');
							window.location = 'admin.php';
					</script>";
				}
			 }
			 else
			 {
				 echo "
					<script>
							alert('Incorrect Location Entered');
					</script>";
			 }
		 }
		 else
		 {
			  echo "
        <script>
				alert('Incorrect Color Entered');
        </script>";
		 }
	 }
		else
		{
			 echo "
        <script>
				alert('Incorrect Brand Entered');
        </script>";
		}
	  
}
?>
</body>

</html>