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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
</head>
<style>
    .rounded 
        {
    border-radius: 1rem
}

.nav-pills .nav-link {
    color: #555
}

.nav-pills .nav-link.active {
    color: white
}

input[type="radio"] {
    margin-right: 5px
}

.bold {
    font-weight: bold
}
.img-pay
        {
            border: 2px solid blue;
            height: auto;
            width: 440px;
        }
        body{
            background: url(images/art-classic-dark-empty-242827.jpg);

        }
</style>
<body >
    
       
      <section >
      <div class="container py-5 ">
       <!-- For demo purpose -->
       <div class="row mb-4 ">
           <div class="col-lg-8 mx-auto text-center">
               <h1 class="display-4 font-weight-bold text-white"> Payment Forms</h1>
           </div>
       </div><!-- End -->
        
       <form method="POST" action="">  
          
       <div class="row">
           <div class="col-lg-6 mx-auto">
               <div class="card ">
                   <div class="card-header">
                       <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                           <!-- Credit card form tabs -->
                           <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                               <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card </a> </li>
                              
                           </ul>
                       </div>
                   <!-- End -->
                       <!-- Credit card form content -->
                       <div class="card-body">
                           <div class="row">
                           <div class="col-md-5">
                           <?php
                           $artist=$_GET['artist'];
                           $name=$_GET['name'];
                    $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                    $qry=new MongoDB\Driver\Query(['name'=>$name],['artist'=>$artist]);
                    //Select Database
                    $rows=$mongo->executeQuery("VenueBooking.Image",$qry);
                    
            
                    foreach($rows as $row)  
                    {
                    ?>
                           <img src="data:jpeg;base64,<?=base64_encode($row->image->getData())?>"height="200px" width="100%"/>
                    <?php } ?>
                               </div>
                               <div class="col-md-7">
                                   
                 <div class="form-group">
               <input type="text" class="form-control" placeholder="<?php echo $_GET['name'];?>"> 
                    </div>
                       <div class="form-group">
               <input type="text" class="form-control" placeholder="<?php echo $_GET['artist'];?>"> 
                    </div>
                       <div class="form-group">
               <input type="text" class="form-control" placeholder="<?php echo $_GET['price'];?>"> 
                    </div>
                    <div class="form-group">
               <input type="text" class="form-control" name="buyer" placeholder="Buyer name"> 
                    </div><div class="form-group">
               <input type="text" class="form-control" name="mail" value="<?php echo $_SESSION['user_session'];?>"> 
                    </div>
                 
                 
                               
                               
                               </div>
                             </div>
                       </div>
                       
                    <div class="tab-content">
                           <!-- credit card info-->
                           <div id="credit-card" class="tab-pane fade show active pt-3">
                              
                                   <div class="form-group"> <label for="username">
                                           <h6>Card Owner</h6>
                                       </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control "> </div>
                                   <div class="form-group"> <label for="cardNumber">
                                           <h6>Card number</h6>
                                       </label>
                                       <div class="input-group"> <input type="text" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                           <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                       </div>
                                   </div>
                                   <div class="row">
                                       <div class="col-sm-8">
                                           <div class="form-group"> <label><span class="hidden-xs">
                                                       <h6>Expiration Date</h6>
                                                   </span></label>
                                               <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                           </div>
                                       </div>
                                       <div class="col-sm-4">
                                           <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                   <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                               </label> <input type="text" required class="form-control"> </div>
                                       </div>
                                   </div>
                                  
                                   <button type="submit" class="btn btn-outline-primary btn-block" name="pay">Confirm Payment</button>
                                    </form>

                                    <?php 
                                    
                                           if(isset($_POST['pay']))
                                           {
                                                    $name=$_GET['name'];
                                                    $artist=$_GET['artist'];
                                                    $price=$_GET['price'];
                                                    $buyer=$_POST['buyer'];
                                                    $mail=$_Get['mail'];

                                                    $doc=[
                                                    "name"=>$name,
                                                    "artist"=>$artist,
                                                    "price"=>$price,
                                                    "buyer"=>$buyer,
                                                    "mail"=>$mail
                                                    ];
                                                    $bulk = new MongoDB\Driver\BulkWrite;
                                                    $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");

                                                   $bulk->insert($doc);
                                                   if($mongo->executeBulkWrite('VenueBooking.Booking', $bulk))
                                                   {
                                                    
                                                     echo "<script>if(confirm('Art booked on your name')){document.location.href='report.php?name=".$name."&artist=".$artist."&mail=".$mail."&buyer=".$buyer."'};</script>";

                                                   }
                                                   else{
                                                       echo 'not inserted';
                                                   }
                                            
                                           }
                                    
                                    ?>
                              <div><p class="lead text-center text-primary mt-1">or</p></div> 
                               
                               <div class="btn btn-outline-primary btn-block mb-3">Cash On Delivery</div>
                               
                       </div> <!-- End -->
                       <!-- Paypal info -->
                      
                       <!-- End -->
                   </div>
               </div>
           </div>
       </div>
          </div>
       </div>
       </section> 
    
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>