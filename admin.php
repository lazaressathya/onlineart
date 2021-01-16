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
    <link rel="shortcut icon" href="/img/ian-williams-rKE6rXOl14U-unsplash (1).jpg">
    <title>online art gallery</title>
    <link rel="stylesheet" href="boostrap/mdb.min.css">
    <link rel="stylesheet" href="boostrap/bootstrap.min.css">
    <link rel="stylesheet" href="boostrap/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="">


</head>

   <body style="">
    <header>

        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar" style="border: 0; box-shadow: none;">

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
                            <a class="nav-link p-2" href="#examples">My product</a>
                        </li>
                        
                        
                        
                        
                        <li class="nav-item">
                            <a class="nav-link p-2"" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <!-- Links -->

                    <!-- Social Icon  -->
                    
                </div>
                <!-- Collapsible content -->

            </div>

        </nav>
        <!--/.Navbar-->

        <!--Mask-->
        <div id="intro" class="view" style="background-image: url('images/ian-williams-rKE6rXOl14U-unsplash (2).jpg');">

            <div class="mask rgba-black-strong">

                <div class="container-fluid d-flex align-items-center justify-content-center h-100">

                    <div class="row d-flex justify-content-center text-center">

                        <div class="col">

                            <!-- Heading -->
                            <h2 class="display-4 font-weight-bold white-text pt-5 mb-2">Welcome to Admin Page</h>
                            <h4 class="display-4 font-weight-bold white-text pt-5 mb-2">ONLINE ART GALLERY</h4>

                            <!-- Divider -->
                            <hr class="hr-light">

                            <!-- Description -->
                            <h4 class="white-text my-4">"Art don't have to be pretty. It has to be meaningful"</h4>
                            <button type="button" class="btn btn-outline-white">Read more<i class="fa fa-book ml-2"></i></button>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!--/.Mask-->

    </header>

                <div class="m-5 ">
                    <a href="upload.php"><div class="btn  text-center d-flex justify-content-center align-items-center p-2 text-white font-weight-bold" style="background-color:#57C4F3; box-shadow: 2px 0 2px 2px solid black;"> Upload painting</div></a>

                </div>

    <main class="mt-5">
        <div class="container">
          
            <section id="examples" class="text-center">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold display-4" ></h2>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="md-12 mb-4">

                                <!-- delete -->
                                <section id="examples" class="text-center">

                                        <!-- Heading -->
                                        <h2 class="mb-5 font-weight-bold display-4" style="color:#57C4F3">OUR GALLERY</h2>

                                        <!--Grid row-->
                                        <div class="row">
                                        <?php
                                            $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                                            $qry=new MongoDB\Driver\Query([]);
                                            //Select Database
                                            $rows=$mongo->executeQuery("VenueBooking.Image",$qry);
                                            

                                            foreach($rows as $row)  
                                            {
                                            ?>
                                            <!--Grid column-->
                                            <div class="col-lg-4 col-md-4 mb-4">
                                            
                                            <form action="delete.php" method="POST" enctype="multipart/form-data">
                                                <div class="view overlay ">
                                                    <h1>Abstract painting</h1>
                                                    
                                                    <div>
                                                        <img src="data:jpeg;base64,<?=base64_encode($row->image->getData())?>"height="200px" width="100%"/>
                                                    </div>
                                                    
                                                    <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"> <h3><?php echo $row->name;?></h3></span></h4></div> 
                                                <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"><span>&#8377; <?php echo $row->price;?></span></h4></div> 
                                                
                                                <div><p class="grey-text ">Art by <?php echo $row->artist;?></p></div> 

                                                <div>
                                                        <input type="hidden" name="name" value="<?php echo $row->name;?>">
                                                        <input type="hidden" name="artist" value="<?php echo $row->artist;?>">
                                                        <input type="hidden" name="price" value="<?php echo $row->price;?>">
                                               <button type="submit" name="del" style="background-color:#57C4F3" class=" btn text-white b-0 p-2">Delete</button>
                                                </div> 
                                                
                                                </div>

                                            </div>
                                            <!--Grid column-->
                                        
                                            </form>    
                                            <?php
                                        }
                                            ?>
                                        </div>
                                        <!--Grid row-->

                                        </section>
                                <!-- delete ends-->
                                </div>
                       <!--  <div class="view overlay ">
                            <img src="images/abstract-abstract-painting-acrylic-acrylic-paint-1585325.jpg" class="img-fluid" alt="" style="width: 450px; height: 400px;">
                            <div class="mask rgba-white-slight"></div>
                           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"><span>&#8377; 599</span></h4></div> 
                           <button type="button" class="btn btn-primary font-weight-bold float-center col-md-6" data-toggle="modal" data-target="#exampleModal">
                            Delete
                            </button> 
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <img src="images/abstract-abstract-painting-acrylic-acrylic-paint-1585325.jpg" class="img-fluid" alt="" style="width: 450px; height: 400px;">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div> 

                       <div><p class="grey-text ">Art by Wiiliam</p></div> 

                        </div>

                    </div>-->
                    <!--Grid column-->

                    <!--Grid column-->
                   <!--  <div class="col-lg-4 col-md-6 mb-4" >

                        <div class="view overlay ">
                            <img src="images/abstract-abstract-painting-art-contemporary-art-1572386.jpg" class="img-fluid" alt="" style="width: 450px; height: 400px;">
                            <div class="mask rgba-white-slight"></div>
                           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"><span>&#8377; 599</span></h4></div> 
                           <button type="button" class="btn btn-primary font-weight-bold float-center col-md-6" data-toggle="modal" data-target="#exampleModal">
                            Delete
                            </button> 
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                <img src="images/abstract-abstract-painting-art-contemporary-art-1572386.jpg" class="img-fluid" alt="" style="width: 450px; height: 400px;">

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>

                       <div><p class="grey-text ">Art by James</p></div> 

                        </div>

                        

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <!-- <div class="col-lg-4 col-md-6 mb-4">

                        <div class="view overlay ">
                            <img src="images/abstract-activity-art-background-288100 (1).jpg" class="img-fluid" alt="" style="width: 450px; height: 400px;">
                            <div class="mask rgba-white-slight"></div>
                           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"><span>&#8377; 599</span></h4></div> 
                           <button type="button" class="btn btn-primary font-weight-bold float-center col-md-6" data-toggle="modal" data-target="#exampleModal">
                            Delete
                            </button> 
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                               
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div> 

                       <div><p class="grey-text ">Art by Anderson</p></div> 

                        </div>
                    <!--Grid column-->

               <!--  </div> -->
                <!--Grid row-->

                <!--Grid row-->
            

                    <!--Grid column-->
                   <!--  <div class="col-lg-4 col-md-12 mb-4">

                        <div class="view overlay ">
                            <img src="images/abstract-painting-1085685.jpg" class="img-fluid" alt="" style="width: 450px; height: 400px;">
                            <div class="mask rgba-white-slight"></div>
                           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"><span>&#8377; 599</span></h4></div> 
                           <button type="button" class="btn btn-primary font-weight-bold float-center col-md-6" data-toggle="modal" data-target="#exampleModal">
                            Delete
                            </button> 
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>

                       <div><p class="grey-text ">Art by Stephen</p></div> 

                        </div>

                    </div> -->
                    <!--Grid column-->

                    <!--Grid column-->
                   <!--  <div class="col-lg-4 col-md-6 mb-4">

                        <div class="view overlay ">
                            <img src="images/abstract-architecture-art-art-exhibition-297494 (1).jpg" class="img-fluid" alt="" style="width: 450px; height: 400px;">
                            <div class="mask rgba-white-slight"></div>
                           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"><span>&#8377; 599</span></h4></div> 
                           <button type="button" class="btn btn-primary font-weight-bold float-center col-md-6" data-toggle="modal" data-target="#exampleModal">
                            Delete
                            </button> 
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>

                       <div><p class="grey-text ">Art by Joseph</p></div> 

                        </div>

                    </div> -->
                    <!--Grid column-->

                    <!--Grid column-->
                   <!--  <div class="col-lg-4 col-md-6 mb-4">

                        <div class="view overlay ">
                            <img src="images/abstract-painting-1255372.jpg" class="img-fluid" alt="" style="width: 450px; height: 400px;">
                            <div class="mask rgba-white-slight"></div>
                           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"><span>&#8377; 599</span></h4></div> 
                           <button type="button" class="btn btn-primary font-weight-bold float-center col-md-6" data-toggle="modal" data-target="#exampleModal">
                            Delete
                            </button> 
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete confirmation </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                            </div>

                       <div><p class="grey-text ">Art by George</p></div> 

                        </div>

                    </div>
                    <!--Grid column-->
 
               
                <!--Grid row -->

            </section>
            

        <!-- Copyright -->
        <footer class="">
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="#">Developed by <strong>Lazares</strong>  <strong>Faizan</strong></a>
        </div>
        <!-- Copyright -->

    </footer>
    <!-- Footer -->
   </body>        

    

<script src="./js/jquery.min.js">

</script>
<script src="./js/popper.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/mdb.min.js"></script>
</html>