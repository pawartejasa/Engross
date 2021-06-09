<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "db.php";
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 

$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['REQUEST_URI']; 
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

<body class="body-wrapper bg-gray">

<section>
	<div class="container" >
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
          <div class="widget user-dashboard-profile" style="background-color:#28a745">
           
            <h5 class="text-center">Welcome Admin</h5>
           
          </div>
          <!-- Dashboard Links -->
          <div class="widget user-dashboard-menu">
            <ul>
				<li><a href="" data-toggle="modal" data-target="#addcar"><i class="fa fa-plus"></i> Add New Record </a></li>
              <li class="active"><a href="admin.php"><i class="fa fa-user"></i> All Records<span><?php $cnt=0;
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
              <li><a href="log-reports.php"><i class="fa fa-bookmark-o"></i> Log Reports <span><?php $cnt=0;
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
		  
		   <!-- delete-account modal -->
          						  <!-- delete account popup modal start-->
              
          <!-- delete-account modal -->

</div>
</div>

			
      <div class="col-md-10 offset-md-1 col-lg-9 offset-lg-0" style="background-color:#007bff">
        <!-- Recently Favorited -->
		<br>
        <div class="widget dashboard-container my-adslist">
          <h3 class="widget-header">My Car Data</h3>
		  
		  <table class="table table-striped table-hover">
			<thead>
			  <tr>
				<th>ID</th>
				<th>Brand</th>
				<th>Color</th>
				<th>Address</th>
				<th>Price</th>
				<th>Actions</th>
				 
			  </tr>
			</thead>
			<tbody>
			<?php
						  include "db.php";
						  $sql="select * from cardata";
						  $result=$conn->query($sql);

							if($result->num_rows>0)
							{
								while($row=$result->fetch_assoc())
								{?>
			  <tr>
				<td><?php echo $row["id"]; ?></td>
				<td><?php echo $row["brand"]; ?></td>
				<td style="color:<?php echo $row["color"]; ?>"><?php echo $row["color"]; ?></td>
				<td><?php echo $row["address"]; ?></td>
				<td><?php echo $row["price"]; ?></td>
				<td>
				<ul class="list-inline justify-content-center">
										<form method="post">
											<li class="list-inline-item">	
												<input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
												<button data-toggle="tooltip" data-placement="top" title="Edit" class="edit" name="mupdate">
													<i class="fa fa-pencil"></i>
												</button>
												
											</li>
											<li class="list-inline-item">
												<button data-toggle="tooltip" data-placement="top" title="Delete" class="delete" name="mdelete">
													<i class="fa fa-trash"></i>
												</button>
												 
											</li>
										</form>
										</ul>
				</td>
			  </tr>
			  
			  <?php
								}
							}
			  ?>
			</tbody>
			
			
		</table>
		  
		  
	
      </div>
    </div>
    <!-- Row End -->
  </div>
  <!-- Container End -->
   <!-- Modal -->
				<a id="deleterecordpop" href="#" data-toggle="modal" data-target="#deletecar"></a>

                <div class="modal fade" id="deletecar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
						 
							<h5 class="text-center">Are you Sure want to Delete Car Record?</h5>
							<?php
		 include 'db.php';
		 $myid=$_POST["id"];
			$sql="select * from cardata where id='$myid'";
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				while($row=$result->fetch_assoc())
				{?>
						<form method="post">
								<input type="hidden" value="<?php echo $myid; ?>" name="idd"/>
								<input type="text" placeholder="Enter Brand Name" value="<?php echo $row["brand"]; ?>" name="brand" class="border p-3 w-100 my-2" required>
								<input type="text" placeholder="Enter Color" value="<?php echo $row["color"]; ?>" name="color" class="border p-3 w-100 my-2" required>
								<input type="text" placeholder="Enter Address" name="address" value="<?php echo $row["address"]; ?>" class="border p-3 w-100 my-2" required>
								<input type="number" placeholder="Enter Price" name="price" value="<?php echo $row["price"]; ?>" class="border p-3 w-100 my-2" required>
								
                                 <center><input type="submit" class="btn btn-success" value="Delete RECORD" name="delete"></center>
                            </select>
                      </div>
                      
					  </form>
                    </div>
					<?php
				}
			}
		 ?>
                  </div>
                </div>
</section>
  <!-- Modal -->
				<a id="carulink" href="#" data-toggle="modal" data-target="#updatecar"></a>

                <div class="modal fade" id="updatecar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-bottom-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body text-center">
						 
							<h5 class="text-center">Update Car Record</h5>
							<?php
		 include 'db.php';
		 $myid=$_POST["id"];
			$sql="select * from cardata where id='$myid'";
			$result=$conn->query($sql);
			if($result->num_rows>0)
			{
				while($row=$result->fetch_assoc())
				{?>
						<form method="post">
								<input type="hidden" value="<?php echo $myid; ?>" name="idd"/>
								<input type="text" placeholder="Enter Brand Name" value="<?php echo $row["brand"]; ?>" name="brand" class="border p-3 w-100 my-2" required>
								<input type="text" placeholder="Enter Color" value="<?php echo $row["color"]; ?>" name="color" class="border p-3 w-100 my-2" required>
								<input type="text" placeholder="Enter Address" name="address" value="<?php echo $row["address"]; ?>" class="border p-3 w-100 my-2" required>
								<input type="number" placeholder="Enter Price" name="price" value="<?php echo $row["price"]; ?>" class="border p-3 w-100 my-2" required>
								
                                 <center><input type="submit" class="btn btn-success" value="UPDATE RECORD" name="update"></center>
                            </select>
                      </div>
                      
					  </form>
                    </div>
					<?php
				}
			}
		 ?>
                  </div>
                </div>
                <!-- delete account popup modal end-->
				 
				
                 
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
if(isset($_POST["update"]))
{
	$myid=$_POST["idd"];
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
				$sql="UPDATE `cardata` SET `brand`='$brand',`color`='$color',`address`='$address',`price`='$price' WHERE `id`='$myid'";
				$conn->query($sql);
				
				$date = date('Y-m-d');
				$sql="INSERT INTO `logreports`(`carid`, `status`,`record`, `datetime`) VALUES ('$myid','Record Updated','$rec','$date')";
				$conn->query($sql);
				echo "
					<script>
						alert('Record Updated');
							window.location = 'admin.php';
					</script>
				";
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
if(isset($_POST["delete"]))
{
	$myid=$_POST["idd"];
	$brand=$_POST["brand"];
	$rec=$brand;
	$sql="delete from cardata where id='$myid'";
	$conn->query($sql);
	
	$date = date('Y-m-d');
	$sql="INSERT INTO `logreports`(`carid`, `status`,`record`, `datetime`) VALUES ('$myid','Record Updated','$rec','$date')";
	$conn->query($sql);
	
	echo "
        <script>
			alert('Record Deleted');
                window.location = 'admin.php';
        </script>
    ";
}

if(isset($_POST["cancel"]))
{
	echo "
        <script>
                window.location = 'admin.php';
        </script>
    ";
	 
}
?>
?>
<?php 
if(isset($_POST["mupdate"]))
	
{ 
 
?>
	<script>
		$("#carulink")[0].click()
		
	</script>						
<?php 
}
if(isset($_POST["mdelete"]))
{ 
?>

	<script>
		 
		$("#deleterecordpop")[0].click()
		
	</script>			
		 
<?php 	
}


?>
</body>

</html>