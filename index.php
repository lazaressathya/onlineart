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

   <body >
    <header >

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
                    <li class="nav-item active" >
        <a class="nav-link" href="profile.php" >
        <?php 
        
        $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
		  	$qry=new MongoDB\Driver\Query([]);
			  $rows=$mongo->executeQuery("pack.user",$qry);

        foreach($rows as $row)
        {
          if($_SESSION['user_session']==$row->email )
          {
              echo $row->name;
          }
        }
        ?></a>
      </li>
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
        <!--/.Navbar-->

        <!--Mask-->
        <div id="intro" class="view" style="background-image: url('images/ian-williams-rKE6rXOl14U-unsplash (2).jpg');">

            <div class="mask rgba-black-strong">

                <div class="container-fluid d-flex align-items-center justify-content-center h-100">

                    <div class="row d-flex justify-content-center text-center">

                        <div class="col">

                            <!-- Heading -->
                            <h2 class="display-3 font-weight-bold white-text pt-5 mb-2" data-aos="fade-up"
					  data-aos-duration="1000"
					  data-aos-delay="0">ONLINE ART GALLERY</h2>

                            <!-- Divider -->
                            <hr class="hr-light">

                            <!-- Description -->
                            <h1 class="white-text my-4" data-aos="fade-up"
					  data-aos-duration="1000"
					  data-aos-delay="0"><i>"Art don't have to be pretty. It has to be meaningful"</i></h1>
                          <a href= "#best-features">  <button type="button" class="btn btn-outline-white" data-aos="fade-up"
					data-aos-duration="1000"
					data-aos-delay="1000">Read more<i class="fa fa-book ml-2"></i></button></a>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <!--/.Mask-->

    </header>
    <main class="mt-5">
        <div class="container">

            <!--Section: Best Features-->
            <section id="best-features" class="text-center">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold" data-aos="fade-up"
							data-aos-duration="1000"
							data-aos-delay="0" style="color:#57C4F3" 
                            <h2 class="display-3 font-weight-bold white-text pt-5 mb-2" data-aos="fade-up"
					  data-aos-duration="1000"
					  data-aos-delay="0">Best Features</h2>

                <!--Grid row-->
                <div class="row d-flex justify-content-center mb-4">

                    <!--Grid column-->
                    <div class="col-md-8">

                        <!-- Description -->
                        <p class="black-text lead">an art gallery is a space where art is exhibited. More often than not, the art displayed will be visual in nature such as paintings, sculptures, drawings, costumes, collages, watercolors, prints and photographs. In certain cases, artistic events such as poetry readings and music concerts are also hosted at these galleries.

                            Article Source</p>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-4 mb-5" >
                        <i class="fa fa-camera-retro fa-4x" style="color:#57C4F3"></i>
                        
                        <h4 class="my-4 font-weight-bold" style="color:#57C4F3">Experience</h4>

                        <p class="black-text">"Art as Experience" is a major writing on aesthetics [the science which deduces from nature and taste the rules and principles of art] by John Dewey.  In his work Dewey defines this theory</p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-1">
                        <i class="fa fa-heart fa-4x " style="color:#57C4F3"></i>
                        <h4 class="my-4 font-weight-bold" style="color:#57C4F3">Happiness</h4>
                        <p class="black-text">Exercising our creativity can give us an outlet from our daily routines, helping us express emotions and boost our happiness levels. Here, writer and artist Juliet Davey, talks about what painting means to her…

                            by Psychologies</p>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-1">
                        
                        <i class="fas fa-palette fa-4x" style="color:#57C4F3"></i>
                        <h4 class="my-4 font-weight-bold" style="color:#57C4F3">painting</h4>
                        <p class="black-text">painter's progress and skills deter negative emotions and provide pleasure and happiness for the individual. Painting boosts self-esteem and inspires people to reach new levels of skill. Painting also produces a relaxing, open environment where artists feel safe to explore their own creativity.</p>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Best Features-->
           <!--  carousel -->
           <section class="mt-5">
             <h1 class="diplay-3 text-center mb-5 font-weight-bold" style="color:#57C4F3">Images</h1>
        <div class="carousel slide"  data-ride="carousel">
            <ol class="carousel-indicators">
    <li data-target="#traveller" data-slide-to="0" class="active"></li>
    <li data-target="#traveller" data-slide-to="1"></li>
    <li data-target="#traveller" data-slide-to="2"></li>
  </ol>
            <div class="carousel-inner"  id="traveller">
            <div class="carousel-item active">
                <img src="images/abstract-abstract-painting-acrylic-acrylic-paint-1585325.jpg" alt="" class="img-fluid w-100">
                <div class="carousel-caption text-right">
                <h2 class="display-4 animated zoomIn delay-1s font-weight-bold text-justify"> Abstract Painting</h2>
                <div class="animated jackInTheBox delay-2s">
                    <p class="text-white text-justify">Art is freedom. Being able to bend things most people see as a straight line.</p>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <img src="images/blue-and-cream-abstract-painting-1981468%20(2).jpg" alt="" class="img-fluid w-100">
                 <div class="carousel-caption text-left">
                <h2 class="display-4 animated zoomIn delay-1s font-weight-bold"> Acryclic Paint</h2>
                <div class="animated jackInTheBox delay-2s ">
                    <p class="text-justify">An artist can show things that other people are terrified of expressing.</p>
                    </div>
                </div>
                </div>
                <div class="carousel-item">
                <img src="images/white-walls-1764702.jpg" alt="" class="img-fluid w-100">
                 <div class="carousel-caption text-right">
                <h2 class="display-4 animated zoomIn delay- font-weight-bold text-justify"> Abstract Art Background</h2>
                <div class="animated jackInTheBox delay-2s ">
                    <p class="text-justify text-white">The artist is nothing without the gift but the gift is nothing without the work.</p>
                    </div>
                </div>
                </div>
      <a class="carousel-control-prev" href="#traveller" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#traveller" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>     
            </div>
            </div>
        </section>
    
           <!--  end here -->

            <hr class="my-5">

            <!--Section: Examples-->
            <section id="examples" class="text-center">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold display-4" style="color:#57C4F3">OUR GALLERY</h2>

                <!--Grid row-->
                <div class="row">
                <?php
                   
                    $qry=new MongoDB\Driver\Query([]);
                    //Select Database
                    $rows=$mongo->executeQuery("VenueBooking.Image",$qry);
                    
            
                    foreach($rows as $row)  
                    {
                    ?>
                    <!--Grid column-->
                    <div class="col-lg-4 col-md-4 mb-4">
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="view overlay ">
                            <h1>Abstract painting</h1>
                            
                            <div>
                                <img src="data:jpeg;base64,<?=base64_encode($row->image->getData())?>"height="200px" width="100%"/>
                            </div>
                            
                            <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"> <h3><?php echo $row->name;?></h3></span></h4></div> 
                           <div><h4 class=" font-weight-bold float-center col-md-6 m-auto p-2"><span>&#8377; <?php echo $row->price;?></span></h4></div> 
                           
                           <div><p class="grey-text ">Art by <?php echo $row->artist;?></p></div> 

                           <div>
                                <input type="hidden" name="name" value="<?php $row->name;?>">
                                <input type="hidden" name="artist" value="<?php $row->artist;?>">
                                <input type="hidden" name="price" value="<?php $row->price;?>">
                           <a href="payment.php?name=<?php echo $row->name;?>&artist=<?php echo $row->artist;?>&price=<?php echo $row->price;?>" class="btn btn-primary font-weight-bold float-center col-md-6" name="buy" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="1000">buy</a>
                           
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
            <!--Section: Examples-->

            <hr class="my-5">

            <!--Section: Gallery-->
            <section id="gallery">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold text-center" style="color:#57C4F3">ABOUT US</h2>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 mb-4">

                        <!--Carousel Wrapper-->
                        <div id="carousel-example-1z" class="carousel slide carousel-fade carousel-fade" data-ride="carousel">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
                            </ol>
                            <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner z-depth-1-half" role="listbox">
                                <!--First slide-->
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
                                        alt="First slide">
                                </div>
                                <!--/First slide-->
                                <!--Second slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
                                        alt="Second slide">
                                </div>
                                <!--/Second slide-->
                                <!--Third slide-->
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="https://mdbootstrap.com/img/Photos/Slides/img%20(70).jpg"
                                        alt="Third slide">
                                </div>
                                <!--/Third slide-->
                            </div>
                            <!--/.Slides-->
                            <!--Controls-->
                            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                        <!--/.Carousel Wrapper-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">

                        <!--Excerpt-->
                        <a href="" class="teal-text">
                            <h6 class="pb-1" style="color:#57C4F3"><i class="fa fa-heart"></i><strong> About </strong></h6>
                        </a>
                        <h4 class="mb-3" style="color:#57C4F3"><strong>ONLINE ART GALLERY</strong></h4>
                        <p>Online Art Gallery in a form of electronic commerce which allows consumer to directly buy goods or services from a seller over the internet using a web browser. Consumers find a product of interest by visiting the website of the retailer directly or by the searching among alternative venors using a shopping search engine, which displays the same products availablility and pricing at different e-retailer. As of 2016, customers can shop online using arange of different computers and devices including desktop computers, tablet computers and smartphones. An Online Shop invokes the physical analogy of buying products of servisces at a regular "bricks and mortars" retailer or shopping center</p>

                        
                        <p >by <a><strong style="color:#57C4F3">Jessica Clark</strong></a>, 26/08/2016</p>
                        <a class="btn btn-md " style="background-color:#57C4F3">Read more</a>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Gallery-->

            <hr class="my-5">

            <!--Section: Contact-->
            <section id="contact">

                <!-- Heading -->
                <h2 class="mb-5 font-weight-bold text-center" style="color:#57C4F3">Contact us</h2>

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-5 col-md-12">
                        <!-- Form contact -->
                        <form class="p-5 grey-text">
                            <div class="md-form form-sm"> <i class="fa fa-user prefix"></i>
                                <input type="text" id="form3" class="form-control form-control-sm">
                                <label for="form3">Your name</label>
                            </div>
                            <div class="md-form form-sm"> <i class="fa fa-envelope prefix"></i>
                                <input type="text" id="form2" class="form-control form-control-sm">
                                <label for="form2">Your email</label>
                            </div>
                            <div class="md-form form-sm"> <i class="fa fa-tag prefix"></i>
                                <input type="text" id="form32" class="form-control form-control-sm">
                                <label for="form34">Subject</label>
                            </div>
                            <div class="md-form form-sm"> <i class="fa fa-pencil prefix"></i>
                                <textarea type="text" id="form8" class="md-textarea form-control form-control-sm" rows="4"></textarea>
                                <label for="form8">Your message</label>
                            </div>
                            <div class="text-center mt-4">
                                <button class="btn text-white" style="background-color:#57C4F3">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
                            </div>
                        </form>
                        <!-- Form contact -->
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-7 col-md-12">

                        <!--Grid row-->
                        <div class="row text-center">

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-12 mb-3">

                                <p><i class="fa fa-map fa-1x mr-2 grey-text"></i>Bangalore,kristu jayanti college  560077</p>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-3">

                                <p><i class="fa fa-building fa-1x mr-2 grey-text"></i>Mon - Fri, 8:00-22:00</p>

                            </div>
                            <!--Grid column-->

                            <!--Grid column-->
                            <div class="col-lg-4 col-md-6 mb-3">

                                <p><i class="fa fa-phone fa-1x mr-2 grey-text"></i>+91 9985600446</p>

                            </div>
                            <!--Grid column-->

                        </div>
                        <!--Grid row-->

                        <!--Google map-->
                        <div class="row row-grid align-items-center my-md">
                            <div class="col-lg-12">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3886.6464414959937!2d77.64067241536544!3d13.058162516504815!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae17578c79da7d%3A0xe96dcd8e2b982f8e!2sKristu%20Jayanti%20College%2C%20Autonomous!5e0!3m2!1sen!2sin!4v1581486673150!5m2!1sen!2sin"
                                    width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                            </div>
                        </div>

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Contact-->

        </div>
    </main>
    <!--Main layout-->

    <!-- Footer -->
    <footer class="page-footer font-small unique-color-dark" >

        <!-- Social buttons -->
        <div class="" style="background-color:#57C4F3">
            <div class="container">
                <!--Grid row-->
                <div class="row py-4 d-flex align-items-center" >

                    <!--Grid column-->
                    <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                        <h6 class="mb-0 white-text font-weight-bold">Get connected with us on social networks!</h6>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6 col-lg-7 text-center text-md-right">
                        <!--Facebook-->
                        <a class="fb-ic ml-0">
                            <i class="fab fa-facebook white-text mr-4"> </i>
                        </a>
                        <!--Twitter-->
                        <a class="tw-ic">
                            <i class="fab fa-twitter white-text mr-4"> </i>
                        </a>
                        <!--Google +-->
                        <a class="gplus-ic">
                            <i class="fab fa-google-plus white-text mr-4"> </i>
                        </a>
                        <!--Linkedin-->
                        <a class="li-ic">
                            <i class="fab fa-linkedin white-text mr-4"> </i>
                        </a>
                        <!--Instagram-->
                        <a class="ins-ic">
                            <i class="fab fa-instagram white-text mr-lg-4"> </i>
                        </a>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->
            </div>
        </div>
        <!-- Social buttons -->

        <!--Footer Links-->
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">

                <!--First column-->
                <div class="col-md col-lg col-xl mb-4">
                    <h6 class="text-uppercase font-weight-bold">
                        <strong >Online Art Gallery</strong>
                    </h6>
                    <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                    <p class="float-left text-muted">the process is called bussiness to consumer online shopping. A typical onlin store enables the customer to browse the firms range of products and sevices. view photos or images of the products. along with information about the product specifications, features and prices.</p>
                    <p class="float-right text-muted">Online stores typically enbles shoppers to use "search" features to find specific models, brands or items. Online customers must have access to the internet an valid method of payment in order to complete a transaction. such as a credit card, an interac- enabled debit card. 
                        or a service such as PayPal. for example: paperback books or clothes. the e-tailer ships the products to the customer, for digital products. such as digital audio files of songs or software. the e-tailer typically sends the file to the customer over the internet.
                         The largest of these online retailing corporations are Alibaba, Amazon.com and eBay</p>
                </div>
               

            </div>
        </div>
        <!--/.Footer Links-->

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">© 2020 Copyright:
            <a href="#">Developed by <strong style="color:#57C4F3">Lazares</strong>  &  <strong style="color:#57C4F3">Faizan</strong></a>
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
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</html>
<?php 
                        
                        
                     if(isset($_REQUEST['buy']))
                        {
                              
                            
                           $name=$row->name;
                           $artist=$row->artist;
                           $price=$row->price;
                            $mongo=new MongoDB\Driver\Manager("mongodb://localhost:27017");
                            $qry=new MongoDB\Driver\Query(['name'=>$name],['artist'=>$artist]);
                    //Select Database
                    $rows=$mongo->executeQuery("VenueBooking.Image",$qry);
                            
                    
                            foreach($rows as $row)  
                            {
                                    echo "<script>{document.location.href='payment.php?name=".$name."&artist=".$artist."&price=".$price."'};</script>";
                            }
                        }?>