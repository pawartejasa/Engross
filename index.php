<!DOCTYPE html>
<html lang="en">
<head>


  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Car Sales</title>
  
 
  <link href="img/favicon.png" rel="shortcut icon">
  
  <link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="plugsins/bootstrap/css/bootstrap-slider.css">
  
  <link href="plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  
  <link href="plugins/slick-carousel/slick/slick.css" rel="stylesheet">
  <link href="plugins/slick-carousel/slick/slick-theme.css" rel="stylesheet">
   
  <link href="plugins/fancybox/jquery.fancybox.pack.css" rel="stylesheet">
  <link href="plugins/jquery-nice-select/css/nice-select.css" rel="stylesheet">
  
  <link href="css/style.css" rel="stylesheet">
 
 <!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 
<!-- jQuery UI -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />


</head>
<body class="body-wrapper">
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

<section class="hero-area bg-1 text-center">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<!-- Header Contetnt -->
				<div class="content-block">
					<h1>Car Information Portal </h1>
					<p>Join the millions who buy and sell from each other <br> everyday in local communities around the world</p>
				</div>
			</div>
		</div>
	</div>
	<!-- Container End -->
</section>

<?php
include "db.php";
$honda="";$audi="";$suzuki="";$ford="";$brand="";
$sydney="";$perth="";$wollo="";$thirroul="";$mascot="";$address="";
$color="";$red="";$green="";$blue="";$black="";
$cnt=0;
$ccnt=0;
$sql="";
$tot="";
$totflag=0;
$barray=array();
$cntarray=array();
if(isset($_POST['filter']))
{
	$brand=" brand='$honda' or brand='$audi' or brand='$suzuki' or brand='$ford'";
	$address=" address='$sydney' or address='$perth' or address='$wollo' or address='$thirroul' or address='$mascot' ";
	$color=" color='$red' or color='$green' or color='$blue' or color='$black' ";
	
	//Brand count query
	$sql="SELECT COUNT(brand) as mycount, brand,(SELECT COUNT(brand) from cardata where ($brand) and ($address) and ($color)) as total FROM cardata where ($brand) and ($address) and ($color) GROUP BY brand ORDER BY brand ASC";
	
	if(isset($_POST['honda'])) { $honda=$_POST["honda"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['audi'])) { $audi=$_POST["audi"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['suzuki'])) { $suzuki=$_POST["suzuki"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['ford'])) { $ford=$_POST["ford"]; $ccnt=$ccnt+1;$totflag=1;}
	if($ccnt==0)
	{
		$brand="1";
	}
	else
	{	
		$brand=" brand='$honda' or brand='$audi' or brand='$suzuki' or brand='$ford'";
	}
	$ccnt=0;
	if(isset($_POST['sydney'])) { $sydney=$_POST["sydney"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['perth'])) { $perth=$_POST["perth"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['wollongong'])) { $wollo=$_POST["wollongong"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['thirroul'])) { $thirroul=$_POST["thirroul"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['mascot'])) { $mascot=$_POST["mascot"]; $ccnt=$ccnt+1;$totflag=1;}
	if($ccnt==0)
	{
		$address="1";
	}
	else
	{	
		$address=" address='$sydney' or address='$perth' or address='$wollo' or address='$thirroul' or address='$mascot' ";
	}
	$ccnt=0;
	
	if(isset($_POST['red'])) { $red=$_POST["red"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['green'])) { $green=$_POST["green"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['blue'])) { $blue=$_POST["blue"]; $ccnt=$ccnt+1;$totflag=1;}
	if(isset($_POST['black'])) { $black=$_POST["black"]; $ccnt=$ccnt+1;$totflag=1;}
	
	 if($ccnt==0)
	{
		$color="1";
	}
	else
	{	
		$color=" color='$red' or color='$green' or color='$blue' or color='$black' ";
	}
	
	
	$sql="SELECT COUNT(brand) as mycount, brand,(SELECT COUNT(brand) from cardata where 1 and ($brand) and ($address) and ($color) ) as total FROM cardata where 1 and ($brand) and ($address) and ($color) GROUP BY brand";
	
	 
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			$barray[$cnt]=$row['brand'];
			$cntarray[$cnt]=$row['mycount'];
			$tot=$row['total'];
			$cnt=$cnt+1;
		}
	}
	if($totflag==0)
	{
		$tot=0;
	}
	if($tot=="")
	{
		$tot=0;
	}
}
else
{
	$sql="SELECT COUNT(brand) as mycount, brand,(SELECT COUNT(brand) from cardata) as total FROM cardata GROUP BY brand ORDER BY brand ASC";
	 
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$tot=$row['total'];
}

?>

<form method="POST">
<section class="section-sm">
	<div class="container">
		
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
<div class="widget product-shorting">
	<h4 class="widget-header">Brand [ <?php echo $tot;?> ]</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Audi" name="audi">
	    <?php 
		
		if(isset($_POST['filter']))
		{
				if($totflag==1)
				{
					$myflag=0;
					$incnt=0;
					while($cnt>$incnt)
					{
						if($barray[$incnt]=="Audi")
						{
							echo "Audi [ ".$cntarray[$incnt]." ]";
							$myflag=1;
							break;
						}
						$incnt=$incnt+1;
					}
					if($myflag==0)
					{
						echo "Audi [0]";
					}
				}
				else
				{
					echo "Audi [0]";
				}
		}
		else
		{
			echo "Audi [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Ford" name="ford">
	    <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
				$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Ford")
					{
						echo "Ford [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Ford [0]";
				} }
				else
				{
					echo "Ford [0]";
				}
		}
		else
		{
			echo "Ford [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Honda" name="honda">
	    <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Honda")
					{
						echo "Honda [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Honda [0]";
				} }
				else
				{
					echo "Honda [0]";
				}
		}
		else
		{
			echo "Honda [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Suzuki" name="suzuki">
	     <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Suzuki")
					{
						echo "Suzuki [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Suzuki [0]";
				} }
				else
				{
					echo "Suzuki [0]";
				}
		}
		else
		{
			echo "Suzuki [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	
</div>

<?php

$sql="";
$cnt=0;
if(isset($_POST['filter']))
{
	//Address count query
	 $sql="SELECT COUNT(address) as mycount, address,(SELECT COUNT(address) from cardata where 1 and ($brand) and ($address) and ($color) ) as total FROM cardata where 1 and ($brand) and ($address) and ($color) GROUP BY address";
	 
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			$barray[$cnt]=$row['address'];
			$cntarray[$cnt]=$row['mycount'];
			$tot=$row['total'];
			$cnt=$cnt+1;
		}
	}
	if($totflag==0)
	{
		$tot=0;
	}
}
else
{
	$sql="SELECT COUNT(address) as mycount, address,(SELECT COUNT(address) from cardata) as total FROM cardata GROUP BY address ORDER BY address ASC";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
}

?>

<div class="widget product-shorting">
	<h4 class="widget-header">Address [ <?php echo $tot;?> ]</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Mascot" name="mascot">
	    <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Mascot")
					{
						echo "Mascot [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Mascot [0]";
				} }
				else
				{
					echo "Mascot [0]";
				}
		}
		else
		{
			echo "Mascot [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Perth" name="perth">
	   <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Perth")
					{
						echo "Perth [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Perth [0]";
				} }
				else
				{
					echo "Perth [0]";
				}
		}
		else
		{
			echo "Perth [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Sydney" name="sydney">
	   <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Sydney")
					{
						echo "Sydney [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Sydney [0]";
				} }
				else
				{
					echo "Sydney [0]";
				}
		}
		else
		{
			echo "Sydney [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Thirroul" name="thirroul">
	    <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Thirroul")
					{
						echo "Thirroul [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Thirroul [0]";
				} }
				else
				{
					echo "Thirroul [0]";
				}
		}
		else
		{
			echo "Thirroul [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Wollongong" name="wollongong">
	    <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Wollongong")
					{
						echo "Wollongong [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Wollongong [0]";
				} }
				else
				{
					echo "Wollongong [0]";
				}
		}
		else
		{
			echo "Wollongong [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	
	
</div>
<?php

$sql="";
if(isset($_POST['filter']))
{
	//Color count query
	$sql="SELECT COUNT(color) as mycount, color,(SELECT COUNT(color) from cardata where 1 and ($brand) and ($address) and ($color) ) as total FROM cardata where 1 and ($brand) and ($address) and ($color) GROUP BY color";
	
	$result=$conn->query($sql);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
			$barray[$cnt]=$row['color'];
			$cntarray[$cnt]=$row['mycount'];
			$tot=$row['total'];
			$cnt=$cnt+1;
		}
	}
	if($totflag==0)
	{
		$tot=0;
	}
}
else
{
	$sql="SELECT COUNT(color) as mycount, color,(SELECT COUNT(color) from cardata) as total FROM cardata GROUP BY color ORDER BY color ASC";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
}

?>
<div class="widget product-shorting">
	<h4 class="widget-header">Color [ <?php echo $tot; ?> ]</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Black" name="black">
	    <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Black")
					{
						echo "Black [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Black [0]";
				} }
				else
				{
					echo "Black [0]";
				}
		}
		else
		{
			echo "Black [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Blue" name="blue">
	    <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Blue")
					{
						echo "Blue [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Blue [0]";
				} }
				else
				{
					echo "Blue [0]";
				}
		}
		else
		{
			echo "Blue [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Green" name="green">
	     <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Green")
					{
						echo "Green [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Green [0]";
				} }
				else
				{
					echo "Green [0]";
				}
		}
		else
		{
			echo "Green [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="Red" name="red">
	     <?php 
		
		if(isset($_POST['filter']))
		{
			if($totflag==1)
				{
			$myflag=0;
				$incnt=0;
				while($cnt>$incnt)
				{
					if($barray[$incnt]=="Red")
					{
						echo "Red [ ".$cntarray[$incnt]." ]";
						$myflag=1;
					}
					$incnt=$incnt+1;
				}
				if($myflag==0)
				{
					echo "Red [0]";
				} }
				else
				{
					echo "Red [0]";
				}
		}
		else
		{
			echo "Red [".$row['mycount']."]";$row=$result->fetch_assoc(); 
		}
		
		?>
	  </label>
	</div>
	
	
</div>
	<div class="form-group col-md-2">
	
		<button type="submit" class="btn btn-primary" name="filter">Filter</button>
	</div>
</form>
				</div>
			</div>
			<div class="col-md-9">
				<div class="product-grid-list">
					<div class="row mt-30">
					
<!-- Record Start -->	

<?php

$sql="";
if(isset($_POST['filter']))
{
	if($totflag==1)
	{
		$sql="SELECT * from cardata where 1 and ($brand) and ($address) and ($color)";
	}
	 else
	 {
		 $sql="Select * from cardata where 0";
	 }
}
else
{
	$sql="SELECT * from cardata";
}
$result=$conn->query($sql);
 if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{?>
			

				
<div class="col-sm-12 col-lg-4 col-md-6">
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			 
				<img class="card-img-top img-fluid" src="images/carindex.jpg" alt="Card image cap">
			 
		</div>
		<div class="card-body">
		    <h4 class="card-title">Brand: <?php echo $row['brand']; ?></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<i class="fa fa-folder-open-o"></i> Color: <b style="color:<?php echo $row['color']; ?>"> <?php echo $row['color']; ?></b>
		    	</li>
				<li class="list-inline-item">
		    		<i class="fa fa-folder-open-o"></i> Location: <?php echo $row['address']; ?>
		    	</li>
				<li class="list-inline-item">
		    		<i class="fa fa-folder-open-o"></i> Price: <?php echo $row['price']; ?>
		    	</li>
		    </ul>
			<ul class="list-inline product-meta">
		    	
		    </ul>
		    
		</div>
	</div>
</div>
</div>
	<?php
	}
	}
?>
<!-- Record End -->							
						</div>
				</div>
				
			</div>
		</div>
	</div>
</section>
<!--============================
=          


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

</body>
 
</html>