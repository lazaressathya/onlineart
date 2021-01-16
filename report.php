<?php
session_start();
$_SESSION['user_session'];
if(!isset($_SESSION['user_session']))
{
  header('Location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="/img/ian-williams-rKE6rXOl14U-unsplash (1).jpg">
    <title>online art gallery</title>
    <link rel="stylesheet" href="boostrap/mdb.min.css">
    <link rel="stylesheet" href="boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar " style="border: 0; box-shadow: none; background:#57C4F3;">

<div class="container">

    <!-- Navbar brand -->
    <a class="navbar-brand font-weight-bold p-auto" href="#" style="font-size: 25px;"><i class="fas fa-paint-brush fa-1x"></i>   Online Art Gallery</a>

    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
        aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="basicExampleNav">

        <!-- Links -->
        <ul class="navbar-nav ml-auto smooth-scroll font-weight-bold">
            <li class="nav-item">
                <a class="nav-link p-2" href="#intro">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2"" href="#best-features">Features</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2"" href="#examples">Gallery</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2"" href="#gallery">About </a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2"" href="#contact">Contact Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2"" href="admin_login.php">Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link p-2"" href="logout.php">LogOut</a>
            </li>
        </ul>
        <!-- Links -->

        <!-- Social Icon  -->
        
    </div>
    <!-- Collapsible content -->

</div>

</nav>
<section id="examples" class="text-center mt-5">

<!-- Heading -->
<h2 class="mb-5 font-weight-bold display-4 text-center" style="color:#57C4F3; margin-top:80px;">Art Details</h2>

<!--Grid row-->
<div class="row align-item-center text-center">
<?php

    $name=$_GET['name'];
    $artist=$_GET['artist'];
    $user=$_SESSION['user_session'];
    $buyer=$_GET['buyer'];
    $filters=['name'=>$name,'buyer'=>$buyer];
    $options=[];
    $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $qry=new MongoDB\Driver\Query($filters,$options);
    //Select Database
    $rows=$mongo->executeQuery("VenueBooking.Booking",$qry);
    

    foreach($rows as $row)  
    {
    ?>
    <!--Grid column-->
    <div class="col  ml-5  mb-4">
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="view overlay ">
            <h1 >Abstract painting</h1><span><button class=" btn text-white font-weight-bold mt-2 mb-2" type="submit" onclick="print();" style="background-color:#57C4F3">Get Report</button></span>
            <?php 
            $nm=$row->name;
            $filters=['name'=>$nm];
            $options=['limit'=>1];
            
            $qry=new MongoDB\Driver\Query($filters,$options);
                $rows=$mongo->executeQuery("VenueBooking.Image",$qry);
                foreach($rows as $row)
                {?>
                    <img src="data:jpeg;base64,<?=base64_encode($row->image->getData())?>"height="300px" width="40%" style="margin-left:450px;" class="mr-5"/>
                <?php
                }
            ?>
            
            <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2">Art Name : <h3><?php echo $row->name;?></h3></span></h4></div> 
           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2">Price :<span>&#8377; <?php echo $row->price;?></span></h4></div> 
           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2">Artist :<span>&#8377; <?php echo $row->artist;?></span></h4></div> 
           

           
        </div>

    <!--Grid column-->
   
    </form> 
       
    </div>
    <?php
}
    ?>
   
</div>
<!--Grid row-->

</section>
<a href="index.php"><button type="submit" class="btn text-white text-center float-center" style="background-color:#57C4F3 ">Back</button></a>
<script>
            $('#print').click(function(){
                  $(.container).printThis();
                });
            
        </script>
<script src="./js/jquery.min.js">

</script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/mdb.min.js"></script>
</body>
</html>