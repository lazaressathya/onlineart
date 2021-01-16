<?php
            session_start();
            if(!isset($_SESSION['user_session']))
            {
              header('Location:login.php');
            }


            if(isset($_POST['del']))
            {
                  $name=$_POST['name'];
                  $artist=$_POST['artist'];
                
                  $bulk = new MongoDB\Driver\BulkWrite;
                  $filters=['name'=>$name,'artist'=>$artist];
                  $options=[];
                  $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                  $bulk->delete($filters, $options);

                  $result = $mongo->executeBulkWrite('VenueBooking.Image', $bulk);
                  //header("Location:admin.php");
                  echo "<script>if (confirm('image deleted')){document.location.href='admin.php'}</script>";
                  

             }
            
?>

