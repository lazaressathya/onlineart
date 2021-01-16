<?php
    session_start();
    if(!isset($_SESSION['user_session']))
  {
    header('Location:login.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>User Profile</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/logo1.png"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body >
	
	
	<div class="row" style="background:url(./images/art-risunok-devushka-lico.jpg); height:100%;width:auto; background-size:cover; ">
			<div class="col-2" style="background-color:tranparent;height:100%;width:auto;">
								<div  style="background-color:skyblue;box-shadow:1px 2px 4px 0px;padding:10px;border-radius:99px;margin-top:150px" >
									<h4 class="nav-link mt-3 ml-5 mb-4"><strong>
									<?php 
									
										$mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
										$qry=new MongoDB\Driver\Query([]);
										$rows=$mongo->executeQuery("pack.user",$qry);

										foreach($rows as $row)
											{
											if($_SESSION['user_session']==$row->email )
											{
												echo $row->name;
											
									?></strong>
									</h4>
								</div>
				<div class="nav-link mt-3 ml-3 mb-4">
                <ul >
                    <li><h3  ><a href="index.php" style="color:#57c4f3;" class="font-weight-bold">Home</a></li>
                   <!--  <li class="mt-1"><h3><a href="my_venue.php">My Venue</a></h3></li>
                    <li class="mt-1"><h3><a href="venues.php">Venues</a></h3></li> -->
                    <li class="mt-1 ><h3><a href="logout.php" class=" btn font-weight-bold" style="color:#57c4f3;">Logout</a></h3></li>
                    <a href="index.php" class="btn btn-md font-weight-bold text-white mt-5" style="background-color:#57C4F3; ">Back</a>
                </ul>
				</div>
            </div>
			
            <div class="col-10" style="background-image:url(img/dave-lastovskiy-RygIdTavhkQ-unsplash.jpg);backgound-repeat:no-repeat;background-attachment: fixed; background-size: 100% 100%;"> 
				<div class="container float-left mb-5" style="height:auto;width:800px;margin-top:150px;background-color:transparent;padding:50px;border-radius:10px">
					<div>
					<h4  style="color:#57c4f3;"><strong>First Name : </strong><span><?php echo $row->name;?></span> </h4>
					<h4 class="mt-3" style="color:#57c4f3;"><strong>Email: </strong> <span><?php echo $row->email;?></span></h4>
					<h4 class="mt-3" style="color:#57c4f3;"><strong>Address : </strong><span><?php echo $row->location;?></span> </h4>
					<h4 class="mt-3" style="color:#57c4f3;"><strong>Phone No : </strong><span><?php echo $row->mobileno;?></span> </h4>
					</div>
					<img src="" alt="">
				</div>
				
            </div>
		</div>
	<?php
		}
	}
	?>
	
    
	<div id="dropDownSelect1"></div>
	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
    <script src="js/main.js"></script>

</body>
</html>
